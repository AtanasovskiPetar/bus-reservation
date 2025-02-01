<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $buses = Bus::latest()->take(4)->get();

        return view('home.index')->with([
            'buses' => $buses,
        ]);
    }

    public function search(Request $request)
    {

        $data = Bus::where('from', 'LIKE', '%'.$request->fromLocation.'%')
            ->where('name', 'LIKE', '%'.$request->q.'%')
            ->where('to', 'LIKE', '%'.$request->toLocation.'%')
            ->with('timetables');

        if ($request->date) {
            $data = $data->whereHas('timetables', function ($query) use ($request) {
                $query->where('day', 'LIKE', '%'.date('l', strtotime($request->date)).'%');
            });
        }

        $fromLocations = Bus::take(20)->get(['from']);
        $toLocations = Bus::take(20)->get(['to']);
        $buses = $data->paginate(6);
        $buses->load('timetables');

        return view('home.list', compact('buses', 'fromLocations', 'toLocations'));
    }

    public function show(Bus $bus)
    {
        $bus->load('timetables');

        $bus->reservationsByDate = $bus->reservations()
            ->selectRaw('reservation_date, SUM(passengers) as total_passengers')
            ->groupBy('reservation_date')
            ->orderBy('reservation_date')
            ->get();

        return view('home.show', compact('bus'));
    }
}
