@extends('layouts.master')

@section('content')
<div class="wrapper wrapper-content">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">New</span>
                                <h5>Leads</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">22 285,400</h1>
                                <div class="stat-percent font-bold text-navy">20% <i class="fa fa-level-up"></i></div>
                                <small>Assigned Leads</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">OverAll</span>
                                <h5>Total Assigned Leads</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">60 420,600</h1>
                                <div class="stat-percent font-bold text-info">40% <i class="fa fa-level-up"></i></div>
                                <small>Total</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-warning pull-right">Monthly</span>
                                <h5>Qouta</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">$ 120 430,800</h1>
                                <div class="stat-percent font-bold text-warning">16% <i class="fa fa-level-up"></i></div>
                                <small>Personal Qouta</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">                  

                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Activity Stream</h5>
                                <span class="label label-primary">Update</span>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="ibox-content inspinia-timeline">
                                @foreach($activity_logs as $activity_log)
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-xs-3 date">
                                                <i class="fa fa-briefcase"></i>
                                                6:00 am
                                                <br/>
                                                <small class="text-navy">{{ $activity_log->created_at->diffForHumans() }}</small>
                                            </div>
                                            <div class="col-xs-7 content no-top-border">
                                                <p class="m-b-xs"><small>{{ $activity_log->causer->fullname() }}</small></p>

                                                <p>{{ $activity_log->description }}</p>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>
@endsection

@section('custom_js')
<script src="{{ asset('js/custom.js') }}"></script>
@endsection
