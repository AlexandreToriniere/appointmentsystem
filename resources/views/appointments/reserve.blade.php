@extends('layouts.home')

@section('content')
<div class="">
    <h1 class="center">
      Available Appointments
    </h1>
        <div class="row">
            <div>
                <h2 class="text-black">{{$service->name}}</h2>
                <h2 class="text-black">{{$service->price}}€</h2>
            </div>
            @foreach($appointments as $appointment)
                <div class="col 1">
                            @if(!$appointment['off'])
                                <h5 class="center">
                                    {{$appointment['date']}}
                                </h5>
                                <h5 class="center">
                                    <b>{{$appointment['day_name']}}</b>
                                </h5>
                            @endif
                    @if(!$appointment['off'])
                        @foreach($appointment['business_hours'] as $time)
                            @if (!in_array($time, $appointment['reserved_hours']))
                                <form action="/session" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="date" value=" {{$appointment['full_date']}}">
                                    <input type="hidden" name="time" value="{{$time}}">
                                    <input type="hidden" name="servicename" value="{{$service->name}}">
                                    <input type="hidden" name="price" value="{{$service->price}}">
                                        <button class="waves-effect waves-light btn info darken-2" type="submit">
                                            {{$time}}
                                        </button>
                                        <br>
                                        <br>
                                    </form>
                            @else
                                    <button class="waves-effect waves-light btn info darken-2" disabled>
                                        {{$time}}
                                    </button>
                            @endif
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.timepicker');
        var instances = M.Timepicker.init(elems, {
            twelveHour:false
        });
    });
</script>
@endsection
