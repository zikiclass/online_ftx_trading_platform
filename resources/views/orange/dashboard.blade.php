@extends('trade.app')
@section('content')
@if(Auth::user()->message)
@foreach($mainMsg as $msg)
<div class="{{$msg->status}}" id="mainMsg">
    <div>
    <i class="{{ $msg->icon }}" aria-hidden="true"></i>

        <h3>{{ $msg->status }}</h3>
        @if($msg->status == 'Errors')
        <p style="color: #fff!important;">{{ $msg->message }}</p>
        @else
        <p>{{ $msg->message }}</p>
        @endif
        <hr/>
        @if($msg->status == "Success")
        <button id="mainMsgBtn">OK</button>
        @endif
    
    </div>
</div>
@endforeach
@endif
<div id="wrapper">
<div class="processing" id="process" style="display:none;">
        <div class="process-content">
        <i class="loadin-icon fa fa-circle-o-notch fa-spin"></i>
        <span>Processing...</span>
        </div>
</div>
        <!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion toggled" id="accordionSidebar"
    style="background-color: #635506 !important">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="ultimate_dashboard">
        <div class="sidebar-brand-icon">
        <img id="logo" style="width: 60px; height: 40px;" class="img-responsive"
                                src="cloud/app/images/365.png"
                                alt="Online FTX Trading">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class=" nav-item dash  active">
        <a class="nav-link" href="ultimate_dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    

    <!-- Nav Item - Dashboard -->
    <li class=" nav-item prof profile__">
        <a class="nav-link">
            <i class="fa fa-user fa-tachometer-alt"></i>
            <span>Profile</span></a>
    </li>

    <hr class="sidebar-divider">


    <!-- Nav Item - Dashboard -->
    <li class=" nav-item upl " id="upload-id">
        <a class="nav-link">
        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
            <span>Upload Identification</span></a>
    </li>

    <hr class="sidebar-divider">


    <!-- Nav Item - Dashboard -->
    <li class=" nav-item fun deposit__">
        <a class="nav-link">
            <i class="fa fa-btc fa-tachometer-alt"></i>
            <span>Fund Account</span></a>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item wit withdraw__">
        <a class=" nav-link">
            <i class="fa fa-usd fa-tachometer-alt"></i>
            <span>Place Withdrawal</span></a>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class=" nav-item upg " id="upgrade">
        <a class=" nav-link">
        <i class="fa fa-plane" aria-hidden="true"></i>

            <span>Upgrade Account</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #FFD700 !important">

            <!-- Main Content -->
            <div id="content" class="bg-dark" style="background-color: #FFD700 !important">
                <!-- Topbar -->
<nav class="navbar navbar-expand navbar-dark bg-secondary topbar static-top shadow"
    style="background-color: #FFD700 !important">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" style="background-color: ##FFD700!important;">
        <i class="fa fa-bars" style="color: #000!important;"></i>
    </button>


    <div class="acct-stat" style="color: #000!important;">
                Account Status - <span
            class="text-capitalize font-weight-bold" style="color: #000!important;">{{Auth::user()->status}}</span>
<br/>
            Login IP Address - <span
            class="text-capitalize font-weight-bold" style="color: #000!important;">{{$reqIP}}</span>
        
    </div>
    
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">



        <!-- Nav Item - Alerts -->
       <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw" style="color: #000!important;"></i>
                <!-- Counter - Alerts -->
                
                @if($message_->count() > 0)
                <span class="badge badge-danger badge-counter">
                {{ $message_->count() }}
                </span>
                @endif
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                     Notification
                </h6>
                               
                              @foreach ($message as $msg)
                                                        
                                                         <div class="dropdown-item d-flex align-items-center msg-box" data-id="{{ $msg->id }}">
                                                             
                                                            <div class="mr-3">
                                                                <div class="icon-circle bg-primary">
                                                                    <i class="fa fa-envelope text-white"></i>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="small text-gray-500">
                                                                    {{ $msg->date }}
                                                                    </div>
                                                                    
                                                                    @if($msg->status == "UNREAD")
                                                                    <span class="font-weight-bold" id="msg-{{ $msg->id }}">{{$msg->title }} <br/>{{ $msg->message }}</span> 
                                                                    @else
                                                                            <span class="font-weight-light msg-content">{{$msg->title }} <br/>{{ $msg->message }}</span>
                                                                    @endif
                                                                            
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                       @endforeach 
                               
                               
                
                
                
                
                                <div class="dropdown-item text-center"><a class="small text-gray-500" style="text-decoration: none; padding: 14px; text-transform: uppercase;" href="readall">Read All</a> | <a class="small text-gray-500" style="text-decoration: none; padding: 14px; text-transform: uppercase;" href="unreadall">Unread All</a></div> 
            </div>
        </li>



        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">

                <span class="mr-2 d-none d-lg-inline text-white small"> {{ Auth::user()->fullname }}</span>
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2" style="color: #000!important;"></i>

                
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item changepassw_" href="#">
                    <i class="fa fa-key fa-sm fa-fw mr-2 text-dark"></i>
                    Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark"></i>
                    Logout
                </a>
               <div class="dropdown-divider"></div>

                             </div>
        </li>

    </ul>

</nav>


<div class="mb-2" style="background-color: #FFD700!important;">
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>

        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
            async>
            {
                "symbols": [{
                        "proName": "FOREXCOM:SPXUSD",
                        "title": "S&P 500"
                    },
                    {
                        "proName": "FOREXCOM:NSXUSD",
                        "title": "Nasdaq 100"
                    },
                    {
                        "proName": "FX_IDC:EURUSD",
                        "title": "EUR/USD"
                    },
                    {
                        "proName": "BITSTAMP:BTCUSD",
                        "title": "BTC/USD"
                    },
                    {
                        "proName": "BITSTAMP:ETHUSD",
                        "title": "ETH/USD"
                    }
                ],
                "colorTheme": "dark",
                "isTransparent": false,
                "displayMode": "adaptive",
                "locale": "en"
            }

        </script>
    </div>
    <!-- TradingView Widget END -->
