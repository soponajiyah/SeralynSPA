<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationItem;
use App\Models\Schedule;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function availableSchedules(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => ['required', 'date', 'after_or_equal:today'],
            'durasi' => ['required', 'integer', 'min:1'],
        ]);

        $schedules = Schedule::with([
            'therapist',
            'room',
        ])
        ->whereDate('tanggal', $validated['tanggal'])
        ->where('status', 'available')
        ->orderBy('jam_mulai')
        ->get()
        ->filter(function ($schedule) use ($validated) {
            $start = Carbon::parse($schedule->jam_mulai);
            $end = Carbon::parse($schedule->jam_selesai);

            return $start->diffInMinutes($end) >= $validated['durasi'];
        })
        ->values()
        ->map(function ($schedule) {
            return [
                'schedule_id' => $schedule->schedule_id,
                'tanggal' => $schedule->tanggal,
                'jam_mulai' => $schedule->jam_mulai,
                'jam_selesai' => $schedule->jam_selesai,
                'therapist' => $schedule->therapist?->nama_terapis,
                'room' => $schedule->room?->nomor_kamar,
                'room_type' => $schedule->room?->tipe_kamar,
            ];
        });

        return response()->json($schedules);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'treatment_names' => ['required', 'string'],
            'schedule_id' => ['required', 'integer'],
            'additional_minutes' => [
                'required',
                'integer',
                'in:0,10,20,30,40,50,60',
            ],
            'catatan' => ['nullable', 'string', 'max:1000'],
        ]);

        $treatmentNames = json_decode(
            $validated['treatment_names'],
            true
        );

        if (
            !is_array($treatmentNames) ||
            count($treatmentNames) < 1 ||
            count($treatmentNames) > 10
        ) {
            return back()->withErrors([
                'treatment_names' => 'Pilihan treatment tidak valid.',
            ]);
        }

        $treatmentNames = array_values(array_unique($treatmentNames));

        return DB::transaction(function () use (
            $validated,
            $treatmentNames
        ) {
            $schedule = Schedule::with([
                'therapist',
                'room',
            ])
            ->where('schedule_id', $validated['schedule_id'])
            ->lockForUpdate()
            ->firstOrFail();

            if ($schedule->status !== 'available') {
                return back()->withErrors([
                    'schedule' => 'Jadwal sudah tidak tersedia. Silakan pilih jadwal lain.',
                ]);
            }

            $treatments = Treatment::whereIn(
                'nama_treatment',
                $treatmentNames
            )->get();

            if ($treatments->count() !== count($treatmentNames)) {
                return back()->withErrors([
                    'treatment_names' => 'Ada treatment yang tidak ditemukan.',
                ]);
            }

            $totalDuration = $treatments->sum('durasi')
                + $validated['additional_minutes'];

            $start = Carbon::parse($schedule->jam_mulai);
            $end = Carbon::parse($schedule->jam_selesai);

            if ($start->diffInMinutes($end) < $totalDuration) {
                return back()->withErrors([
                    'schedule' => 'Durasi treatment melebihi durasi jadwal.',
                ]);
            }

            $treatmentTotal = $treatments->sum('harga');

            $additionalFee = (
                $validated['additional_minutes'] / 10
            ) * 20000;

            $roomType = strtolower(
                $schedule->room?->tipe_kamar ?? ''
            );

            $roomFee = str_contains($roomType, 'harmony')
                ? 60000
                : 45000;

            $total = $treatmentTotal + $additionalFee + $roomFee;

            $reservation = Reservation::create([
                'kode_reservasi' => 'SRL-' .
                    now()->format('ymd') . '-' .
                    strtoupper(Str::random(6)),

                'user_id' => Auth::user()->user_id,

                'schedule_id' => $schedule->schedule_id,

                'total_harga' => $total,

                'status_reservasi' => 'awaiting_payment',

                'catatan' => $validated['catatan'],

                'additional_minutes' => $validated['additional_minutes'],

                'room_fee' => $roomFee,
            ]);

            foreach ($treatments as $treatment) {
                ReservationItem::create([
                    'reservation_id' => $reservation->reservation_id,
                    'treatment_id' => $treatment->treatment_id,
                    'durasi' => $treatment->durasi,
                    'harga' => $treatment->harga,
                ]);
            }

            $dpPercentage = 30;
            $dpAmount = round($total * $dpPercentage / 100, 2);

            $reservation->payment()->create([
                'total_amount' => $total,
                'dp_percentage' => $dpPercentage,
                'dp_amount' => $dpAmount,
                'payment_method' => 'bank_transfer',
                'payment_status' => 'unpaid',
            ]);

            $schedule->update([
                'status' => 'booked',
            ]);

            return redirect()
                ->route('customer.dashboard')
                ->with(
                    'success',
                    'Reservasi berhasil dibuat. Silakan selesaikan pembayaran DP sebesar Rp' .
                    number_format($dpAmount, 0, ',', '.')
                );
        });
    }
}
