        
         <form role="form" action="{{ url('/leads/import/store') }}" method="POST">
         @csrf
         
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                        <div class="ibox-title">
                                <h5><i class="fa fa-drupal" style="color:#1ab394"></i> Valid Leads</h5>
                                <div class="ibox-tools">
                                Total : {{ count($valid_data)}}
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>                            
                                </div>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                            @if(count($valid_data) > 0)
                          <input type="hidden" name="data" value="{{ json_encode($valid_data) }}">
                                <table class="table table-striped table-bordered table-hover dataTables-lead-import" >
                                    <thead>
                                        <tr >
                                            <th >Author</th>
                                            <th >Publisher</th>
                                            <th >Mobile #</th>
                                            <th >Office #</th>
                                            <th >Phone #</th>
                                            <th >Other #</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($valid_data as $d)
                                        <tr style="text-align:left;">
                                            <td>{{ $d->first_name." ".$d->last_name}}</td>
                                            <td>{{ $d->previous_publisher}}</td>
                                            <td>{{ $d->mobile_phone}}</td>
                                            <td>{{ $d->office_phone}}</td>
                                            <td>{{ $d->home_phone}}</td>
                                            <td>{{ $d->other_phone}}</td>
                                        </tr>
                                        @endforeach   
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th >Author</th>
                                            <th >Publisher</th>
                                            <th >Mobile #</th>
                                            <th >Office #</th>
                                            <th >Phone #</th>
                                            <th >Other #</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <br>
                                <button class="btn btn-primary pull-right">Save</button>
                                @else
                                <h3 class="error-msg" style="color:#d0cdcd">No Valid Leads Found!</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
              </div>  

            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                        <div class="ibox-title">
                                <h5><i class="fa fa-arrows-alt" style="color:#ff2121"></i> Invalid Leads</h5>
                                <div class="ibox-tools">
                                Total : {{ count($invalid_data)}}
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>                            
                                </div>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                            @if(count($invalid_data) > 0)
                                <table class="table table-striped table-bordered table-hover dataTables-lead-import" >
                                    <thead>
                                        <tr>
                                            <th>Author</th>
                                           
                                            <th>Error Details</th>                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invalid_data as $id)                                       
                                            <tr>
                                                <td style="text-align:left;">{{ $id->author_name }}</td>                                              
                                                <td style="text-align:left;">
                                                 @foreach($id->error_details as $ed)
                                                    <a href="{{ url('leads/'.$ed->id.'/edit') }}" target="_target" style="color:red;">{{ $ed->description }}  </a>
                                                    <br/>
                                                @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Author</th>
                                            
                                            <th>Error Details</th>
                                            
                                        </tr>
                                    </tfoot>
                                </table>
                                @else
                                <h3 class="error-msg" style="color:#d0cdcd">No Invalid Leads Found!</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
    </form>