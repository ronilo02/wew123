@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enter Monthly Quota</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                         
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <form action="{{ route('quota.store') }}" method="POST" role="form">
                                    @csrf
                                <div class="form-group">
                                    <input type="text" min="0" name="quota" id="quota" class="form-control input-numeral" placeholder="quota"/>
                                </div>
                                <div class="form-group">     
                                    <button class="ladda-button btn btn-block btn-primary" type="submit">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Lists of Quota</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>                     
                         
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-permission" >
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Quota</th>
                                    <th>Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($quota as $q)
                            <tr @if(now()->month == date_format($q->created_at,'m')) style="background-color:#1ab394;color:#fff;cursor:pointer;" @endif data-toggle="modal" data-target="#notesModal{{ $q->id }}">
                                            <td> {{ date_format($q->created_at,'M') }}</td>
                                            <td>${{ number_format($q->amount,2) }}</td>
                                            <td>{{ date_format($q->created_at,'Y') }}</td>
                                              
                                                <div class="modal inmodal" id="notesModal{{ $q->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content animated flipInY">
                                                                    <form role="form" id="quota-form" action="{{ url('quota/'.$q->id) }}" method="POST">
                                                                        <input type="hidden" name="_method" value="PUT">  
                                                                        @csrf  
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                                <h4 class="modal-title">Update Monthly Quota</h4>
                                                                                {{-- <small class="font-bold" style="color:#1ab394">*This notes represents for any updates of this author</small> --}}
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <div class="form-group"><label>Quota</label> <input type="text" class="form-control input-numeral-format" name="quota" value="{{ number_format($q->amount,2) }}" placeholder="Enter quota" class="form-control" required="required"></div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                                                <button id="quota-submit" class="btn btn-primary">Save </button>
                                                                            </div>
                                                                        </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                          
                                        </tr>
                                        
                                    @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Month</th>
                                    <th>Qouta</th>    
                                    <th>Year</th>                             
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

@section('custom_js')
   <script>
       $(document).ready(function(){
           $('#quota-submit').on('click',function(e){
               e.preventDefault();
               $('#quota-form').submit();
           });

            var cleaveNumeral = new Cleave('.input-numeral', {
                    numeral: true,
                    numeralThousandsGroupStyle: 'thousand'
                });

                var cleaveNumeraltwo = new Cleave('.input-numeral-format', {
                    numeral: true,
                    numeralThousandsGroupStyle: 'thousand'
                });
    
       });
   </script>
@endsection