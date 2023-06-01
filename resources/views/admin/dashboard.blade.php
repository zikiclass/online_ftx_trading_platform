
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
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
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
              <h3 class="box-title"><i class="fa fa-user"></i> NEW CUSTOMERS</h3>
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
            <table class="table table-xs table-border">
            
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">ACCOUNT INFO</th>
                                                    <th scope="col">EQUITY</th>
                                                    <th scope="col">ACTION</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>   
                                              @foreach($userroles as $userrole)
                                              <tr role="row" class="even">
                                              <td>{{$userrole->fullname}} <br>{{$userrole->email}}<br>
                                                    @if($userrole->status == 'PENDING')
                                                    <span style="color: red!important;">VERIFICATION:  {{$userrole->status}}</span>
                                                    @else
                                                    <span style="color: green!important;">VERIFICATION:  {{$userrole->status}}</span>
                                                    @endif
                                                </td>
                                                
                                                       
                                                       
                                                     <td></td>
                                                        <input type="text" name="email" value="{{$userrole->email}}" hidden style="display: none;"/>
                                                        
                                                        
                                                   
                                                    <td> 
                                                    <a href="upgrade_to_user?email={{$userrole->email}}" class="btn btn-default btn-sm btn-icon">Move To User</a>
                                                    
                                                    
                                                    </td> 

</tr>
                                              @endforeach
                                               @foreach($users as $user)
                                                <tr role="row" class="even"> 
                                                <form action="update_user_balance" method="post">
                                                    @csrf
                                                   
                                                    <td>{{$user->fullname}} <br>{{$user->email}}<br>
                                                    <b>Plan: </b>{{$user->level}}<br/>
                                                    @if($user->status == 'PENDING')
                                                    <span style="color: red!important;">VERIFICATION:  {{$user->status}}</span>
                                                    @else
                                                    <span style="color: green!important;">VERIFICATION:  {{$user->status}}</span>
                                                    @endif
                                                </td>
                                                
                                                        <td>  
                                                        
                                                          PROFIT: ({{$user->currency}})<br>
                                                          <input type="number" value="{{$user->profit}}" name="profit"/>
                                                          <br>
                                                          BONUS: ({{$user->currency}})<br>
                                                          <input type="number" value="{{$user->bonus}}" name="bonus"/>
                                                          <br>
                                                          INVESTED: ({{$user->currency}})<br>
                                                          <input type="number" value="{{$user->invested}}" name="invested"/>
                                                          <br>
                                                         Total: <b style="font-size: 17px!important; color: green;"> {{number_format($user->profit + $user->bonus + $user->invested,2) . ' ' . $user->currency}} </b><br>
                                                         <input type="submit" class="btn btn-primary btn-sm btn-icon " value="UPDATE BALANCE"/>
                                                         </td> 
                                                     
                                                        <input type="text" name="email" value="{{$user->email}}" hidden style="display: none;"/>
                                                        
                                                        
                                                   
                                                    <td> 
                                                        
                                                            
                                                    
                                                    <a href="admin_deposit_?email={{$user->email}}" class="btn btn-info btn-sm btn-icon">Transactions</a><br/><br/>
                                                    <a href="withdrawal_setup?email={{$user->email}}" class="btn btn-success btn-sm btn-icon">Withdrawal Process</a><br/><br/>
                                                    <a href="setmessage_admin?email={{$user->email}}" class="btn btn-warning btn-sm btn-icon">Set Notification</a><br/><br/>
                                                    <a href="changeplan?email={{$user->email}}" class="btn btn-danger btn-sm btn-icon">Change Plan</a><br/><br/>
                                                    <a href="upgrade_to_admin?email={{$user->email}}" class="btn btn-default btn-sm btn-icon">Upgrade To Admin</a><br/><br/>
                                                    </form>
                                                    <form action="delete_user" method="post">  
                                                    @csrf
                                                    <input type="text" name="email" value="{{$user->email}}" hidden style="display: none;"/>
                                                         
                                                    <button class="btn btn-danger btn-sm btn-icon icon-left" name="delete_client" id="delete_client" style="margin: 3px"><i class="entypo-cancel"></i>DELETE</button>
</form>    
                                                    </td> 
                                                 
                                                </tr>
                                                    @endforeach
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
            <a href="admin_" class="nav__link nav__link--active">
            <i class="material-icons nav__icon">dashboard</i>
            <span class="nav__text">Dashboard</span>
        </a>
            <a href="admin_verification_" class="profile__ nav__link">
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