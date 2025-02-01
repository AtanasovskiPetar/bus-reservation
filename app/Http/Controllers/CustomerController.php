<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }

    public function all()
    {
        $customers = User::role('user')->withCount('reservations')->get();

        return DataTables::of($customers)
            ->addColumn('total-reservations', function ($row) {
                return $row->reservations_count;
            })
            ->addColumn('created_at', function ($row) {
                return date('Y/m/d h:i A', strtotime($row->created_at));
            })
            ->make(true);
    }

    public function reservations()
    {
        return view('customer.reservations');
    }

    public function reservationsApi()
    {
        $reservation = Reservation::with(['user', 'bus'])->latest()->get();

        return DataTables::of($reservation)
            ->addColumn('name', function ($row) {
                return '<a href="/bus/'.$row->bus->id.'">'.$row->bus->name.'</a>';
            })
            ->addColumn('customer_name', function ($row) {
                return $row->user->name;
            })
            ->addColumn('customer_email', function ($row) {
                return $row->user->email;
            })
            ->addColumn('passengers', function ($row) {
                return $row->passengers;
            })
            ->addColumn('created_at', function ($row) {
                return date('Y/m/d h:i A', strtotime($row->created_at));
            })
            ->rawColumns(['name', 'actions', 'created_at'])
            ->make(true);
    }
}
