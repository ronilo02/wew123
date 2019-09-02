@extends('layouts.master')

@section('content')
      
      <div class="row  border-bottom white-bg dashboard-header">
                  <div class="col-md-12">
                        @if(auth()->user()->can('edit.leads') || auth()->user()->hasRole('superadmin'))
                              <a href="{{ url('leads/'.$lead->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Edit Status"  class="pull-right"><i style="color:#1ab394" data-toggle="tooltip" data-placement="top" title="Edit Lead" class="fa fa-pencil"></i></a>
                        @endif
                          <h1>{{ $lead->fullName }}</h1>                 
                  </div>
                  <div class="col-sm-6">
                 
                  <h5  style="color:#1ab394">*Personal Information
                              <i class="fa fa-times-circle fa-2x pull-right" id="info_close" style="cursor:pointer;"></i>
                              <i class="fa fa-check-circle fa-2x pull-right" id="info_save" style="cursor:pointer;"></i>
                              <i class="fa fa-pencil  pull-right" id="info_pencil" data-toggle="tooltip" data-placement="top" title="Edit Contact Information" style="cursor:pointer;"></i>
                  </h5>
                  <ul class="list-group clear-list m-t">
                        <li class="list-group-item fist-item">
                              <div class="row">
                                    <div class="col-md-4">
                                          <span class="label label-danger"><i class="fa fa-map-marker"></i></span> Primary Address
                                    </div>
                                    <div class="col-md-8">
                                          <div id="info_address_display">
                                                <span class="pull-right" id="address_display" style="color:#b1aeae;">
                                                {{ $lead->street." ".$lead->city." ".$lead->state." ".$lead->postal_code." ,".$lead->country }}
                                                </span>
                                           </div>
                                           <div id="info_address_fields">
                                                <input type="text" id="primary-street"  style="text-align:right;margin-bottom:10px;" placeholder="Street" value="{{ $lead->street }}" class="form-control">
                                                <input type="text" id="primary-city"  style="text-align:right;margin-bottom:10px;" placeholder="City" value="{{ $lead->city}}" class="form-control">
                                                <input type="text" id="primary-state"  style="text-align:right;margin-bottom:10px;" placeholder="State" value="{{ $lead->state }}" class="form-control">
                                                <input type="text" id="primary-postal_code"  style="text-align:right;margin-bottom:10px;" placeholder="Postal Code" value="{{ $lead->postal_code }}" class="form-control">
                                                <input type="text" id="primary-country"  style="text-align:right;margin-bottom:10px;" placeholder="Country" value="{{ $lead->country }}" class="form-control">
                                           </div>
                                    </div>
                               </div>
                        </li>
                        <li class="list-group-item">
                              <div class="row">
                                    <div class="col-md-4">
                                         <span class="label label-info"><i class="fa fa-envelope"></i></span> Email   
                                    </div>
                                    <div class="col-md-8">
                                          <div id="info_email_display">
                                                <span class="pull-right" id="email_display"  style="color:#b1aeae;">
                                                {{ $lead->email}}
                                                </span>
                                          </div>
                                          
                                          <div id="info_email_fields">
                                                 <input type="email" id="email" style="text-align:right;" placeholder="Email" value="{{ $lead->email }}"  class="form-control">
                                          </div>
                                    </div>
                              </div>
                              
                              
                        </li>
                        <li class="list-group-item">
                              <div class="row">
                                    <div class="col-md-4">
                                          <span class="label label-primary"><i class="fa fa-globe"></i></span> Website
                                    </div>
                                    <div class="col-md-8">
                                          <div id="info_website_display">
                                                <span class="pull-right" id="website_display" style="color:#b1aeae;">
                                                      {{ $lead->Website }}
                                                </span>
                                           </div>
                                           <div id="info_website_fields">
                                                 <input type="text" id="website" style="text-align:right;" placeholder="Website Link" value="{{ $lead->Website }}"  class="form-control">
                                           </div>
                                    </div>
                              </div>
                             
                              
                        </li>
                        <li class="list-group-item">
                              <div class="row">
                                    <div class="col-md-4">
                                          <span class="label label-warning"><i class="fa fa-file-text-o"></i></span> Remarks
                                    </div>
                                    <div class="col-md-8">
                                          <div id="info_remarks_display">
                                                <span class="pull-right" id="remarks_display"  style="color:#b1aeae;">
                                                            {{ $lead->remarks }}
                                                      </span>
                                          </div>
                                          <div id="info_remarks_fields">
                                                <input type="text" id="remarks" style="text-align:right;" placeholder="Remarks"  value="{{ $lead->remarks }}" class="form-control">
                                          </div>
                                          
                                    </div>
                              </div>
                             
                              
                        </li>
                      
                  </ul>
                  </div>

                  <div class="col-sm-6">
                        <h5  style="color:#1ab394">*Contact Information 
                              <i class="fa fa-times-circle fa-2x pull-right" id="contact_close" style="cursor:pointer;"></i>
                              <i class="fa fa-check-circle fa-2x pull-right" id="contact_save" style="cursor:pointer;"></i>
                              <i class="fa fa-pencil  pull-right" id="contact_pencil" data-toggle="tooltip" data-placement="top" title="Edit Contact Information" style="cursor:pointer;"></i>
                        </h5>
                              <ul class="list-group clear-list m-t">
                                    <li class="list-group-item fist-item">
                                          <div class="row">
                                                <div class="col-sm-4">
                                                      <span class="label label-default"><i class="fa fa-phone"></i></span> Home Phone
                                                </div>
                                                <div class="col-sm-8">
                                                      <div id="contact_display">
                                                            <span class="pull-right" id="home_phone_display" style="color:#b1aeae;">
                                                            {{ $lead->home_phone }}
                                                            </span>
                                                      </div>
                                                      <div id="contact_fields">
                                                            <input type="text" name="home_phone" value="{{ $lead->home_phone }}" data-mask="(999) 999-9999"  id="home_phone" class="form-control">
                                                      </div>
                                                </div>
                                          </div>
                                    </li>
                                    <li class="list-group-item">
                                           <div class="row">
                                                <div class="col-sm-4">
                                                      <span class="label label-default"><i class="fa fa-mobile-phone"></i></span> Mobile Phone
                                                </div>
                                                <div class="col-sm-8">
                                                      <div id="contact_display">
                                                            <span class="pull-right" id="mobile_phone_display" style="color:#b1aeae;">
                                                                  {{ $lead->mobile_phone }}
                                                            </span>
                                                      </div>
                                                     <div id="contact_fields">  
                                                        <input type="text" name="mobile_phone"  value="{{ $lead->mobile_phone }}"  id="mobile_phone" class="form-control">
                                                      </div> 
                                                </div>
                                           </div>
                                          
                                        
                                    </li>
                                    <li class="list-group-item">
                                           <div class="row">
                                                <div class="col-sm-4">
                                                       <span class="label label-default"><i class="fa fa-phone-square"></i></span> office Phone
                                                </div>
                                                <div class="col-sm-8">
                                                      <div id="contact_display">
                                                            <span class="pull-right" id="office_phone_display" style="color:#b1aeae;">
                                                                  {{ $lead->office_phone }}
                                                            </span>
                                                      </div>
                                                      <div id="contact_fields">
                                                             <input type="text" name="office_phone"  value="{{ $lead->office_phone }}"  id="office_phone" class="form-control">
                                                      </div>
                                                </div>
                                           </div>
                                         
                                         
                                    </li>
                                    <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                        <span class="label label-default"><i class="fa fa-book"></i></span> Other Phone
                                                </div>
                                                <div class="col-sm-8">
                                                       <div id="contact_display">
                                                            <span class="pull-right" id="other_phone_display" style="color:#b1aeae;">
                                                                  {{ $lead->other_phone }}
                                                            </span>
                                                        </div>
                                                        <div id="contact_fields">
                                                              <input type="text" name="other_phone" value="{{ $lead->other_phone }}"   id="other_phone" class="form-control">
                                                        </div>
                                                </div>
                                           </div>                                         
                                        
                                    </li>
                              
                              </ul>
                         </div>
                  </div>

            <div class="wrapper wrapper-content animated fadeInRight">                  
                        <div class="ibox float-e-margins">
                              <div class="ibox-title">
                                  <h5><i class="fa fa-book"></i> Book Information</h5>
                                    <div class="ibox-tools">
                                    <a class="collapse-link">
                                          <i class="fa fa-chevron-up"></i>
                                    </a>
                                    
                                    </div>
                              </div>
                              <div class="ibox-content">
                              <div class="row">                  
                                     <div class="col-sm-8 b-r">
                                    <ul class="list-group clear-list m-t">
                                          <li class="list-group-item fist-item">                                               
                                                Book Title
                                                <span class="pull-right" style="color:#b1aeae;">
                                                {{ $lead->getBookInformation->book_title }}
                                                </span>
                                          </li>
                                          <li class="list-group-item">                                                
                                                Published Date
                                                <span class="pull-right" style="color:#b1aeae;">
                                                {{ $lead->getBookInformation->published_date }}
                                                </span>
                                          </li>
                                          <li class="list-group-item">                                               
                                                Previous Publisher
                                                <span class="pull-right" style="color:#b1aeae;">
                                                {{ $lead->getBookInformation->getPublisher->name }}
                                                </span>
                                          </li>
                                          <li class="list-group-item">                                               
                                                Book Reference
                                                <span class="pull-right" style="color:#b1aeae;">
                                                <a href="{{ $lead->getBookInformation->book_reference }}" target="_blank">{{ str_limit($lead->getBookInformation->book_reference,150) }}</a>
                                                </span>
                                          </li>                                        
                                    </ul>
                              </div>

                               <div class="col-sm-4 ">
                                    <ul class="list-group clear-list m-t">
                                          <li class="list-group-item fist-item" >
                                                <div id="label_section">
                                                      <span class="pull-right" id="status_section" style="color:#b1aeae;">
                                                            <label  class="{{ $lead->getStatus->class  }}" id="status_name">{{ $lead->getStatus->name }}</label>
                                                            <!-- <i style="color:#1ab394;cursor:pointer;" class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit Status" id="edit_status_pencil"></i>    -->
                                                      </span>
                                                      
                                                      <span id="status_label">Status</span>
                                                </div>
                                                <div class="row" id="field_section">
                                                      <div class="col-sm-10">
                                                            <select name="status" id="status_field" class="form-control">
                                                                  @foreach($status as $key => $val)
                                                                  <option value="{{ $key }}" name="{{ $val }}" @if($key == $lead->status) selected="selected" @endif>{{ $val }}</option>
                                                                  @endforeach 
                                                            </select>
                                                      </div>
                                                      <div class="col-sm-2">
                                                            <i style="margin-top:5px;color:#ed5565" class="fa fa-times-circle fa-2x " id="cancel_edit_status"></i>
                                                      </div>         
                                                </div> 
                                          </li>
                                          <li class="list-group-item">
                                                <span class="pull-right" style="color:#b1aeae;">
                                                {{ $lead->getBookInformation->genre}}
                                                </span>
                                                Genre
                                          </li>
                                          <li class="list-group-item">
                                                <span class="pull-right" style="color:#b1aeae;">
                                                {{ $lead->getBookInformation->isbn }}
                                                </span>
                                                ISBN
                                          </li>  
                                          <li class="list-group-item">
                                                <span class="pull-right" style="color:#b1aeae;">
                                                <label for="" class="label label-danger">{{ $lead->getResearcher->fullname() }}</label>
                                                </span>
                                                Researcher
                                          </li>                                                                        
                                    
                                    </ul>
                              </div>

                        </div>
                  </div>
            </div>

          
             <div class="wrapper wrapper-content animated fadeInRight">
                  
                  <div class="ibox float-e-margins">
                        <div class="ibox-title">
                              <h5><i class="fa fa-book"></i> Notes</h5>
                              
                              <div class="ibox-tools">
                              <span style="cursor:pointer;" data-toggle="modal" data-target="#notesModal">
                                    
                                    <i class="fa fa-plus" style="color:#1ab394"> New</i>
                              </span>   
                              <br>     
                              <small style="color:#1ab394">Shortcut keys for adding note, Click <b>shift + n</b>.</small>             
                        </div>
                   </div>

                  <form role="form" id="notesform" action="{{ url('leads/store/notes') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                         <div class="modal inmodal" id="notesModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Add Notes</h4>
                                            <small class="font-bold" style="color:#1ab394">*This notes represents for any updates of this author</small>
                                        </div>
                                        <div class="modal-body">
                                                <div class="form-group"><label>Subject</label> <input type="text" name="subject"  placeholder="Enter Subject" class="form-control" required="required"></div>
                                                <div class="form-group"><label>File</label> <input type="file" name="file"  placeholder="Enter Subject" class="form-control" ></div>
                                                <textarea name="notes" id="notes" cols="30" rows="10" class="form-control" placeholder="Notes Here...." required="required"></textarea>
                                                <input type="hidden" name="lead" value="{{ $lead->id }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     </form>       

                    <div class="ibox-content">
                        
                        <div class="table-responsive">
                              <table class="table table-striped table-hover dataTables-notes" >
                                    <thead>
                                          <tr>
                                                <th>Subject</th>
                                                <th>Notes</th>
                                                <th>Date Created</th>
                                                <th>Created By</th>
                                                <th></th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($notes as $n)
                                    <tr id="notes-row{{ $n->id }}">
                                                      <td><span style="cursor:pointer;color:#1ab394" data-toggle="modal" data-target="#notes{{ $n->id }}">{{ mb_strimwidth($n->subject, 0, 30, "...")  }}</span></td>
                                                      <td> {{ mb_strimwidth($n->notes, 0, 50, "...") }}</td>
                                                      <td>{{ date('M d,Y h:i a', strtotime($n->created_at)) }}</td>
                                                      <td>
                                                            @if($n->getUser->id == auth()->user()->id)
                                                            You 
                                                            @else
                                                            {{ $n->getUser->fullname() }}
                                                            @endif
                                                      </td>
                                                      <td>
                                                      <div class="pull-right">
                                                            <span style="cursor:pointer;color:#1ab394" data-toggle="modal" data-target="#editnotes{{ $n->id }}"><i class="fa fa-pencil" style="cursor:pointer;color:#1ab394;"></i></span>
                                                            <span style="cursor:pointer;color:#1ab394;margin-left:7px;" id="delete-note"><i class="fa fa-trash" style="cursor:pointer;color:#ed5565;"></i></span>
                                                            <input type="hidden" name="note-id" id="note-id" value="{{ $n->id }}">
                                                      </div>
                                                      </td>
                                                </tr>

                                                <!-- Notes View Modal -->
                                                <div class="modal inmodal" id="notes{{ $n->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                            <div class="modal-content animated flipInY">
                                                            <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                  <h4 class="modal-title">{{ ucfirst($n->subject) }}</h4>
                                                                  <small class="font-bold" style="color:#1ab394">By: {{ $n->getUser->fullname() }} | {{ date('M d,Y h:i a', strtotime($n->created_at)) }}</small> 
                                                            </div>
                                                            <div class="modal-body">
                                                                  <div class="row">
                                                                        <div class="col-mid-12">
                                                                        <p>
                                                                        {{ $n->notes }}
                                                                        </p>     
                                                                        </div>
                                                                        <div class="hr-line-dashed"></div>
                                                                        <div class="col-mi d-12">
                                                                        <div class="file-box">
                                                                              <div class="file">
                                                                                    <a href="#">
                                                                                    <span class="corner"></span>
                                                                                    @if($n->file_type == 'file')
                                                                                    <div class="icon">
                                                                                          <i class="fa fa-file"></i>
                                                                                    </div>
                                                                                    @else
                                                                                    <div class="image">
                                                                                          <img alt="image" class="img-responsive" src="{{ asset('storage/files/notes/'.$n->files) }}">
                                                                                    </div>
                                                                                    @endif
                                                                                    <div class="file-name">
                                                                                          <a href="{{ url('leads/'.$n->id.'/download') }}">{{ ucfirst($n->files) }}</a>
                                                                                          <br/>
                                                                                          <small>Added: {{ date('M d,Y h:i a', strtotime($n->created_at)) }}</small>
                                                                                    </div>
                                                                                    </a>
                                                                              </div>

                                                                        </div>     
                                                                        </div> 
                                                                  </div>       
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                                  
                                                            </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          @endforeach     
                                    </tbody>
                              </table>

                                  @foreach($notes as $note)  
                                    <!-- Modal Notes Edit -->
                                    <form role="form" action="{{ url('leads/notes/'.$note->id.'/update') }}" id="edit-lead-form" method="POST" enctype="multipart/form-data">
                                                      <!-- <input type="hidden" name="_method" value="PUT"> -->
                                                @csrf
                                                <div class="modal inmodal" id="editnotes{{ $note->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                            <div class="modal-content animated flipInY">
                                                            <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                  <h4 class="modal-title">Edit Note</h4>
                                                                  <small class="font-bold" style="color:#1ab394">*After editing this note it's advisable to notify the sale assigned on this author</small> 
                                                            </div>
                                                            <div class="modal-body">
                                                                  <div class="form-group"><label>Subject</label> <input type="text" name="subject" value="{{ $note->subject }}"  placeholder="Enter Subject" class="form-control" required="required"></div>
                                                                  <div class="form-group"><label>File</label> <input type="file" name="file"  placeholder="Enter Subject" class="form-control" ></div>
                                                                  <textarea name="notes" id="notes" cols="30" rows="10" class="form-control" value="{{ $note->notes }}" placeholder="Notes Here...." required="required">{{ $n->notes }}</textarea>
                                                                  <input type="hidden" name="lead" value="{{ $lead->id }}">    
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary" >Save changes</button>
                                                            </div>
                                                            </div>
                                                      </div>
                                                </div>
                                                </form>
                                     @endforeach           
                              </div>  

                    </div>          
             </div>
    </div>

