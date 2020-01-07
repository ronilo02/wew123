@extends('layouts.master')

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="file-manager">                     
                       
                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#upload_file">Upload Files</button>
                        
                        
                        <div class="hr-line-dashed"></div>
                        <h5>Folders</h5>
                        <ul class="folder-list" style="padding: 0">
                            <li ><a href="{{ url('/files') }}" style="color:#1ab394"><i class="fa fa-folder" style="color:#1ab394"></i> Agreement Form</a></li>
                            <li><a href="{{ url('/files/proposals') }}" ><i class="fa fa-folder"></i> Proposals</a></li>
                            <li><a href="{{ url('/files/other-files') }}"><i class="fa fa-folder"></i> Other Files</a></li>
                        </ul>
                        {{-- <h5 class="tag-title">Tags</h5>
                        <ul class="tag-list" style="padding: 0">
                            <li><a href="#">Family</a></li>
                            <li><a href="#">Work</a></li>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Children</a></li>
                            <li><a href="#">Holidays</a></li>
                            <li><a href="#">Music</a></li>
                            <li><a href="#">Photography</a></li>
                            <li><a href="#">Film</a></li>
                        </ul> --}}
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($files as $file)
                        <div class="file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>
                                    @if(in_array($file->mime_type,$mime_type))
                                        <div class="image">
                                                <img alt="image" class="img-responsive" src="{{ url($file->file) }}">
                                        </div>
                                    @else
                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                    @endif
                                    <div class="file-name">
                                        {{ ucfirst($file->name) }}
                                        <br/>
                                        <small>Uploaded: {{ \Carbon\Carbon::parse($file->created_at)->format('M d,Y')}} </small>
                                        <br>
                                        <br>
                                      
                                        <a href="{{ url($file->file) }}" class="btn btn-xs btn-primary btn-block" > <i class="fa fa-download "></i> Download</a>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>        
                    @endforeach
                             
                </div>
            </div>
        </div>
    </div>
    <form role="form" action="{{ url('files') }}" id="edit-lead-form" method="POST" enctype="multipart/form-data">
        <!-- <input type="hidden" name="_method" value="PUT"> -->
    @csrf
    <div class="modal inmodal" id="upload_file" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated flipInY">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Upload Files</h4>
                        <small class="font-bold" style="color:#1ab394">*After editing this note it's advisable to notify the sale assigned on this author</small> 
                </div>
                <div class="modal-body">
                        <div class="form-group"><label>Name</label> <input type="text" name="name"  placeholder="Enter File Name" class="form-control" required="required"></div>
                        <div class="form-group"><label>File</label> <input type="file" name="file"  placeholder="Enter Subject" class="form-control" ></div>
                        <div class="form-group">
                            <label>Folder Category</label>
                            <select name="file_cat" id="file_cat" class="form-control">
                                @foreach($file_cat as $key=> $val)
                                  <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Save changes</button>
                </div>
                </div>
            </div>
    </div>
</form>
</div>
@endsection

@section('custom_js')
    <script>
        $(document).ready(function(){
            //Keyboard shortcuts for creating notes
            Mousetrap.bind('U', function(){
                        $('#upload_file').modal('toggle');
                  });
        });
    </script>
@endsection