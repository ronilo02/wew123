@if($message = session('message'))
    <br>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">x</span>
            </button>
            <strong>Success!</strong> {{ $message }}        
       
    </div>
@elseif($error_message = session('error_message'))
<br>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">x</span>
            </button>
            <strong>Error!</strong> {{ $error_message }}        
        
    </div>
@elseif($errors->any())
    <br>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">x</span>
            </button>
            @foreach($errors->all() as $error)
                <ul>
                    <li>
                        <strong>Error!</strong> {{ $error }}  
                    </li>
                </ul>

            @endforeach
    </div>
@endif