</div>
<!-- End of Topbar -->

                <!-- Begin Page Content -->
<div class=" container-fluid" style="background-color: #FFD700!important;">
  <style>
      #profile_ p{
          color: #000!important;
      }
      #profile_ input[type=text]{
          color: #000!important;
          border: 1px solid #000!important;
      }
  </style>
<!-- PROFILE PAGE -->
<div id="profile_" style="color: #000!important;">
<h3 class="h3 mb-0 text-capitalize" style="color: #000!important;">Profile</h3>
<form action="profile-update" method="post">
    @csrf
            <div class="row">
                
                <div class="col-md-6 prof-div">
                <p>Full Name: </p>
                <input type="text" value="{{Auth::user()->fullname}}" readonly/>
                <p>Email Address: </p>
                <input type="email" class="prof-active" value="{{Auth::user()->email}}" name="email" />
                <span class="error">@error('email') {{ $message }} @enderror</span>
                <p>Mobile Number: </p>
                <input type="text" class="prof-active" maxlength="11" name="phone" value="{{Auth::user()->phone}}"/>
                <span class="error">@error('phone') {{ $message }}@enderror</span>
                <p>Registration Date: </p>
                <input type="text" value="{{Auth::user()->date}}" readonly/>
                <p>Account Status: </p>
                @if(Auth::user()->status == "PENDING")
                <input type="text" value="{{Auth::user()->status}}" class="prof-pending" readonly/>
                @else
                <input type="text" value="{{Auth::user()->status}}" class="prof-approved" readonly/>
                @endif
                
                <p>Plan: </p>
                <input type="text" value="{{Auth::user()->level}}" readonly/>
                <p>Country: </p>
                <input type="text" name="country" class="prof-active" value="{{Auth::user()->country}}"/>
                <span class="error">@error('country') {{ $message }} @enderror</span>
                
               
                <input type="submit" class="prof-btn" value="Update"/>
                </div>
                
                <div class="col-md-6">
                <div
                style="height:560px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px; width: 100%;">
                <div style="height:540px; padding:0px; margin:0px; width: 100%;"><iframe
                        src="https://widget.coinlib.io/widget?type=chart&theme=dark&coin_id=859&pref_coin_id=1505"
                        width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0"
                        border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div>

            </div>

                </div>
            </div>
        </form>
</div>



<!-- END OF PROFILE PAGE -->


<style>
      #deposit_ p, #deposit_ li, #deposit_ h3{
          color: #000!important;
      }
      #deposit_ input[type=text], input[type=number]{
          color: #000!important;
          border: 1px solid #000!important;
      }
  </style>

<div id="deposit_" style="color: #000!important;">

