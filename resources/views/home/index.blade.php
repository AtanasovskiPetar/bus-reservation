@extends('layouts.home')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-0 text-gray-800">Home </h1>
        <p>Search available buses here.</p>

        <div class="row align-items-center">

            <div class="col-xl-6 col-md-12 mb-4 small">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <form action="{{ route('home.search') }}" method="GET">

                            <div class="form-group">
                                <label for="">
                                    <i class="fas fa-map-marker-alt"></i>
                                    From :
                                </label>
                                <input type="text" placeholder="From" name="fromLocation" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    <i class="fas fa-map-marker-alt"></i>
                                    To :
                                </label>
                                <input type="text" placeholder="To" name="toLocation" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Date :
                                </label>
                                <input id="date-picker" name="date" class="form-control bg-white"
                                    placeholder="Select Date" required />
                            </div>

                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="w-50 mx-auto">
                    <img src="{{ asset('images/yatch.svg') }}" class="img-fluid" alt="">
                </div>
            </div>

        </div>

        <hr class="line-divider">

        <h1 class="h3 mb-0 text-gray-800">Explore our latest commutes.</h1>
        <br>

        <div class="row">
            @foreach ($buses as $bus)
                <div class="col-sm-6 col-md-3">
                    <div class="card text-center shadow h-100">
                        <img src="{{ asset($bus->img) }}" class="img-fluid" alt="Bus img"
                            style="height: 12rem; object-fit: cover;">
                        <div class="card-body">
                            <p class="card-header">{{ $bus->name }}</p>

                            <div class="d-flex flex-column justify-content-center">
                                <p class="text-primary">{{ $bus->from }}</p>
                                <i class="fas fa-angle-double-down"></i>
                                <p class="text-primary">{{ $bus->to }}</p>
                            </div>

                            <a href="{{ route('home.show', ['bus' => $bus]) }}" class="btn btn-primary">Buy tickets</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <br>
        <br>

        <h1 class="h4 mb-0 text-gray-800 text-center my-4">Didn't match any? <a href="{{ route('home.search') }}"
                class="btn btn-sm btn-primary">We have more</a></h1>
        <br>

    </div>

    <script>
        flatpickr("#date-picker", {
            dateFormat: "Y-m-d"
        });
    </script>
@endsection
