
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
        Account Verification
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">KYC Verification</li>
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
              <h3 class="box-title"><i class="fa fa-user"></i> KYC VERIFICATIONS</h3>
            </div>
              <!-- /.box-header -->

              <div class="box-body">
            <div class="table-responsive">
            @if(Session::get('success'))
		 <div class="alert alert-success">
		 	{{ Session::get('success') }}
</div>
		 @endif
            <table class="table table-xs table-border">
            
            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">EMAIL</th>
                                                    <th scope="col">FRONT</th>
                                                    <th scope="col">BACK</th>
                                                    <th scope="col">ACTION</th>
                                                  
                                                </tr>
</thead>
                                                @foreach($kyc_verification as $kyc)
                                                @if($kyc->status == 'UNVERIFIED')
                                                <form action="verify_kyc" method="post">
                                                  @csrf
                                                <tr>
                                                <td>{{$kyc->email}}</td>
                                                <td><img src="{{$kyc->front}}" width="80" height="100"/></td>
                                                <td><img src="{{$kyc->back}}" width="80" height="100"/></td>
                                                <input type="text" hidden name="email" value="{{$kyc->email}}"/>
                                                <td><input type="submit" value="VERIFY" class="btn btn-primary"/></td>
</tr>
</form>
@endif
@endforeach
                                            </thead>
                                            <tbody>   

</tbody>
                                        </table>
            </div>
            </div>
            <!-- /.box-body -->
             
           </div>
            <!-- /.box -->
         </div>
<div class="col-md-12">
          <div class="box box-solid bg-dark">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-user"></i> EMAIL/USER VERIFICATIONS</h3>
            </div>
              <!-- /.box-header -->

              <div class="box-body">
            <div class="table-responsive">
            
            <table class="table table-xs table-border">
            
            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">EMAIL</th>
                                                    <th scope="col">FULLNAME</th>
                                                    <th scope="col">COUNTRY</th>
                                                    <th scope="col">STATUS</th>
                                                    <th scope="col">ACTIONS</th>
                                                  
                                                </tr>
</thead>
                                                @foreach($user_email_verification as $user)
                                                @if($user->status == 'PENDING')
                                                <form action="user_verification" method="post">
                                                  @csrf
                                                <tr>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->fullname}}</td>
                                                <td>{{$user->country}}</td>
                                                <td>{{$user->status}}</td>
                                                <input type="text" hidden name="email" value="{{$user->email}}"/>
                                                <td><input type="submit" value="VERIFY" class="btn btn-primary"/></td>
</tr>
</form>
@endif
@endforeach
                                            </thead>
                                            <tbody>   

</tbody>
                                        </table>
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
            <a href="admin_" class="nav__link nav__link">
            <i class="material-icons nav__icon">dashboard</i>
            <span class="nav__text">Dashboard</span>
        </a>
       
            <a href="admin_verification_" class="nav__link nav__link--active">
            <i class="material-icons nav__icon">person</i>
            <span class="nav__text">Verification</span>
</a>
            
            <a href="admin_settings_" class="deposit__ nav__link">
            <i class="material-icons nav__icon">settings</i>
            <span class="nav__text">Settings</span>
</a>
            <a href="admin_message_" class="withdraw__ nav__link">
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