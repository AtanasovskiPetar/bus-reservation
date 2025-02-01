<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $earnings = Reservation::join('buses', 'reservations.bus_id', '=', 'buses.id')
            ->sum(DB::raw('reservations.passengers * buses.fare'));
        $busCount = Bus::count();
        $reservations = Reservation::count();
        $passengers = Reservation::sum('passengers');

        return view('admin.dashboard')->with([
            'earnings' => $earnings,
            'busCount' => $busCount,
            'reservations' => $reservations,
            'passengers' => $passengers,
        ]);
    }

    public function buses()
    {
        return view('admin.buses');
    }
}
