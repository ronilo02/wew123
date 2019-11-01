@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Company Name</h5>
                        <div class="ibox-tools">
                            
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                         
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <form action="{{ url('company/'.$company->id) }}" method="POST" role="form">
                                <input type="hidden" name="_method" value="PUT">
                                    @csrf
                                <div class="form-group">
                                <input type="text" name="company_name" id="company_name" value="{{ $company->name }}" class="form-control" placeholder="Company Name" required/>
                                </div>
                                <div class="form-group">     
                                    <button class="ladda-button btn btn-block btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Company Branch</h5>
                        <div class="ibox-tools">
                            <button class="ladda-button btn btn-primary btn-xs" data-toggle="modal" data-target="#branchmodal"><i class="fa fa-plus"> New</i></button>   
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-permission" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Branch Name</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($company->branches as $b)
                                    <tr>
                                        <td>
                                            {{ $b->id }}
                                        </td>
                                        <td>
                                        <a data-toggle="modal" data-target="#branch{{ $b->id }}">{{ $b->name }}</a>
                                        </td>
                                    </tr>
                                    <form action="{{ url('branch/'.$b->id) }}" method="POST" role="form">
                                        <input type="hidden" name="_method" value="PUT">
                                        @csrf
                                        <div class="modal inmodal" id="branch{{ $b->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content animated flipInY">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <h4 class="modal-title">Add Branch</h4>                                    
                                                        </div>
                                                        <div class="modal-body">
                                                        <div class="form-group"><label>Branch Name</label> <input type="text" name="branch_name" value="{{ $b->name }}" placeholder="Enter branch name" class="form-control" required="required"></div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Add </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>   
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Branch Name</th>                         
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
                {{-- start of modal --}}
                <form role="form" action="{{ route('branch.store') }}" method="POST">
                        @csrf
                    <div class="modal inmodal" id="branchmodal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated flipInY">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Add Branch</h4>                                    
                                </div>
                                <div class="modal-body">
                                        <div class="form-group"><label>Branch Name</label> <input type="text" name="branch_name"  placeholder="Enter branch name" class="form-control" required="required"></div>
                                        <input type="hidden" name="company" value="{{ $company->id}}">
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
       $(document).ready(function(){
           
       });
        //Keyboard shortcuts for creating notes
            Mousetrap.bind('N', function(){
                        $('#branchmodal').modal('toggle');
                  });
    
   </script>
@endsection