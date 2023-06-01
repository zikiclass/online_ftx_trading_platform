
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
        Deposit / Withdrawal
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Transactions</li>
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
              <h3 class="box-title"><i class="fa fa-user"></i> VIEW TRANSACTIONS</h3>
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
                                                    <th scope="col">AMOUNT</th>
                                                    <th scope="col">DATE</th>
                                                    <th scope="col">TYPE</th>
                                                    <th scope="col">METHOD</th>
                                                    <th scope="col">STATUS</th>
                                                    <th scop="col">ACTION</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>   
                                               @foreach($pending_transact as $transact)
                                                 
                                                 <tr role="row" class="even"> 
                                                
                                                   
                                                <form method="post" action="update_transaction">
                                                 @csrf
                                                 
                                                     
                                                <td style="color: red;">{{$transact->amount}}</td>
                                                <td style="color: red;">{{$transact->date}}</td> 
                                                <td style="color: red;">{{$transact->transact_type}}</td>
                                                <td style="color: red;">{{$transact->paymentmethod}}</td>
                                                <td style="color: red;">{{$transact->status}}</td>
                                               
                                                <input type="text" value="{{$transact->paymentmethod}}" name="paymentmethod" hidden/>
                                                <input type="text" value="{{$transact->transact_type}}" name="transact_type" hidden/>
                                                <input type="text" value="{{$transact->amount}}" name="amount" hidden/>
                                                <input type="text" hidden value="{{$transact->id}}" name="id" />
                                                <input type="text" hidden value="{{$transact->email}}" name="email" />
                                                    
                                                    <td>        
                                                                                                     
                                                    <input type="submit" class="btn btn-primary btn-sm btn-icon " style="margin: 3px" value="APPROVE"/>
                                                  
</td>
                                                    

                                                </form>
                                                </tr>
 @endforeach
 @foreach($approve_transact as $transact)
                                               
                                                <tr role="row" class="even"> 
                                                @if($transact->status == "APPROVED")
                                                    <td style="color: green;">{{$transact->amount}}</td>
                                                    <td style="color: green;">{{$transact->date}}</td> 
                                                    <td style="color: green;">{{$transact->transact_type}}</td>
                                                    <td style="color: green;">{{$transact->paymentmethod}}</td>
                                                    <td style="color: green;">{{$transact->status}}</td>
                                                    
                                                    @endif
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
    $('#approve_').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url: 'update_transaction',
            method: 'POST',
            dataType: 'JSON',
            contentType: false,
            processData: false,
            headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
            data: new FormData(this),
            success: function(data){
                if(data.success){
                    Swal.fire(
                        'Success!',
                        'Transaction approved successfully boss.',
                        'success'
                        );
                        window.location.reload();
                }
            }
        });

    });
   
});
    </script>
@endpush