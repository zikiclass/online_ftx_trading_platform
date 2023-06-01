
@extends('admin.app')
@section('content')
<div class="wrapper">

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <center>
        <div id="google_translate_element" style="margin-bottom: 10px;"></div>
    </center>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Withdrawals Settings
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Withdrawals Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-md-12" style="margin-bottom: 10px;">
        <script src="https://widgets.coingecko.com/coingecko-coin-price-marquee-widget.js"></script>
        <coingecko-coin-price-marquee-widget currency="usd" coin-ids="bitcoin,ethereum,eos,ripple,litecoin" locale="en"></coingecko-coin-price-marquee-widget>      
      </div>
      <div class="col-sm-12">
                </div>
    </div>  

<div class="row">




<div class="col-md-12">
          <div class="box box-solid bg-dark">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-user"></i> WITHDRAWALS SETTINGS</h3>
            </div>
              <!-- /.box-header -->

              <div class="box-body">
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
            <div class="table-responsive">
           
            <h3>Withdrawal Message</h3>
             <form action="withdraw_update_admin" method="POST">
                @csrf
            @foreach($users as $user)
            <label style="color: #000!important;">MESSAGE TYPE</label><br/>
            <select name="msgtype" class="form-control">
            <option value="success">Success</option>
            <option value="error">Error</option>
</select><br/>
            
                <label style="color: #000!important;">MESSAGE</label><br/>
                
            <textarea name="message" class="form-control">{{$user->withdrawal_message}}</textarea><br/>
            <label style="color: #000!important;">WITHDRAWAL CODE</label><br/>
            <input type="text" placeholder="Withdrawal Code" name="withcode" class="form-control" value="{{$user->withdrawal_code}}" /><br/>
            <label style="color: #000!important;">TRANSFER CODE</label><br/>
            <input type="text" placeholder="Transfer Code" name="transcode" class="form-control" value="{{$user->transfer_code}}" /><br/>
           <input type="text" name="email" value="{{$user->email}}" hidden/>
            <input type="submit" value="SAVE" class="btn btn-primary"/>
            @endforeach
        </form>
            </div>
            </div>
            <!-- /.box-body -->
             
           </div>
            <!-- /.box -->
         </div>





         
 </div>
<!-- End Row -->  
 
      
      

      

      </div>
      <!-- End Row -->

      
    </section>
    <!-- /.content -->
    <div class="nav-bottom">
            <a href="admin_" class="nav__link nav__link--active">
            <i class="material-icons nav__icon">dashboard</i>
            <span class="nav__text">Dashboard</span>
        </a>
       
            <a href="admin_verification_" class="nav__link nav__link">
            <i class="material-icons nav__icon">person</i>
            <span class="nav__text">Verification</span>
</a>
            
            <a href="admin_settings_" class="nav__link nav__link">
            <i class="material-icons nav__icon">settings</i>
            <span class="nav__text">Settings</span>
</a>
            <a href="admin_message_" class="nav__link nav__link">
            <i class="material-icons nav__icon">sms</i>
            <span class="nav__text">Message</span>
</a>
            <a href="logout" class="nav__link">
            <i class="material-icons nav__icon">logout</i>
            <span class="nav__text">Logout</span>
            </a>
            
</div>
  </div>

  <!-- /.content-wrapper -->

  @endsection
  @push('scripts')
<script>

$(document).ready(function(){
    
   
});
    </script>
@endpush