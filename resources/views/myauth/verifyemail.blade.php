@extends('myauth.app')
@section('content')
<div class="content-for-template  content-template-bg " >
<div class="row justify-content-center register-page">
<div class="col-lg-4 col-md-12  ml-auto mr-auto">
    <div class="card text-white bg-dark" style="margin-top:50px;margin-bottom:50px;">
        <div class="card-header text-center">
             Verify Email Address
        </div>
        <p class="font-12 text-danger text-center" id="err-regform"></p>
        <div class="card-body">
            <center>
                <div class="alert" style="display: none;margin: 5px;" id="errorshow">
                   
                </div>
            </center>
            <form class="reg-form" action="emailverify_db" method="post">
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
		 
                <div class="alert alert-success">
		 	Congratulations! Please proceed to verify your email address by providing the code that was sent to your email address below.
</div>
                <div class="form-group">
                    <label class="control-label" for="code">Verification Code:</label>
                    <input type="text" name="code"  placeholder="Verification Code" title="Please enter your verification code" required="" class="form-control">
                    
                </div>
                <input type="text" hidden value="{{$email}}" class="form-control" name="email"/>
                <div>
                         
                    <button type="submit" name="forgot" class="btn btn-own btn-lg btn-block">Verify</button>
                   
                    <!-- <div class="form-group" style="margin-top: 10px;">
                        <a class="btn btn-default form-control" href="register">Register</a>
                        
                    </div> -->
                </div>
     </form>
        </div>
        <div class="card-footer">

<div class="row">

    <!-- <div class="col-md-6 col-sm-12 text-center">
Forgot your password? <br><a href="password/reset" class="btn btn-info btn-sm">Reset now</a>        
    </div> -->

    

</div>



        </div>
      
    </div>
</div>
</div>

  
</div>


@endsection


