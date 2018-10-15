@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
    @if(isset($lead))
    <form role="form" action="{{ url('leads/'.$lead->id) }}" id="lead-form" method="POST">
     <input type="hidden" name="_method" value="PUT">
     @else
    <form role="form" action="{{ route('leads.store') }}" method="POST">
    @endif
         @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Author Overview</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>                            
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r">
                                <h3 class="m-t-none m-b" style="color:#1ab394"><i class="fa fa-info-circle" style="color:#1ab394"></i> Author Information</h3>
                                   
                                    <div class="form-group"><label>Firstname</label> <input type="text" name="firstname" value="@if(isset($lead)) {{ $lead->firstname }}  @endif" placeholder="Enter Firstname" class="form-control" required> </div>
                                    <div class="form-group"><label>Middlename</label> <input type="text" name="middlename" value="@if(isset($lead)) {{ $lead->middlenames }}  @endif" placeholder="Enter Middlename" class="form-control" ></div>
                                    <div class="form-group"><label>Lastname</label> <input type="text" name="lastname" value="@if(isset($lead)) {{ $lead->lastname }}  @endif" placeholder="Enter Lastname" class="form-control" required></div>
                                    
                                    <div class="form-group"><label>Primary Email</label> <input type="email" name="email" value="@if(isset($lead)) {{ $lead->email }}  @endif" placeholder="Enter Primary Email" class="form-control" required></div>
                            </div>
                            <div class="col-sm-6"><h3 class="m-t-none m-b" style="color:#1ab394"><i class="fa fa-phone-square fa-sm" style="color:#1ab394"></i> Contact Details</h3>
                                  
                                    <div class="form-group"><label>Home Phone</label> <input type="text" name="home_phone" value="@if(isset($lead)) {{ $lead->home_phone }}  @endif" placeholder="Enter Home Phone" class="form-control"></div>
                                    <div class="form-group"><label>Mobile Phone</label> <input type="text" name="mobile_phone" value="@if(isset($lead)) {{ $lead->mobile_phone }}  @endif" placeholder="Enter Mobile Phone" class="form-control"></div>
                                    <div class="form-group"><label>office Phone</label> <input type="text" name="office_phone" value="@if(isset($lead)) {{ $lead->office_phone }}  @endif" placeholder="Enter office Phone" class="form-control"></div>
                                    <div class="form-group"><label>Other Phone</label> <input type="text" name="other_phone" value="@if(isset($lead)) {{ $lead->other_phone }}  @endif" placeholder="Enter Other Phone" class="form-control"></div>
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                    <h3 class="m-t-none m-b" style="color:#1ab394"><i class="fa fa-map-marker" style="color:#1ab394"></i> Address Information</h3>
                                    <div class="form-group"><label>Street</label> <input type="text" name="street" value="@if(isset($lead)) {{ $lead->street }}  @endif" placeholder="Enter Street" class="form-control" ></div>
                                    <div class="form-group"><label>City</label> <input type="text" name="city" value="@if(isset($lead)) {{ $lead->city }}  @endif" placeholder="Enter City" class="form-control" required></div>
                                    <div class="form-group"><label>State</label> <input type="text" name="state" value="@if(isset($lead)) {{ $lead->state }}  @endif" placeholder="Enter State" class="form-control" required></div>
                                    <div class="form-group"><label>Postal Code</label> <input type="text" name="postal_code" value="@if(isset($lead)) {{ $lead->postal_code }}  @endif" placeholder="Enter Postal Code" class="form-control" required></div>
                                    <div class="form-group"><label>Country</label> 
                                        <select name="country" id="country" class="form-control">
                                                <option>Select Country</option>
                                            @foreach($countries as $key=>$val)
                                                <option value="{{$key}}" @if(isset($lead) && $key == $lead->country) selected="selected"  @endif>{{ $val }}</option>
                                            @endforeach
                                         </select>
                                    </div>
                                    <h3 class="m-t-none m-b" style="color:#1ab394"><i class="fa fa-map-marker" style="color:#1ab394"></i> Other Information</h3>
                                    <div class="form-group"><label>Website</label> <input type="text" name="website" value="@if(isset($lead)) {{ $lead->website }}  @endif" placeholder="Enter Website Link" class="form-control" ></div>
                                    <div class="form-group"><label>Remarks</label> <textarea name="remarks" value="@if(isset($lead)) {{ $lead->remarks }}  @endif" id="" placeholder="Add remarks or note..." class="form-control" cols="30" rows="10">@if(isset($lead)) {{ $lead->remarks }}  @endif</textarea></div>
                                    
                                        <div>
                                        <button  class="ladda-button btn btn-primary pull-right" data-style="slide-right" id="submit-user">Add</button>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
         
            <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title"> 
                        <h5> More Information</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                    <h3 class="m-t-none m-b" style="color:#1ab394"><i class="fa fa-book" style="color:#1ab394"></i> Book Information</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group" id="published_date">
                                        <label >Published Date</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="published_date" id="published_date" value="@if(isset($lead)) {{ date_format(date_create($lead->getBookInformation->published_date),'m/d/Y') }} @endif">
                                        </div>
                                    </div>
                                    <div class="form-group"><label>Previous Publisher</label> 
                                        <select name="previous_publisher" id="previous_publisher" class="form-control">
                                                <option>Select Publisher</option>
                                            @foreach($publisher as $key=>$val)
                                                <option value="{{$key}}" @if(isset($lead) && $key == $lead->getBookInformation->previous_publisher) selected="selected" @endif >{{ $val }}</option>
                                            @endforeach
                                         </select>
                                    </div>
                                    <div class="form-group"><label>Book Title</label> <input type="text" name="book_title" value="@if(isset($lead)) {{ $lead->getBookInformation->book_title }} @endif" placeholder="Enter Book Title" class="form-control" required></div>
                                    
                                    <div class="form-group"><label>Book Reference</label> <input type="text" name="book_reference" value="@if(isset($lead)) {{ $lead->getBookInformation->book_reference }} @endif" placeholder="Enter Book Reference" class="form-control" required></div>
                            </div>
                            <div class="col-sm-6">
                                    <div class="form-group"><label>Genre</label> <input type="text" name="genre" value="@if(isset($lead)) {{ $lead->getBookInformation->genre }} @endif" placeholder="Enter Genre" class="form-control" required></div>
                                    <div class="form-group"><label>ISBN</label> <input type="text" name="isbn" class="form-control" value="@if(isset($lead)) {{ $lead->getBookInformation->isbn }} @endif" data-mask="999-99-999-9999-9" placeholder=""></div>
                                    <div class="form-group"><label>Status</label> 
                                        <select name="status" id="status" class="form-control">
                                                <option>select status</option>
                                            @foreach($status as $key=>$val)
                                                <option value="{{$key}}" @if(isset($lead) && $key == $lead->status) selected="selected" @endif>{{ $val }}</option>
                                            @endforeach
                                         </select>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
       </form>
    </div>
@endsection

@section('custom_css')
    .avia-data-table td {
        font-size: 10px !important;
    }
@endsection

@section('custom_js')
    <script>
        $(document).ready(function(){
            $('#published_date .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy"
            });


        });
    </script>
@endsection