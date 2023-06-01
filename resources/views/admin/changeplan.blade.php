
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
              <h3 class="box-title"><i class="fa fa-user"></i> SETTINGS</h3>
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
                                                    <th scope="col">Email Address</th>
                                                    <th scope="col">Current Plan</th>
                                                   
                                                  
                                                </tr>
</thead>
                                                @foreach($users as $user)
                                                <tr>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->level}}</td>
                                                
</tr>

@endforeach
                                            </thead>
                                            <tbody>   

</tbody>
                                        </table>
                                      <h3>CHANGE PLAN</h3>
                                      
                                      <form action="changeplan_db" method="post">
                                        @csrf
                                        <label>Select Plan</label>
                                        <select name="plan" class="form-control">
                                            <option value="Standard">Standard</option>
                                            <option value="Premium">Premium</option>
                                            <option value="Ultimate">Ultimate</option>
                                            <option value="Retirement">Retirement</option>
                                        </select>
                                        
                                        <input type="text" hidden class="form-control" required name="email" value="{{$email}}" /><br/>
                                        
                                        <input type="submit" class="btn btn-primary" value="UPDATE"/>
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