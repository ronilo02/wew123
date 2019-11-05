@if($errors->any())
    <div class="modal inmodal fade" id="errorModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content ">
                    {{-- <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Add Notes</h4>
                        <small class="font-bold" style="color:#1ab394">*This notes represents for any updates of this author</small>
                    </div> --}}
                    <div class="modal-body" style="background-color:#9a33a6;color:white">
                      @if($errors->has('username'))  
                        @foreach($errors->all() as $error)
                          <i class="fa fa-exclamation-circle fa-lg"></i><strong> {{ $error }}</strong>
                        @endforeach
                      @elseif($errors->has('deactivated'))
                        @foreach($errors->all() as $error)
                                <i class="fa fa-lock"></i><strong> {{ $error }}</strong>
                        @endforeach
                      @endif  
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save </button>
                    </div> --}}
                </div>
            </div>
    </div>
@endif