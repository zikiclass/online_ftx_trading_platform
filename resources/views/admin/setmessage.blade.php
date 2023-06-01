
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
        NOTIFICATIONS SETTINGS
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Notification Settings</li>
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
              <h3 class="box-title"><i class="fa fa-user"></i> NOTIFICATIONS SETTINGS</h3>
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
                    <th scope="col">TYPE</th>
                    <th scope="col">MESSAGE</th>
                    <th scop="col">ACTION</th>
                  
                </tr>
            </thead>
            <tbody>   
               @foreach($messages as $msg)
                 
                 <tr role="row" class="even"> 
                
                   
                <form method="post" action="delete_message">
                 @csrf
                 
                 @if($msg->status == 'Success')
                 <td style="color: green;">{{$msg->status}}</td>
                <td style="color: green;">{{$msg->message}}</td>
                @elseif($msg->status == 'Warning')
                <td style="color: orange;">{{$msg->status}}</td>
                <td style="color: orange;">{{$msg->message}}</td> 
                @else
                <td style="color: red;">{{$msg->status}}</td>
                <td style="color: red;">{{$msg->message}}</td> 
                @endif
               
               
                <input type="text" hidden value="{{$msg->id}}" name="id" />
                    
                    <td>        
                                                                     
                    <input type="submit" class="btn btn-danger btn-sm btn-icon " style="margin: 3px" value="DELETE"/>
                  
</td>
                    

                </form>

                
                   @endforeach
            </tbody> 
        </table>

            <h3>Set Notification</h3>
             <form action="set_notification_db" method="POST">

                @csrf
            
            <label style="color: #000!important;">MESSAGE TYPE</label><br/>
            <select name="msgtype" class="form-control">
            <option value="Success">Success</option>
            <option value="Errors">Error</option>
            <option value="Warning">Warning</option>
</select><br/>
            
                <label style="color: #000!important;">MESSAGE</label><br/>
                
            <textarea name="message" class="form-control"></textarea><br/>
           
            <input type="submit" value="SAVE" class="btn btn-primary"/>
          
        </form>
            <h3>Assign Notification</h3>
             <form action="assign_notification_db" method="POST">

                @csrf
                <label style="color: #000!important;">EMAIL</label><br/>
                <input type="text" value="{{$email}}" name="email" class="form-control" readonly /><br/>
            <label style="color: #000!important;">MESSAGE</label><br/>
            <select name="msgtype" class="form-control">
                <option value="No Message">No Message</option>
        @foreach($messages as $msg)
            <option value="{{$msg->id}}">{{$msg->message}}</option>
            
            @endforeach
</select><br/>
            
                
          
            <input type="submit" value="ASSIGN" class="btn btn-primary"/>
          
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