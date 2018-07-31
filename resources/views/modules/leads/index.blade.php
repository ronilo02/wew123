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
                                    <th style="width:5%;"></th>
                                    <th>Author</th>
                                    <th>Book Title</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Assigned to</th>
                                    <th>Researcher</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($leads as $lead)
                                <tr>
                                   <td></td>
                                   <td ><a href="{{ url('leads/'.$lead->id.'/edit') }}" style="color:#1ab394;">{{ $lead->fullname() }} </a></td>
                                   <td>{{ $lead->getBookInformation->book_title }}</td>
                                   <td>{{ $lead->email }}</td>
                                   <td>{{ $lead->getStatus->name }}</td>
                                   <td></td>
                                   <td>{{ $lead->getResearcher->fullname() }}</td>
                                </tr>
                            @endforeach    
                           
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width:5%;"></th>
                                    <th>Author</th>
                                    <th>Book Title</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Assigned to</th>
                                    <th>Researcher</th>
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