@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
            
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Company Lists</h5>
                        <div class="ibox-tools">
                            <div class="ibox-tools">
                                <button class="ladda-button btn btn-primary btn-xs" data-toggle="modal" data-target="#companymodal"><i class="fa fa-plus"> New</i></button>   
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-permission" >
                            <thead>
                                <tr>
                                    <th style="width:5%;"></th>
                                    <th>Name</th>
                                    <th>No. of Branch</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($company as $c)
                                    <tr>
                                        <td>{{ $c->id }}</td>
                                        <td><a href="{{ url('company/'.$c->id.'/edit') }}">{{ $c->name}} </a></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width:5%;"></th>
                                    <th>Name</th>
                                    <th>No. of Branch</th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>

                {{-- start of modal --}}
                <form role="form" action="{{ route('company.store') }}" method="POST">
                        @csrf
                    <div class="modal inmodal" id="companymodal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated flipInY">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Add Company</h4>                                    
                                </div>
                                <div class="modal-body">
                                        <div class="form-group"><label>Company Name</label> <input type="text" name="company_name"  placeholder="Enter company name" class="form-control" required="required"></div>
                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                   {{-- end of modal --}}
            </div>
           
       </div>
    </div>
@endsection

@section('custom_js')
    <script>
        //Keyboard shortcuts for creating notes
        Mousetrap.bind('N', function(){
                        $('#companymodal').modal('toggle');
                  });
    </script>
@endsection