<h3 class="h3 mb-0 text-capitalize">Deposit</h3>



            <div class="row">
            
                <div class="col-md-5 prof-div">
                    <div id="dep1">
                    <form id="frmDep1" method=POST>
                    @csrf
                <p>Fill in your desired investment amount and payment method.</p>
                <br/>
                <p>Amount ({{Auth::user()->currency}}) *</p>
                <input type="number" name="amount" id="amtInput" required placeholder="@if(Auth::user()->currency == '$')Amount in U.S. Dollar (USD) @elseif(Auth::user()->currency == '£')Amount in British Pound (GBP) @else Amount in Euro (EUR) @endif" class="form-control"/>
               
                <p>Choose a Payment Method * </p>
                <select name="paymentmethod" id="paymentmethod" class="form-control">
                    <option value="Bitcoin (BTC)">Bitcoin (BTC)</option>
                    <option value="Ethereum (ETH)">Ethereum (ETH)</option>
                    <option value="Tether - trc20 (USDT)">Tether - trc20 (USDT)</option>
                    <!--<option value="Dogecoin (DODGE)">Dogecoin (DODGE)</option>-->
                </select>
                <input type="submit" id="dep1" class="prof-btn" value="Make Deposit"/>
                </form>
        </div>

                <div id="dep2" style="display: none;">
                <form method="post" enctype="multipart/form-data" id="dep2_">
                    @csrf
                    <h3>Bitcoin Payment</h3>
                    <ol type="1">
                        <li>Copy Company Wallet Address or Scan QR Code</li>
                        <li>Make Payment of <b><span id="amtPay"></span></b> to the Wallet Address Below.</li>
                        <li>Proceed to wallet and make payment</li>
                        <li>Upload Proof of Payment</li>
                    </ol>
                    <p><b>Note that payment will be confirmed</b></p>
                    <br/>
                    <!-- <h3>Scan QR Code</h3>
                    <br/>
                    {!! QrCode::size(200)->generate('1NGN8obPsjhYypLTPvB8VCuLD9sv6KP1mB') !!}
                    <br/>
                    <p>Wallet Address</p>
                    <br/> -->
                    <div class="copy-link">
                    <input type="text" readonly name="wallet" class="copy-link-input" id="wallet"/>
                    <button type="button" class="copy-link-button">
                    <span class="material-icons">content_copy</span>       
        </button>
        </div>

                    <br/><br/>
                    <p>Upload Proof of Payment</p>
                    <div style="display: flex; flex-direction: column">
                    <input type="file" name="paymentProof" id="paymentProof" onchange="PreviewImage();" accept="image/png, image/gif, image/jpeg"/>
                    <img src="" id="imgView" style="margin-top: 15px;"/>
                </div>
                    <br/>
                    <input type="submit"  class="prof-btn" value="Request Payment Confirmation"/>
                    

        </form>
        
                   
                </div>


                </div>

                
                
                <div class="col-md-7">
                <table class="table table-dark dep-tbl">
  <thead>
    <tr>
      <th scope="col">Amount</th>
      <th scope="col">Method</th>
      <th scope="col">Status</th>
      <th scope="col">Charge</th>
      <th scope="col">Transaction Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($deposit_rec as $dep_rec)
    <tr>
      <td>{{Auth::user()->currency . $dep_rec->amount . '.00'}}</td>
      <td>{{$dep_rec->paymentmethod}}</td>
      <td>{{$dep_rec->status}}</td>
      <td>{{Auth::user()->currency . floatval($dep_rec->amount) * 0.1 . '.00'}}</td>
      <td>{{$dep_rec->date}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

                </div>
            </div>
        

</div>
<div id="upgrade_" style="color: #000!important;">

<section class="pricing">
            <div class="container">
                <!-- Section Content Starts -->
                <p class="text-center" style="color: #fff!important;">Our payouts are fully Automatic, You can make withdrawal when due, Our system
                    automatically sends your profit to your local wallet so it can be easily converted into your
                    currency, please always make sure your account has valid information.</p>
                <div class="row pricing-tables-content pricing-page">
                    <div class="pricing-container">
                        <!-- Pricing Tables Starts -->
                        <ul class="pricing-list bounce-invert">
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <!-- Pricing Table #1 Starts -->
                                    <li>
                                        @if(Auth::user()->level == 'Standard')
                                        <header class="pricing-header">
                                            <h2 style="color: #5cb85c!important;">STANDARD PLAN <span style="color: #5cb85c!important;">{{Auth::user()->currency}}1,000.00 and more </span></h2>
                                            <div class="price">

                                                <span class="value" style="color: #5cb85c!important;">0.83%</span><br>
                                                <small style="color: #5cb85c!important;">PER HOUR</small>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="ultimate_dashboard" class="btn btn-success">CURRENT PLAN</a>
                                        </footer>
                                        @else
                                        <header class="pricing-header">
                                            <h2>STANDARD PLAN <span>{{Auth::user()->currency}}1,000.00 and more </span></h2>
                                            <div class="price">

                                                <span class="value">0.83%</span><br>
                                                <small>PER HOUR</small>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="#" class="btn btn-primary deposit__">UPGRADE</a>
                                        </footer>
                                        @endif
                                    </li>
                                    <!-- Pricing Table #1 Ends -->
                                </ul>
                            </li>
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <!-- Pricing Table #1 Starts -->
                                    <li>
                                    @if(Auth::user()->level == 'Premium')
                                        <header class="pricing-header">
                                            <h2 style="color: #5cb85c!important;">PREMIUM PLAN <span style="color: #5cb85c!important;">{{Auth::user()->currency}}6,000.00 and more </span></h2>
                                            <div class="price">

                                                <span class="value" style="color: #5cb85c!important;">1.25%</span><br>
                                                <small style="color: #5cb85c!important;">PER HOUR</small>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="ultimate_dashboard" class="btn btn-success">CURRENT PLAN</a>
                                        </footer>
                                        @else
                                        <header class="pricing-header">
                                            <h2>PREMIUM PLAN <span>{{Auth::user()->currency}}6,000.00 and more </span></h2>
                                            <div class="price">

                                                <span class="value">1.25%</span><br>
                                                <small>PER HOUR</small>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="#" class="btn btn-primary deposit__">UPGRADE</a>
                                        </footer>
                                        @endif
                                    </li>
                                    <!-- Pricing Table #1 Ends -->
                                </ul>
                            </li>
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <!-- Pricing Table #1 Starts -->
                                    <li>
                                    @if(Auth::user()->level == 'Ultimate')
                                        <header class="pricing-header">
                                            <h2 style="color: #5cb85c!important;">ULTIMATE PLAN <span style="color: #5cb85c!important;">{{Auth::user()->currency}}15,000.00 and more </span></h2>
                                            <div class="price">

                                                <span class="value" style="color: #5cb85c!important;">1.7%</span><br>
                                                <small style="color: #5cb85c!important;">PER HOUR</small>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                        <a href="ultimate_dashboard" class="btn btn-success">CURRENT PLAN</a>
                                        </footer>
                                        @else
                                        <header class="pricing-header">
                                            <h2>ULTIMATE PLAN <span>{{Auth::user()->currency}}15,000.00 and more </span></h2>
                                            <div class="price">

                                                <span class="value">1.7%</span><br>
                                                <small>PER HOUR</small>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="#" class="btn btn-primary deposit__">UPGRADE</a>
                                        </footer>
                                        @endif
                                    </li>
                                    <!-- Pricing Table #1 Ends -->
                                </ul>
                            </li>
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <!-- Pricing Table #1 Starts -->
                                    <li>
                                    @if(Auth::user()->level == 'Retirement')
                                        <header class="pricing-header">
                                            <h2 style="color: #5cb85c!important;">RETIREMENT PLAN <span style="color: #5cb85c!important;">{{Auth::user()->currency}}30,000.00 and more </span></h2>
                                            <div class="price">

                                                <span class="value" style="color: #5cb85c!important;">2.1%</span><br>
                                                <small style="color: #5cb85c!important;">PER HOUR</small>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                        <a href="ultimate_dashboard" class="btn btn-success">CURRENT PLAN</a>
                                        </footer>
                                        @else
                                        <header class="pricing-header">
                                            <h2>RETIREMENT PLAN <span>{{Auth::user()->currency}}30,000.00 and more </span></h2>
                                            <div class="price">

                                                <span class="value">2.1%</span><br>
                                                <small>PER HOUR</small>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="#" class="btn btn-primary deposit__">UPGRADE</a>
                                        </footer>
                                        @endif
                                    </li>
                                    <!-- Pricing Table #1 Ends -->
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Ends -->
        

</div>
<style>
      #upload_ p, h3, h4, h5, li{
          color: #000!important;
      }
      #deposit_ input[type=text], input[type=file]{
          color: #000!important;
          border: 1px solid #000!important;
      }
  </style>
