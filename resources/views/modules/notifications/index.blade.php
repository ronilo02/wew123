@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>View Notifications</h5>
                    </div>
                    <div class="ibox-content">
                        @foreach(Auth::user()->unreadNotifications as $notification)
                            @include ('modules.notifications.' . snake_case(class_basename($notification->type)))
                            <hr>
                        @endforeach

                        @if(count(Auth::user()->unreadNotifications))
                            <form action="/profile/{{ Auth::id() }}/notifications" method="POST">
                                {{ method_field('DELETE')}}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Mark all as read
                                </button>
                            </form>
                        @elseif(!count(Auth::user()->unreadNotifications))
                            <h5><em>There are no new notifications</em></h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection