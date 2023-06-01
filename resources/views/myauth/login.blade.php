@extends('myauth.app')
@section('content')

<div class="content-for-template  content-template-bg " >
<div class="row justify-content-center register-page">
<div class="col-lg-4 col-md-12  ml-auto mr-auto">
    <div class="card text-white bg-dark" style="margin-top:50px;margin-bottom:50px;">
    <div class="processing" id="process" style="display:none;">
        <div class="process-content">
        <i class="loadin-icon fa fa-circle-o-notch fa-spin"></i>
        <span>Logging...</span>
        </div>
</div>
        <div class="card-header text-center" style="color: #fff!important;">
             Log in
        </div>
        <p class="font-12 text-danger text-center" id="err-regform"></p>
        <div class="card-body">
            <center>
            @if(Session::get('success'))
		 <div class="alert alert-success">
		 	{{ Session::get('success') }}
</div>
		 @endif

		 @if(Session::get('fail'))
		 <div class="alert alert-danger">
			{{ Session::get('fail') }}
</div>
		 @endif
                <div class="alert" style="display: none;margin: 5px;" id="errorshow">
                   
                </div>
            </center>
            <form id="login_" action=login_db method="POST">
            @csrf
                <div class="form-group">
                    <label class="control-label" for="email">Email Address</label>
                    <input type="text" name="email" id="email" class="form-control"  placeholder="Email Address" title="Please enter you email address" required="" class="form-control">
                    <span>@error('email'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class=form-control title="Please enter your password" placeholder="******" required="" class="form-control">
                    <span>@error('password'){{ $message }} @enderror</span>
                </div>
                <div>
                         
                    <button type="submit" name="login" id="btnLogin" class="btn btn-own btn-lg btn-block">
                        <i class="loadin-icon fa fa-spinner fa-spin" id="iLogin" style="display: none;"></i>
                        Login
                    </button>
                   
                   
                </div>
     </form>
        </div>
        <div class="card-footer">

<div class="row">
    <div class="col-md-12 col-sm-12 text-center">
Don't Have an Account? <a href="register" class="btn btn-primary btn-sm">Sign up</a>
<br/><br/>
 <a href="forgot" class="btn btn-info btn-sm">Forgot Password</a>
    </div>

</div>



        </div>
      
    </div>
</div>
</div>

  
</div>


@endsection

@push('scripts')
<script>

$(document).ready(function(){
    
    $('#btnLogin').click(function(){
        
        $('#process').show();
        setTimeout(function() { $('#process').hide(); }, 10000);
    });
});
    </script>
@endpush