<div id="upload_">
<h3 class="h3 mb-0 text-capitalize">Verification / Account</h3>
    <div class="row">
            <div class="col-md-4 prof-div">
            
                <div id="kycTitle">
                    <h4>KYC Verification</h4>
                    <p>Upload an identity document, for example, <b>Driver License, Voters Card, International Passport, National ID.</b></p>
                    @if($kyc_verification->count() <= 0)
                    <input type="text" value="UNVERIFIED" readonly class="prof-pending" />
                    @else
                    @foreach($kyc_verification as $kycverify)
                    @if($kycverify->status == 'UNVERIFIED' || $kycverify->status == '')
                    <input type="text" value="UNVERIFIED" readonly class="prof-pending" />
                    <button onclick="showKYC();" class="prof-btn">VERIFY</button>
                    @else
                    <input type="text" value="VERIFIED" readonly class="prof-approved" />
                    @endif
                    @endforeach
                    @endif
                    
                </div>
                        <div id="kycform" style="display: none;">
                            <img src="img/whtKyc.jpg" style="width: 100%; height: 150px; margin-top: 15px;" />
                            <form id="frmKYC" method="POST" enctype="multipart/form-data">
                                 @csrf
                            <h5>IDENTITY VERIFICATION</h5>

                            <p>Upload images of an ID Document(s) specified below;</p>

                            <ul>
                                <li>Driver's License</li>
                                <li>Passport</li>
                                <li>National Identity Card</li>
                            </ul>

                            <p><b>Tip: </b>Use clear and colored images with good lighting</p>
                            
                            <img src="" id=kycViewFront />&nbsp;&nbsp;<img src="" id=kycViewBack />
                            <p>Document Front View:</p>
                            <input type="file" name=kycfront id=kycfront required onchange="PreviewImageKYC1();" />
                            <p>Document Back View:</p>
                            <input type="file" name=kycback id=kycback required onchange="PreviewImageKYC2();" />

                            <input type="submit" class="prof-btn" value=Submit />
                            </form>
                        </div>
                        

               
            </div>
            <div class="col-md-8 prof-div card-upload" id="acctLevel">
            <div class="card-u">       
            <center>
                        <h4>Account Level</h4>
                        <h5>{{Auth::user()->level}}</h5>
                    </center>

                    <button onclick="acctlevel_();" class="prof-btn">Upgrade Account</button>
        </div>
                    <div class="card-u">
                    <h4>Referral Link</h4>
                    <p style="text-transform: none!important;">Automatically top up your account balance by sharing your referral link, Earn a percentage of whatever plan your referred user buys.</p>
                    <div class="copy-link copy-link-ref">
                    <input type="text" readonly name="copy-ref" class="copy-link-input copy-ref" value="https://onlineftxtrading.com/register_/{{Auth::user()->email}}" id="copy-ref"/>
                    <button type="button" class="copy-link-button copy-link-button-ref">
                    <span class="material-icons">content_copy</span>       
                    </button>
        </div>

            </div>
            
            </div>

    </div>
</div>
<style>
      #withdraw_ p, h3{
          color: #000!important;
      }
      #withdraw_ input[type=text], input[type=number]{
          color: #000!important;
          border: 1px solid #000!important;
      }
  </style>
<div id="withdraw_">
<h3 class="h3 mb-0 text-capitalize">Withdraw</h3>



            <div class="row">
            
                <div class="col-md-5 prof-div">
                    
                    <form id="frmWith" method=POST>
                    @csrf
                <p>Fill in your desired investment amount and payment method.</p>
                <br/>
                <p>Amount ({{Auth::user()->currency}}) *</p>
                <input type="number" name="amount" required id="withAmt" required placeholder="@if(Auth::user()->currency == '$')Amount in U.S. Dollar (USD) @elseif(Auth::user()->currency == '£')Amount in British Pound (GBP) @else Amount in Euro (EUR) @endif" class="form-control"/>
               
                <p>Choose Withdrawal Method * </p>
                <select name="withdrawalmethod" id="withdrawalmethod" class="form-control">
                    <option value="Crypto Wallet">Crypto Wallet</option>
                    <option value="Bank Account">Bank Account</option>
                </select>

                <div id="bankDetails" style="display: none;">
                <p>Bank Name:</p>
                <input type="text" name="bankname" id="bankname" placeholder="Bank Name" class="form-control"/>
                <p>Account Name:</p>
                <input type="text" name="acctname" id="acctname" placeholder="Account Name" class="form-control"/>
                <p>Account Number:</p>
                <input type="number" name="acctnumber" id="acctnumber" placeholder="Account Number" class="form-control"/>
                <p>Swift Code:</p>
                <input type="text" name="swiftcode" id="swiftcode" placeholder="Swift Code" class="form-control"/>
            @if(Auth::user()->withdrawal_code != '')
                <p>Withdrawal Code:</p>
                <input type="text" name="withcode" id="withcode" placeholder="Withdrawal Code" class="form-control"/>
                <p>Transfer Code:</p>
                <input type="text" name="transcode" id="transcode" placeholder="Transfer Code" class="form-control"/>
          
            @endif
            </div>

                <div id="cryptoDetails">
                <p>Wallet Type:</p>
                <select class="form-control" name="wallettype">
                    <option value="Bitcoin">Bitcoin</option>
                    <option value="Ethereum">Ethereum</option>
                    <option value="USDT TR20">USDT TR20</option>
                    <option value="Tron">Tron</option>
                    <option value="Doge Coin">Doge Coin</option>
                </select>
                <p>Wallet Address:</p>
                <input type="text" name="walletaddress" id="walletaddress" class="form-control" placeholder="Wallet Address"/>
                @if(Auth::user()->withdrawal_code != '')
                <p>Withdrawal Code:</p>
                <input type="text" name="withcode" id="withcode" placeholder="Withdrawal Code" class="form-control"/>
                <p>Transfer Code:</p>
                <input type="text" name="transcode" id="transcode" placeholder="Transfer Code" class="form-control"/>
          
            @endif   
            </div>

                <input type="submit" id="dep1" class="prof-btn" value="Submit"/>
                </form>
                </div>

                

               

                
                
                <div class="col-md-7">
                <table class="table table-dark dep-tbl">
  <thead>
    <tr>
      <th scope="col">Amount</th>
      <th scope="col">Method</th>
      <th scope="col">Status</th>
      <th scope="col">Charge</th>
      <th scope="col">Transaction Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($withdraw_rec as $with_rec)
    <tr>
      <td>{{Auth::user()->currency . $with_rec->amount . '.00'}}</td>
      <td>{{$with_rec->paymentmethod}}</td>
      <td>{{$with_rec->status}}</td>
      <td>{{Auth::user()->currency . floatval($with_rec->amount) * 0.1 . '.00'}}</td>
      <td>{{$with_rec->date}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

                </div>
            </div>
</div>
<style>
      #changepassw_ p, h3{
          color: #000!important;
      }
      #changepassw_ input[type=password]{
          color: #000!important;
          border: 1px solid #000!important;
      }
  </style>
