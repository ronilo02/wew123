@extends('layouts.master')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
            
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Leads</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-leads" >
                            <thead>
                                <tr>
                                    <th>Author</th>
                                    <th>Book Title</th>
                                    <th>Publisher</th>
                                    <th>Email</th>
                                    <th>Genre</th>
                                    <th>Status</th>
                                    <th>Assigned to</th>
                                    <th>Researcher</th>
                                    <th style="width:5%;"></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($leads as $lead)
                                <tr>
                                   
                                   <td ><a href="{{ url('leads/'.$lead->id.'/profile') }}" style="color:#1ab394;">{{ $lead->fullname() }} </a></td>
                                   <td>{{ $lead->getBookInformation->book_title }}</td>
                                   <td>{{ $lead->getBookInformation->getPublisher == null? " ":$lead->getBookInformation->getPublisher['name']}}</td>
                                   <td>{{ $lead->email }}</td>
                                   <td>{{ $lead->getBookInformation->genre }}</td>
                                   <td>{{ $lead->getStatus->name }}</td>
                                   <td>{{ $lead->getAssignee == null ? "" : $lead->getAssignee->fullname() }}</td>
                                   <td>{{ $lead->getResearcher->fullname() }}</td>
                                   <td></td>
                                </tr>
                            @endforeach    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Author</th>
                                    <th>Book Title</th>
                                    <th>Publisher</th>
                                    <th>Email</th>
                                    <th>Genre</th>
                                    <th>Status</th>
                                    <th>Assigned to</th>
                                    <th>Researcher</th>
                                    <th style="width:5%;"></th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
           
       </div>
    </div>
@endsection