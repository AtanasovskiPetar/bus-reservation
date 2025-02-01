@extends('layouts.admin-panel')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Adding a new bus</h1>
        <form action="{{ route('bus.store') }}" method="POST" id="bus-form" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-lg-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Enter the bus details</h6>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ implode('', $errors->all(':message')) }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Name of the bus</label>
                                <input type="text" class="form-control form-control-user"
                                    @error('name') is-invalid @enderror value="{{ old('bus_name') }}" name="name"
                                    placeholder="Enter name ..." required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Bus code or bus number</label>
                                <input type="text" class="form-control form-control-user"
                                    @error('bus_code') is-invalid @enderror value="{{ old('bus_code') }}" name="bus_code"
                                    placeholder="Bus code ..." required>
                                @error('bus_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Departure location</label>
                                <input type="text" class="form-control form-control-user"
                                    @error('from') is-invalid @enderror value="{{ old('from') }}" name="from"
                                    placeholder="Departure location" required>
                                @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Destination</label>
                                <input type="text" class="form-control form-control-user"
                                    @error('to') is-invalid @enderror name="to" value="{{ old('to') }}"
                                    placeholder="Destination" required>
                                @error('to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="departure-days-times">Timetable</label>
                                <div id="departure-days-times">
                                    <div class="day-time-pair">
                                        <div class="row">
                                            <div class="col-5">
                                                <select name="departure_days[]" class="form-control form-control-user"
                                                    required>
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednesday">Wednesday</option>
                                                    <option value="Thursday">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                    <option value="Saturday">Saturday</option>
                                                    <option value="Sunday">Sunday</option>
                                                </select>
                                            </div>

                                            <div class="col-5">
                                                <input type="time" name="departure_time[]"
                                                    class="form-control form-control-user" required>
                                            </div>

                                            <div class="col-2 text-center">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="deleteDayTimePair(this)">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-secondary mt-2" onclick="addDayTimePair()">Add another
                                    day and time</button>
                            </div>
                        </div>

                        <hr>

                        <div class="card-body">
                            <p class="text-primary">Additional details</p>
                            <div class="form-group">
                                <label for="">Driver name</label>
                                <input type="text" class="form-control form-control-user"
                                    @error('driver_name') is-invalid @enderror name="driver_name"
                                    value="{{ old('driver_name') }}" placeholder="Driver name" required>
                                @error('driver_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Fare</label>
                                <input type="text" class="form-control form-control-user"
                                    @error('fare') is-invalid @enderror name="fare" placeholder="fare/price"
                                    value="{{ old('fare') }}" required>
                                @error('fare')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">No of Seats</label>
                                <input type="number" class="form-control form-control-user"
                                    @error('seats') is-invalid @enderror name="seats" placeholder="No of seats"
                                    value="{{ old('seats') ?? 50 }}" required>
                                @error('seats')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" value="{{ old('status') }}" class="form-control"
                                    value="{{ old('status') }}" required>
                                    <option value="1">Working</option>
                                    <option value="0">Not working</option>
                                </select>
                            </div>

                            <button type="submit" id="submit-button" class="btn btn-primary">Add</button>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Enter the bus media</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Bus Image</label>
                                <input type="file" class="form-control-file" name="img"
                                    id="exampleFormControlFile1">
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script>
        function addDayTimePair() {
            var container = document.getElementById('departure-days-times');
            var newPair = document.createElement('div');
            newPair.classList.add('day-time-pair');
            newPair.innerHTML = `
            <div class="row pt-2">
                <div class="col-5">
                    <select name="departure_days[]" class="form-control form-control-user" required>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                </div>

                <div class="col-5">
                    <input type="time" name="departure_time[]" class="form-control form-control-user" required>
                </div>

                <div class="col-2 text-center">
                  <button type="button" class="btn btn-danger btn-sm" onclick="deleteDayTimePair(this)">Delete</button>
                </div>
            </div>
        `;
            container.appendChild(newPair);
        }

        function deleteDayTimePair(button) {
            const pair = button.closest('.day-time-pair');
            pair.remove();
        }

        document.getElementById('bus-form').addEventListener('submit', function(e) {
            e.preventDefault();

            var dayTimePairs = [];
            var days = document.getElementsByName('departure_days[]');
            var times = document.getElementsByName('departure_time[]');

            for (var i = 0; i < days.length; i++) {
                dayTimePairs.push({
                    day: days[i].value,
                    time: times[i].value
                });
            }

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'departure_day_time_pairs';
            input.value = JSON.stringify(dayTimePairs);
            this.appendChild(input);

            this.submit();
        });
    </script>
@endsection