<div id="changepassw_" style="display: none;">
<h3 class="h3 mb-0 text-capitalize">Change Password</h3>
<form id="changepassw" method="post">
    @csrf
            <div class="row">
            
                <div class="col-md-6 prof-div">
                
                <p>Old Password: </p>
                <input type="password" placeholder="Old Password" name="oldpassword"/>
                <span class="error">@error('oldpassword') {{ $message }} @enderror</span>
                <p>New Password: </p>
                <input type="password" placeholder="New Password" name="newpassword"/>
                <span class="error">@error('newpassword') {{ $message }} @enderror</span>
                <p>Confirm Password: </p>
                <input type="password" placeholder="Confirm Password" name="confirmpassword"/>
                <span class="error">@error('confirmpassword') {{ $message }} @enderror</span>

                <input type="submit" class="prof-btn" value="Change Password"/>
                </div>
                
                <div class="col-md-6">
                <div
                style="height:560px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px; width: 100%;">
                <div style="height:540px; padding:0px; margin:0px; width: 100%;"><iframe
                        src="https://widget.coinlib.io/widget?type=chart&theme=dark&coin_id=859&pref_coin_id=1505"
                        width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0"
                        border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div>

            </div>

                </div>
            </div>
        </form>

</div>



    <!-- Page Heading -->
    <div id="dashboard_">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h3 mb-0 text-capitalize" style="color: #000!important;">Account Type -
      
        {{ Auth::user()->level }}</h3>
        <div>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm deposit__"><i
                    class="fa fa-btc fa-sm text-white-50"></i> Fund Wallet</a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm withdraw__"><i
                    class="fa fa-usd fa-sm text-white-50"></i> Withdraw</a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Refer Friends
                & Get Rewarded
            </a>
            
        </div>

    </div>
    
    
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-2" style="height: 100px">
            <div class="card bg-primary shadow h-100 py-2" style="
                background: #fff !important;
            ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #000!important;">
                                Invested</div>
                            <div class="h5 mb-0 font-weight-bold" style="color: #000!important;">
                                {{ Auth::user()->currency . ' ' . number_format(Auth::user()->invested, 2) }}</div>
                        </div>
                        <div class="col-auto">
                            @if(Auth::user()->currency == "£")
                            <i class="fa fa-gbp fa-2x" style="color: #000!important;" aria-hidden="true"></i>
                            @elseif(Auth::user()->currency == "$")
                            <i class="fa fa-usd fa-2x" style="color: #000!important;"></i>
                            @else
                            <i class="fa fa-eur fa-2x" style="color: #000!important;" aria-hidden="true"></i>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-2" style="height: 100px">
            <div class="card bg-danger shadow h-100 py-2" style="
            background: #868e96 !important;
        ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Profit</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                {{ Auth::user()->currency . ' ' . number_format(Auth::user()->profit, 2) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-bar-chart fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-2" style="height: 100px">
            <div class="card bg-warning shadow h-100 py-2" style="
            background: #1e88e5 !important;
        ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Bonus</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                               {{ Auth::user()->currency . ' ' . number_format(Auth::user()->bonus, 2) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-money fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-2" style="height: 100px">
            <div class="card bg-success shadow h-100 py-2" style="
            background: #0d755d !important;
        ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Balance</div>
                            <div class="h5 mb-0 font-weight-bold text-white">
                                {{ Auth::user()->currency . ' ' . number_format(Auth::user()->bonus + Auth::user()->invested + Auth::user()->profit, 2) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-line-chart fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-2" style="height: 100px">
            <div class="card bg-secondary shadow h-100 py-2" style="
            background: #3ec3c3 !important;
        ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                BTC Equivalent</div>
                            <div class="h5 mb-0 font-weight-bold text-white" id="btc-balance" >
                                0.00000000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-btc fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-2" style="height: 100px">
            <div class="card bg-info shadow h-100 py-2" style="
            background: #1f1a40 !important;
        ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Refer Friends. Get Rewarded</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <div><a href="#"
                                        class="d-lg-inline-block btn btn-sm btn-primary shadow-sm">Refer Friends

                                    </a> </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- Content Row -->

    <div class="row mt-2">
        <div class="col-md-6 mb-3">
            <div
                style="height:560px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px; width: 100%;">
                <div style="height:540px; padding:0px; margin:0px; width: 100%;"><iframe
                        src="https://widget.coinlib.io/widget?type=chart&theme=dark&coin_id=859&pref_coin_id=1505"
                        width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0"
                        border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header  py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Transaction History</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <ul class="list-group">
                @foreach($transactions as $tran_rec)
                @if($tran_rec->transact_type == "deposit")
                @if($tran_rec->status == 'APPROVED')
                <li class="list-group-item mb-2  text-dark" style="color: purple!important;"><span style="text-transform: capitalize">{{$tran_rec->transact_type}}</span>  <span class="font-weight-bold">{{Auth::user()->currency . $tran_rec->amount . '.00'}}</span>
                {{$tran_rec->status . '  (' . $tran_rec->date . ')'}}
                @else
                <li class="list-group-item mb-2  text-dark" style="color: green!important;"><span style="text-transform: capitalize">{{$tran_rec->transact_type}}</span>  <span class="font-weight-bold">{{Auth::user()->currency . $tran_rec->amount . '.00'}}</span>
                {{$tran_rec->status . '  (' . $tran_rec->date . ')'}}
                @endif
                @else
                @if($tran_rec->status == 'APPROVED')
                <li class="list-group-item mb-2  text-dark" style="color: purple!important;"><span style="text-transform: capitalize">{{$tran_rec->transact_type}}</span>  <span class="font-weight-bold">{{Auth::user()->currency . $tran_rec->amount . '.00'}}</span>
                {{$tran_rec->status . '  (' . $tran_rec->date . ')'}}
                @else
                <li class="list-group-item mb-2  text-dark" style="color: red!important;"><span style="text-transform: capitalize">{{$tran_rec->transact_type}}</span>  <span class="font-weight-bold">{{Auth::user()->currency . $tran_rec->amount . '.00'}}</span>
                {{$tran_rec->status . '  (' . $tran_rec->date . ')'}}
                @endif
                
                @endif
            </li>
             @endforeach
        </ul>
                </div>
            </div>
        </div>
    </div>

        </div>
</div>


 
            </div>
           
            



<!-- BOTTOM NAVIGATION -->

<div class="nav-bottom">
            <a href="ultimate_dashboard" class="nav__link nav__link--active dash">
            <i class="material-icons nav__icon">dashboard</i>
            <span class="nav__text">Dashboard</span>
        </a>
            <div class="profile__ nav__link prof">
            <i class="material-icons nav__icon">person</i>
            <span class="nav__text">Profile</span>
        </div>
            
            <div class="deposit__ nav__link dep">
            <i class="material-icons nav__icon">currency_exchange</i>
            <span class="nav__text">Deposit</span>
        </div>
            <div class="withdraw__ nav__link with">
            <i class="material-icons nav__icon">account_balance_wallet</i>
            <span class="nav__text">Withdraw</span>
        </div>
            <a href="logout" class="nav__link">
            <i class="material-icons nav__icon">logout</i>
            <span class="nav__text">Logout</span>
            </a>
            
</div>

<!-- END OF BOTTOM NAVIGATION -->
            @endsection

            @push('scripts')
            <script>

                //loading function
function loadspinner(){
    $('#process').show();
    setTimeout(function() { $('#process').hide(); }, 2000);
}
//end of spinner function



                document.querySelectorAll(".copy-link").forEach(copyLinkContainer => {
                    const inputField = copyLinkContainer.querySelector(".copy-link-input");
                    const copyButton = copyLinkContainer.querySelector(".copy-link-button");
                    const text = inputField.value;
                    inputField.addEventListener("focus", () => inputField.select());

                    copyButton.addEventListener("click", () => {
                        const text = inputField.value;
                        inputField.select();
                        navigator.clipboard.writeText(text);
                        Swal.fire(
                        'Copied!',
                        'Wallet has been copied',
                        'success'
                        )
                    })
                });
                document.querySelectorAll(".copy-link-ref").forEach(copyLinkContainer => {
                    const inputField = copyLinkContainer.querySelector(".copy-ref");
                    const copyButton = copyLinkContainer.querySelector(".copy-link-button-ref");
                    const text = inputField.value;
                    inputField.addEventListener("focus", () => inputField.select());

                    copyButton.addEventListener("click", () => {
                        const text = inputField.value;
                        inputField.select();
                        navigator.clipboard.writeText(text);
                        Swal.fire(
                        'success!',
                        'Referral Link Copied Successfully',
                        'success'
                        )
                    })
                });
               

            //    make withdrawal controls visible on select click
            const withselect = document.getElementById("withdrawalmethod");
            const bankDetails = document.getElementById("bankDetails");
            const cryptoDetails = document.getElementById("cryptoDetails");
            withselect.addEventListener('change', function handleChange(event){
                    if(event.target.value === 'Crypto Wallet'){
                        document.getElementById("bankDetails").style.display = "none";
                        document.getElementById("cryptoDetails").style.display = "block";
                    }
                    else if(event.target.value === 'Bank Account'){
                        document.getElementById("bankDetails").style.display = "block";
                        document.getElementById("cryptoDetails").style.display = "none";
                    }
                    
            });
            function showKYC(){
                loadspinner();
                document.getElementById('kycform').style.display = "block";
                document.getElementById('kycTitle').style.display = "none";
                
            }
            function acctlevel_(){
                loadspinner();
                Swal.fire(
  'Success',
  'Contact Support or Agent for more information',
  'question'
);
            }
            function PreviewImage(){
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("paymentProof").files[0]);
    oFReader.onload = function(oFREvent){
        document.getElementById("imgView").src = oFREvent.target.result;
        document.getElementById("imgView").width = 150;
        document.getElementById("imgView").height = 150;
    };
}
            function PreviewImageKYC1(){
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("kycfront").files[0]);
    oFReader.onload = function(oFREvent){
        document.getElementById("kycViewFront").src = oFREvent.target.result;
        document.getElementById("kycViewFront").width = 150;
        document.getElementById("kycViewFront").height = 100;
    };
}
            function PreviewImageKYC2(){
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("kycback").files[0]);
    oFReader.onload = function(oFREvent){
        document.getElementById("kycViewBack").src = oFREvent.target.result;
        document.getElementById("kycViewBack").width = 150;
        document.getElementById("kycViewBack").height = 100;
    };
}
                $(document).ready(function(){

                    //change of password

                    $('#changepassw').on('submit', function(e){
                        e.preventDefault();
                        $.ajax({
                            url: 'changepassword',
                            method: 'POST',
                            dataType: 'JSON',
                            contentType: false,
                            processData: false,
                            data: new FormData(this),
                            success: function(data){
                                if(data.success){
                                    
                                    Swal.fire(
                                    'Success!',
                                    data.success,
                                    'success'
                                    );

                                    
                                }
                                if(data.fail){
                                    Swal.fire(
                                    'Error!',
                                    data.fail,
                                    'error'
                                    );
                                   
                                }

                               
                            }
                        });
                    });
                    // Upload Payment Proof
                    $('#dep2_').on('submit', function(e){
                        e.preventDefault();
                        $.ajax({
                            url: "upload_proof",
                            type: "POST",
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(data){
                                if(data.success){
                                    Swal.fire(
                                    'Success!',
                                    'Your payment proof has been uploaded and if confirmed, this transaction will be treated as soon as possible.',
                                    'success'
                                    );
                                    $('#dep2_')[0].reset();
                                    document.getElementById("imgView").src = "";
                                    window.location.reload();
                                }
                            }
                        });
                    });
                    // End of Upload Payment Proof


                    //submit kyc verification

                    $('#frmKYC').on('submit', function(event){
                        event.preventDefault();
                        loadspinner();
                        $.ajax({
                            url: 'kyc_upload',
                            type: 'POST',
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(data){
                                if(data.success){
                                    Swal.fire(
                        'Successful!',
                        'Document Submitted For Review',
                        'success'
                        );
                        $('#frmKYC')[0].reset();
                        document.getElementById('kycViewFront').src = "";
                        document.getElementById('kycViewBack').src = "";
                        document.getElementById('kycViewBack').height = 0;
                        document.getElementById('kycViewBack').width = 0;
                        document.getElementById('kycViewFront').height = 0;
                        document.getElementById('kycViewFront').width = 0;
                        document.getElementById('kycform').style.display = "none";
                        document.getElementById('kycTitle').style.display = "block";

                                }
                                else if(data.error){
                                    Swal.fire({
  icon: 'error',
  title: 'Verification in process...',
  text: 'Please wait for your KYC to be verified. We apologise for the delay in verification process!'
})
                        $('#frmKYC')[0].reset();
                        document.getElementById('kycViewFront').src = "";
                        document.getElementById('kycViewBack').src = "";
                        document.getElementById('kycViewBack').height = 0;
                        document.getElementById('kycViewBack').width = 0;
                        document.getElementById('kycViewFront').height = 0;
                        document.getElementById('kycViewFront').width = 0;
                        document.getElementById('kycform').style.display = "none";
                        document.getElementById('kycTitle').style.display = "block";

                                }
                            }
                        });
                    });


                    $('#frmWith').on('submit', function(event){
                        event.preventDefault();
                        loadspinner();
                        $.ajax({
                            url: 'withdraw_',
                            method: 'POST',
                            dataType: 'JSON',
                            processData: false,
                            data: new FormData(this),
                            contentType: false,
                            success: function(data){
                                if(data.fail){
                                    Swal.fire(
                        'Error!',
                        data.fail,
                        'error'
                        );
                        document.getElementById('withAmt').value = '';
                        document.getElementById('walletaddress').value = '';
                        document.getElementById('bankname').value = '';
                        document.getElementById('acctname').value = '';
                        document.getElementById('acctnumber').value = '';
                        document.getElementById('swiftcode').value = '';
                        document.getElementById('withcode').value = '';
                        document.getElementById('transcode').value = '';
                                }
                                if(data.success){
                                    Swal.fire(
                        'Withdraw Pending!',
                        data.success,
                        'success'
                        );
                        document.getElementById('withAmt').value = '';
                        document.getElementById('walletaddress').value = '';
                        document.getElementById('bankname').value = '';
                        document.getElementById('acctname').value = '';
                        document.getElementById('acctnumber').value = '';
                        document.getElementById('swiftcode').value = '';
                        document.getElementById('withcode').value = '';
                        document.getElementById('transcode').value = '';
                       // window.location.reload();
                                }
                            }
                        });
                    });
                    $('#frmDep1').on('submit', function(event){
                        event.preventDefault();
                        loadspinner();
                        $.ajax({
                            url: 'dep_',
                            method: 'POST',
                            data: new FormData(this),
                            dataType: 'JSON',
                            processData: false,
                            contentType: false,
                            success: function(data){
                                if(data.success){
                                    
                                  document.getElementById('dep1').style.display = "none";
                                  document.getElementById('dep2').style.display = "block";
                                  var currency_symbol = "";
                                  var amt = document.getElementById('amtInput').value;
                                  var e = document.getElementById('paymentmethod');
                                  var numb = e.options[e.selectedIndex].value;
                                  var paymText = e.options[e.selectedIndex].text;
                                  if(paymText == "Bitcoin (BTC)"){
                                  document.getElementById('amtPay').innerHTML = amt + " BTC";
                                  currency_symbol = "btc";
                                  }
                                  else if(paymText == "Ethereum (ETH)"){
                                  document.getElementById('amtPay').innerHTML = amt + " ETH";
                                  currency_symbol = "eth";
                                  }
                                  else if(paymText == "Tether - trc20 (USDT)"){
                                  document.getElementById('amtPay').innerHTML = amt + " USDT";
                                  currency_symbol = "tether";
                                  }
                                  else{
                                    document.getElementById('amtPay').innerHTML = amt + " DODGE";
                                    currency_symbol = "dogecoin";
                                  }
                                  
                                  document.getElementById('amtInput').value = '';
                                
                                  $.ajax({
                                    url: 'getWallet_/'+currency_symbol,
                                    type: 'GET',
                                    dataType: 'JSON',
                                    processData: false,
                                    contentType: false,
                                    success: function(data){
                                        if(data.success){
                                            document.getElementById('wallet').value = data.success;
                                            $('#frmDep1')[0].reset();
                                        }
                                    }
                                  });
                                }
                            }
                        });
                        
                    });
                    $('#mainMsgBtn').click(function(){
                        $.ajax({
                            url: 'removemsg',
                            dataType: 'JSON',
                            type: 'GET',
                            success: function(data){
                                if(data.success){
                                    $('#mainMsg').fadeOut();
                                }
                            }
                        })
                        
                    })
                    $('.profile__').click(function(){
                        loadspinner();
                        document.getElementById('profile_').style.display = "block";
                        document.getElementById('dashboard_').style.display = "none";
                        document.getElementById('deposit_').style.display = "none";
                        document.getElementById('upgrade_').style.display = "none";
                        document.getElementById('upload_').style.display = "none";
                        document.getElementById('withdraw_').style.display = "none";
                        document.getElementById('changepassw_').style.display = "none";


                        $('.dash').removeClass('active');
                        $('.nav-item').removeClass('active');
                        $('.prof').addClass('active');
                       
                        $('.nav__link').removeClass('nav__link--active');
                        $('.prof').addClass('nav__link--active');

                        $("html, body").animate({ scrollTop: 0 }, "slow");

                          });
                    $('#upload-id').click(function(){
                        loadspinner();
                        document.getElementById('profile_').style.display = "none";
                        document.getElementById('dashboard_').style.display = "none";
                        document.getElementById('deposit_').style.display = "none";
                        document.getElementById('upgrade_').style.display = "none";
                        document.getElementById('upload_').style.display = "block";
                        document.getElementById('withdraw_').style.display = "none";
                        document.getElementById('changepassw_').style.display = "none";

                        $('.dash').removeClass('active');
                        $('.nav-item').removeClass('active');
                        $('.upl').addClass('active');

                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    })
                    $('.deposit__').click(function(){
                        loadspinner();
                        document.getElementById('profile_').style.display = "none";
                        document.getElementById('dashboard_').style.display = "none";
                        document.getElementById('deposit_').style.display = "block";
                        document.getElementById('upgrade_').style.display = "none";
                        document.getElementById('upload_').style.display = "none";
                        document.getElementById('withdraw_').style.display = "none";
                        document.getElementById('dep1').style.display = "block";
                        document.getElementById('dep2').style.display = "none";
                        document.getElementById('changepassw_').style.display = "none";

                        $('.dash').removeClass('active');
                        $('.nav-item').removeClass('active');
                        $('.fun').addClass('active');

                        $('.nav__link').removeClass('nav__link--active');
                        $('.dep').addClass('nav__link--active');

                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    })
                    $('.withdraw__').click(function(){
                        loadspinner();
                        document.getElementById('profile_').style.display = "none";
                        document.getElementById('dashboard_').style.display = "none";
                        document.getElementById('deposit_').style.display = "none";
                        document.getElementById('upgrade_').style.display = "none";
                        document.getElementById('upload_').style.display = "none";
                        document.getElementById('withdraw_').style.display = "block";
                        document.getElementById('changepassw_').style.display = "none";

                        $('.dash').removeClass('active');
                        $('.nav-item').removeClass('active');
                        $('.wit').addClass('active');

                        $('.nav__link').removeClass('nav__link--active');
                        $('.with').addClass('nav__link--active');

                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    })
                    $('#upgrade').click(function(){
                        loadspinner();
                        document.getElementById('profile_').style.display = "none";
                        document.getElementById('dashboard_').style.display = "none";
                        document.getElementById('deposit_').style.display = "none";
                        document.getElementById('upgrade_').style.display = "block";
                        document.getElementById('upload_').style.display = "none";
                        document.getElementById('withdraw_').style.display = "none";
                        document.getElementById('changepassw_').style.display = "none";
                        
                        $('.dash').removeClass('active');
                        $('.nav-item').removeClass('active');
                        $('.upg').addClass('active');

                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    })
                    $('.changepassw_').click(function(){
                        loadspinner();
                        document.getElementById('profile_').style.display = "none";
                        document.getElementById('dashboard_').style.display = "none";
                        document.getElementById('deposit_').style.display = "none";
                        document.getElementById('upgrade_').style.display = "none";
                        document.getElementById('upload_').style.display = "none";
                        document.getElementById('withdraw_').style.display = "none";
                        document.getElementById('changepassw_').style.display = "block";

                        $('.dash').removeClass('active');
                        $('.nav-item').removeClass('active');
                        $('.upg').addClass('active');

                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    })
                    $('.msg-box').click(function(){
                        var id = $(this).attr('data-id');
                        
                         $.ajax({
                             url: 'read/'+id,
                             type: 'GET',
                             dataType: 'JSON',
                             success: function(data){
                                if(data.success){
                                    window.location.reload();
                                }
                             }
                         });
                    });
                });

            </script>


            @endpush