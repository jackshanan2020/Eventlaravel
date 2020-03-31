@extends('html')

@section('content')
    <div class="row">
        <div class="col-md-7 col-sm-12">
            <h1>Upcoming events
                <span class="pull-right"><a href="{{route('event-add')}}" class="btn btn-primary">Add Event</a></span>
            </h1>

            <hr>

            @foreach($results as $upcomingEvent)
                <div class="panel panel-default event-panel">
                    <div class="panel-heading">
                        <h3 class="panel-heading">
                            <a href="{{route('event-view', $upcomingEvent->slug)}}">
                                #{{$upcomingEvent->id}} {{$upcomingEvent->title}}
                            </a>
                        </h3>
                        <small class="padding-left-10">{{$upcomingEvent->address}}</small>
                    </div>
                    <div class="panel-body">
                        <div class="meta-data margin-bottom-20">
                            <strong>Start date: </strong>{{$upcomingEvent->start_date}}
                            <br>
                            <strong>End date: </strong>{{$upcomingEvent->end_date}}
                            <br>
                            <strong>Created by: </strong><a href="#">{{$upcomingEvent->creator->name}}</a>
                        </div>
                        <div class="description margin-bottom-20">
                            {!! limit_words($upcomingEvent->description, 50) !!}
                        </div>
                        <div class="register-button-container">
                            @if($upcomingEvent->user === null)
                                <event-registration text="Register"
                                                    mode="btn-primary"
                                                    event-id="{{$upcomingEvent->id}}"></event-registration>
                            @else
                                <event-registration text="De-register"
                                                    mode="btn-warning"
                                                    event-id="{{$upcomingEvent->id}}"></event-registration>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            
    </div>
@endsection