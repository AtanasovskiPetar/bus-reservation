@extends('layouts.home')

@section('content')
    <div class="container-fluid" style="min-height: 80vh">

        <section class="search-bar mt-2 px-0 ">
            <div class="py-4">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ route('home.search') }}" method="GET">
                            <div class="row m-1">
                                <div class="col-md-12 input-group px-2">
                                    <input type="text" id="search-q" name="q" value="{{ Request::get('q') }}"
                                        class="form-control mx-1" placeholder="Search By Name" />

                                    <input id="date-picker" name="date" class="form-control bg-white mx-1"
                                        placeholder="Select Date" value="{{ Request::get('date') }}" required />

                                    <select name="fromLocation" class="form-control mx-1" id="filterFromLocation">
                                        <option disabled {{ Request::get('fromLocation') ? '' : 'selected' }} value>
                                            Select From
                                        </option>
                                        @foreach ($fromLocations->pluck('from')->unique() as $location)
                                            <option value="{{ $location }}"
                                                {{ Request::get('fromLocation') == $location ? 'selected' : '' }}>
                                                {{ $location }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <select name="toLocation" class="form-control mx-1" id="filterToLocation">
                                        <option disabled {{ Request::get('toLocation') ? '' : 'selected' }} value>
                                            Select To
                                        </option>
                                        @foreach ($toLocations->pluck('to')->unique() as $location)
                                            <option value="{{ $location }}"
                                                {{ Request::get('toLocation') == $location ? 'selected' : '' }}>
                                                {{ $location }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <span class="input-group-append mx-1">
                                        <button type="submit" class="btn btn-primary pt-1">
                                            <span class="fas fa-search"></span> Search Bus
                                        </button>
                                        <button type="button" class="btn pt-1 mx-1" id="clear-filters">
                                            <i class="fas fa-times "></i>
                                        </button>
                                    </span>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <div class="row">
            @if ($buses->count())
                @foreach ($buses as $bus)
                    <div class="col-sm-12 col-md-12 col-xl-6 mb-3">
                        <div class="card-body bg-white p-3 shadow" style="height: 170px;">
                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-3 mx-auto mb-sm-4">
                                    <img src="{{ asset($bus->img) }}" class="img-fluid" alt="Bus img">
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <h5 class="secondary-link font-weight-bold">
                                        <a href="{{ route('home.show', ['bus' => $bus->id]) }}">
                                            {{ $bus->name }}
                                        </a>
                                    </h5>
                                    <h6 class="mt-2">
                                        Bus code : {{ $bus->bus_code }}
                                    </h6>

                                    <div class="small my-1 d-flex">
                                        <div class="mr-4">
                                            <span>from: </span>
                                            <span class="text-primary">{{ $bus->from }}</span>
                                        </div>
                                        <div>
                                            <span>to: </span>
                                            <span class="text-primary">{{ $bus->to }}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="small my-1 d-flex">
                                        <div class="mr-4">
                                            <span>Timetable: </span>
                                            <div style="max-height: 100px; overflow-y: auto;">
                                                <table class="" width="100%" cellspacing="0" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Day</th>
                                                            <th>Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($bus->timetables as $timetable)
                                                            <tr>
                                                                <td>{{ $timetable->day }}</td>
                                                                <td>{{ $timetable->departure_time }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <div class="">
                                        <p class="h5 text-primary">MKD {{ number_format($bus->fare) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="bg-white p-3 shadow mb-3">
                    <p class="h5 text-center mb-4">No such results. Search for another name</p>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 mx-auto">
                            <img src="{{ asset('images/not-found.svg') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            @endif

            <div class="d-flex justify-content-center">
                {{ $buses->links() }}
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script>
        document.getElementById('clear-filters').addEventListener('click', function() {
            document.getElementById('search-q').value = '';
            document.querySelector('input[name="date"]').value = '';
            document.querySelector('select[name="fromLocation"]').selectedIndex = 0;
            document.querySelector('select[name="toLocation"]').selectedIndex = 0;
            document.querySelector('form').submit();
        });

        flatpickr("#date-picker", {
            dateFormat: "Y-m-d",
        });
    </script>
@endpush
