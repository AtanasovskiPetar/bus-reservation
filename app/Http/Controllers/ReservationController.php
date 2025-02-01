<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Reservation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class ReservationController extends Controller
{
    public function index()
    {
        return view('reservation.index');
    }

    public function create(Request $request, Bus $bus)
    {
        $request->validate([
            'phone' => 'required',
            'passengers' => 'required',
            'scheduled_at' => 'required',
        ]);

        if ($this->hasApplied($bus->id)) {
            Alert::toast('Reservation created!', 'info');

            return redirect()->route('reservation.index');
        }

        $reservation = new Reservation;
        $reservation->user_id = auth()->user()->id;
        $reservation->bus_id = $bus->id;
        $reservation->phone = $request->phone;
        $reservation->passengers = $request->passengers;
        $reservation->reservation_date = $request->scheduled_at;
        $reservation->save();

        Alert::toast('Your reservation was made!', 'success');

        return redirect()->route('reservation.index');
    }

    public function myReservationsApi()
    {
        $reservations = Reservation::where('user_id', auth()->user()->id)
            ->with('bus') // Load bus relation
            ->latest();

        return DataTables::of($reservations)
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                return '<a href="/bus/'.$row->bus->id.'">'.$row->bus->name.'</a>';
            })
            ->addColumn('from', function ($row) {
                return $row->bus->from;
            })
            ->addColumn('to', function ($row) {
                return $row->bus->to;
            })
            ->addColumn('created_at', function ($row) {
                return date('Y/m/d h:i A', strtotime($row->created_at));
            })
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereHas('bus', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', "%{$keyword}%");
                });
            })
            ->rawColumns(['name'])
            ->make(true);
    }

    public function destroy(Reservation $id)
    {
        $id->delete();
        Alert::toast('Reservation Deleted!', 'success');

        return redirect()->route('reservation.index');
    }

    private function hasApplied($busId)
    {
        $user = auth()->user();
        $applied = $user->reservations()->where('bus_id', $busId)->get();
        if ($applied->count()) {
            return true;
        } else {
            return false;
        }
    }
}
