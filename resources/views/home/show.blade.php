@extends('layouts.home')

@section('content')
    <div class="container-fluid" style="min-height: 80vh">

        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ implode('', $errors->all(':message')) }}
                    </div>
                @endif
                <form action="{{ route('reservation.create', ['bus' => $bus]) }}" method="POST" id="reservation-form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <img src="{{ asset($bus->img) }}" class="img-fluid" alt="">
                            <div class="my-2">
                                <h3 class="text-primary">Timetable</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
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
                        <div class="col-sm-12 col-md-8">
                            <div class="col-xs-5 pt-sm-4 pt-md-0">
                                <h3 class="text-primary">{{ $bus->name }}</h3>
                                <p>Bus code : <span class="text-primary">{{ $bus->bus_code }}</span></p>

                                <div class="my-2">
                                    <div>
                                        <div>From: <span class="text-primary">{{ $bus->from }}</span> </div>
                                        <div>To: <span class="text-primary">{{ $bus->to }}</span></div>
                                    </div>
                                </div>

                                <div class="my-2">
                                    <h6><small>Fare</small></h6>
                                    <h3 class="text-primary">MKD {{ $bus->fare }}</h3>
                                </div>

                                <div class="my-2">
                                    <div class="my-4">
                                        <div class="row align-items-center">
                                            <div class="col-sm-6 col-md-4"><i class="fas fa-users"></i> No of passengers
                                            </div>
                                            <input value="{{ old('passengers') ?? '1' }}" name="passengers"
                                                class="form-control col-sm-6 col-md-4" required />
                                        </div>
                                    </div>

                                    <div class="my-4">
                                        <div class="row align-items-center">
                                            <div class="col-sm-6 col-md-4"><i class="fas fa-phone"></i> Phone</div>
                                            <input value="{{ old('phone') }}" name="phone"
                                                class="form-control col-sm-6 col-md-4" required />
                                        </div>
                                    </div>

                                    <div class="my-4">
                                        <div class="row align-items-center">
                                            <div class="col-sm-6 col-md-4"><i class="fas fa-calendar"></i> Date</div>
                                            <input id="date-picker" name="date"
                                                class="form-control col-sm-6 col-md-4 bg-white" required />
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <div class="row align-items-center mt-3">
                                            <div class="col-sm-6 col-md-4"><i class="fas fa-clock"></i> Available Times
                                            </div>
                                            <select id="time-select" name="selected_time"
                                                class="col-sm-6 col-md-4 form-control" required>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="reservation-warning" class="alert alert-warning mt-2" style="display: none;">
                                        There are <span id="reservation-count"></span> passengers booked for this time! and
                                        <span id="seats-left"></span> seats remaining
                                    </div>

                                    <button type="submit" class="btn btn-secondary"><i
                                            class="fas fa-shopping"></i>Reserve</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('change', function(event) {
            if (event.target && (event.target.id === 'time-select' || event.target.id === 'date-picker')) {
                const selectedDate = document.getElementById('date-picker').value;
                const selectedTime = document.getElementById('time-select').value;
                const datetime = `${selectedDate} ${selectedTime}`;

                const reservationsCount = @json($bus->reservationsByDate)
                    .filter(res => new Date(res.reservation_date).toISOString().split('T')[0] === new Date(datetime)
                        .toISOString().split('T')[0])
                    .reduce((sum, res) => sum + Number(res.total_passengers), 0);

                const warningDiv = document.getElementById('reservation-warning');
                const countSpan = document.getElementById('reservation-count');
                const seatsLeftSpan = document.getElementById('seats-left');

                countSpan.innerText = reservationsCount;
                seatsLeftSpan.innerText = Number(@json($bus->seats)) - reservationsCount;
                warningDiv.style.display = 'block';
            }
        });

        document.getElementById('reservation-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const seatsLeftSpan = document.getElementById('seats-left');
            const passengersInput = document.querySelector('input[name="passengers"]');
            if (Number(seatsLeftSpan.innerText) < Number(passengersInput.value)) {
                alert('Not enough seats available for the number of passengers you selected!');
                return;
            }

            const selectedDate = document.getElementById('date-picker').value;
            const selectedTime = document.getElementById('time-select').value;

            if (!selectedDate || !selectedTime) {
                alert('Please select both a date and time.');
                return;
            }

            const datetime = `${selectedDate} ${selectedTime}`;

            const datetimeInput = document.createElement('input');
            datetimeInput.type = 'hidden';
            datetimeInput.name = 'scheduled_at';
            datetimeInput.value = datetime;

            this.appendChild(datetimeInput);

            this.submit();
        });

        const availableDays = @json(
            $bus->timetables->pluck('day')->map(function ($day) {
                return strtolower($day);
            }));

        const timetable = @json($bus->timetables);

        const dayMap = {
            sunday: 0,
            monday: 1,
            tuesday: 2,
            wednesday: 3,
            thursday: 4,
            friday: 5,
            saturday: 6,
        };
        const enabledDays = availableDays.map(day => dayMap[day]);

        flatpickr("#date-picker", {
            dateFormat: "Y-m-d",
            disable: [
                function(date) {
                    return !enabledDays.includes(date.getDay());
                }
            ],
            onChange: function(selectedDates, dateStr) {
                const timeSelect = document.getElementById('time-select');
                timeSelect.innerHTML = '';

                const selectedDate = new Date(selectedDates[0]);
                const dayName = Object.keys(dayMap).find(key => dayMap[key] === selectedDate.getDay());

                const availableTimes = timetable
                    .filter(entry => entry.day === dayName.charAt(0).toUpperCase() + dayName.slice(1))
                    .map(entry => entry.departure_time);

                availableTimes.forEach(time => {
                    const option = document.createElement('option');
                    option.value = time;
                    option.textContent = time;
                    timeSelect.appendChild(option);
                });
            }
        });
    </script>
@endsection
