@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                    <span class="pull-right"><i class="fa fa-dashboard"></i></span>
                </div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Clock
                    <span class="pull-right"><i class="fa fa-clock-o"></i></span>
                </div>

                <div class="panel-body">
                    <clock></clock>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
       <div class="col-md-2">
       </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-sm-6 offset-sm-6 col-md-9 offset-md-3 col-lg-9 offset-lg-3 col-xl-6 offset-xl-6">
                    <form action="{{route('search-events')}}" method="post" id="search-events" class="needs-validation">  
                            {{ csrf_field() }}
                            <div class="input-group mb-3">
                                <input type="text" id="event_search_box" class="form-control" name="event_search_box" placeholder="Search events">
                                <button type="submit">Search</button>
                            </div>
                    </form>
                    </div>
                </div>
                
        </div>
    </div>
</div>

{{-- @include('event.event-search-script') --}}
@endsection
