@extends('myauth.app')
@section('content')
<div class="content-for-template  content-template-bg " >
<div class="row justify-content-center register-page">
<div class="col-lg-4 col-md-12  ml-auto mr-auto">
    <div class="card text-white bg-dark" style="margin-top:50px;margin-bottom:50px;">
        <div class="card-header text-center">
             Forgot Password
        </div>
        <p class="font-12 text-danger text-center" id="err-regform"></p>
        <div class="card-body">
            <center>
                <div class="alert" style="display: none;margin: 5px;" id="errorshow">
                   
                </div>
            </center>
            <form class="reg-form" action="reset_password_db" method="post">
                @csrf
                
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
                <div class="form-group">
                    <label class="control-label" for="password">Password</label>
                    <input type="password" name="password"  placeholder="Password" title="Please enter your password" required="" class="form-control">
                    <span>@error('password'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">Confirm Password</label>
                    <input type="password" name="confirmpassword"  placeholder="Confirm Password" title="Please enter your confirm password" required="" class="form-control">
                    <span>@error('confirmpassword'){{ $message }} @enderror</span>
                </div>
                <input type="email" name="email" value="{{$email}}" hidden />
                <div>
                         
                    <button type="submit" name="forgot" class="btn btn-own btn-lg btn-block">Change Password</button>
                   
                    <!-- <div class="form-group" style="margin-top: 10px;">
                        <a class="btn btn-default form-control" href="register">Register</a>
                        
                    </div> -->
                </div>
     </form>
        </div>
        <div class="card-footer">





        </div>
      
    </div>
</div>
</div>

  
</div>


@endsection