@endsection

@section('custom_js')
      <script>
            $(document).ready(function(){
                  var lead       = {{ $lead->id }};
                  toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-bottom-center",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                              };

                  $('#edit-submit').on('click',function(e){
                        e.PreventDefault();                    
                        $('#edit-lead-form').submit();
                  });

                  $('#info_address_fields').hide();
                  $('#info_email_fields').hide();
                  $('#info_website_fields').hide();
                  $('#info_remarks_fields').hide();
                  // $('#info_address_display').hide();
                  // $('#info_email_display').hide();
                  // $('#info_website_display').hide();
                  // $('#info_remarks_display').hide();

                  //Status Jquery 

                  // $('#edit_status_pencil').hide();
                  $('#field_section').hide();

                  // $('#status_section').hover(function(){
                  //       $('#edit_status_pencil').show();
                  // },function(){
                  //       $('#edit_status_pencil').hide();
                  // });

                  $('#status_name').dblclick(function(){
                        $('#label_section').hide();
                        $('#field_section').show();
                  });

                  $('#cancel_edit_status').on('click',function(){
                        $('#label_section').show();
                        $('#field_section').hide();
                  });

                  $('#status_field').on('change',function(){
                        var new_status = $("#status_field").val();
                        var name       = $("#status_field").find('option:selected').attr("name");
                        
                        var url        = "leads/"+lead+"/update";                       
                     
                        $.ajax({
                              type:"POST",
                              url:url,
                              
                              data:{
                               status:new_status,
                               _token: "{{ csrf_token() }}",       
                              },
                              success:function(result){
                                    toastr["success"]("Status successfully updated to "+name);

                                    $("#status_name").html(name);
                                    $('#label_section').show();
                                     $('#field_section').hide();
                              },
                              error:function(error){
                                    toastr["error"]("Failed to update status!");

                              }
                             
                        });
                  });

                  //end of status jquery


                  //Contacts Jquery

                  $("div#contact_fields").hide();
                  $("#contact_save").hide();
                  $("#contact_close").hide();

                  $("#contact_pencil").on("click",function(){
                        $(this).hide();
                        $("#contact_save").show();
                        $("#contact_close").show();
                        $("div#contact_fields").show();
                        $("div#contact_display").hide();
                  });

                  $("#contact_close").on("click",function(){
                        $(this).hide();
                        $("#contact_save").hide();
                        $("#contact_pencil").show();
                        $("div#contact_fields").hide();
                        $("div#contact_display").show();
                  });

                  $("#contact_save").on("click",function(){
                        var home_phone = $("#home_phone").val();
                        var mobile_phone = $("#mobile_phone").val();
                        var office_phone = $("#office_phone").val();
                        var other_phone = $("#other_phone").val();
                        var url        = "/leads/"+lead+"/update";  

                        $.ajax({
                              type:"POST",
                              url:url,
                              data:{
                               home_phone:home_phone,
                               mobile_phone:mobile_phone,
                               office_phone:office_phone,
                               other_phone:other_phone,
                               _token: "{{ csrf_token() }}",       
                              },
                              success:function(result){
                                    toastr["success"]("Contact information successfully updated!");
                                     
                                    $("#home_phone").val(home_phone);
                                    $("#mobile_phone").val(mobile_phone);
                                    $("#office_phone").val(office_phone);
                                    $("#other_phone").val(other_phone);

                                    $("#home_phone_display").html(home_phone);
                                    $("#mobile_phone_display").html(mobile_phone);
                                    $("#office_phone_display").html(office_phone);
                                    $("#other_phone_display").html(other_phone);

                                    $("#contact_close").hide();
                                    $("#contact_save").hide();
                                    $("#contact_pencil").show();
                                    $("div#contact_fields").hide();
                                    $("div#contact_display").show();
                              },
                              error:function(error){
                                    toastr["error"]("Failed to update contact information!");
                              }
                             
                        });

                  });

                  //End of Contacts Jquery


                  //Keyboard shortcuts for creating notes
                  Mousetrap.bind('N', function(){
                        $('#notesModal').modal('toggle');
                  });

                  //Keyboard shortcuts for saving notes
                  // Mousetrap.bind('alt+s', function(){
                  //     $("#notesform").submit();
                  // });
                 
                 
                  //Starts of Personal Info Jquery

                  
                  $("#info_save").hide();
                  $("#info_close").hide();

                  $("#info_pencil").on("click",function(){
                        $(this).hide();
                        $("#info_save").show();
                        $("#info_close").show();
                        $('#info_address_fields').show();
                        $('#info_email_fields').show();
                        $('#info_website_fields').show();
                        $('#info_remarks_fields').show();
                        $('#info_address_display').hide();
                        $('#info_email_display').hide();
                        $('#info_website_display').hide();
                        $('#info_remarks_display').hide();
                  });

                  $("#info_close").on("click",function(){
                        $(this).hide();
                        $("#info_save").hide();
                        $("#info_pencil").show();
                        $('#info_address_fields').hide();
                        $('#info_email_fields').hide();
                        $('#info_website_fields').hide();
                        $('#info_remarks_fields').hide();
                        $('#info_address_display').show();
                        $('#info_email_display').show();
                        $('#info_website_display').show();
                        $('#info_remarks_display').show();
                  });

                  $("#info_save").on("click",function(){
                        
                        var street = $("#primary-street").val();
                        var city = $("#primary-city").val();
                        var state = $("#primary-state").val();
                        var country = $("#primary-country").val();
                        var postal_code = $('#primary-postal_code').val();
                        var email = $('#email').val();
                        var website = $('#website').val();
                        var remarks = $('#remarks').val(); 
                        var url    = "/leads/"+lead+"/update";  
                        
                        $.ajax({
                              type:"POST",
                              url:url,
                              data:{
                                    street:street,
                                    city:city,
                                    state:state,
                                    country:country,
                                    postal_code:postal_code,
                                    email:email,
                                    website:website,
                                    remarks:remarks,
                                    _token: "{{ csrf_token() }}",       
                              },
                              success:function(result){
                                    console.log(result);
                                    toastr["success"]("Personal information successfully updated!");                                     
                                    $("#primary-street").val(street);
                                    $("#primary-city").val(city);
                                    $("#primary-state").val(state);                                    
                                    $("#primary-country").val(country);
                                    $("#primary-postal_code").val(postal_code);
                                    $("#email").val(email);
                                    $("#website").val(website);
                                    $("#remarks").val(remarks);

                                    $("#address_display").html(street+' '+city+' '+state+' '+country+', '+postal_code);
                                    $("#email_display").html(email);
                                    $("#website_display").html(website);
                                    $("#remarks_display").html(remarks);

                                    $("#info_close").hide();
                                    $("#info_save").hide();
                                    $("#info_pencil").show();
                                    $('#info_address_fields').hide();
                                    $('#info_email_fields').hide();
                                    $('#info_website_fields').hide();
                                    $('#info_remarks_fields').hide();
                                    $('#info_address_display').show();
                                    $('#info_email_display').show();
                                    $('#info_website_display').show();
                                    $('#info_remarks_display').show();
                              },
                              error:function(error){
                                    toastr["error"]("Failed to update personal information!");
                              }
                             
                        });

                  });

                  $("#delete-note").on("click",function(){
                        var id = $("#note-id").val();
                        var url = "/leads/delete/notes";
                        swal({
                        title: "Are you sure you want to delete this note?",
                        text: "You will not be able to recover this note again!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                        }, function () {
                              $.ajax({                                                               
                                    type:"POST",
                                    url:url,
                                    data:{
                                          id:id,
                                          _token: "{{ csrf_token() }}",      
                                    },
                                    success:function(result){
                                          swal("Deleted!", "Your note successfully deleted!", "success");
                                          $("#notes-row"+id).remove();
                                    },
                                    error:function(result){
                                          console.log(result);
                                    }

                               });
                        });
                  });

            });
      </script>
@endsection