
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="fWlWVQPsC9YzVszi4YXGAjQ5W9NFxAwMTCb56xGz">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>ONLINE FX TRADING - Dashboard</title>
     <link rel="shortcut icon" type="image/png" href="auth-assets/images/logo/icon.png"><!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/dbstyle.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .card {
            border: 0px;
        }
        .msg-box{
            cursor: pointer!important;
        }
/* PRICING (UPGRADE SECTION) */


.pricing-tables-content {
  margin-top: 25px;
}

.pricing-tables-content.pricing-page {
  margin-top: 0;
}

.pricing-tables-content .header {
  height: 100px;
  line-height: 170px;
  position: relative;
}

.pricing h3 {
  color: #fff;
  text-transform: uppercase;
}

.pricing h3.sell-title {
  margin-top: 50px;
}

.pricing-switcher {
  text-align: center;
}

.pricing-switcher > p {
  display: inline-block;
  position: relative;
  padding: 0;
  padding-right: 4px;
  border-radius: 0;
  background: #111;
  border: 1px solid #333;
}

.pricing-switcher input[type="radio"] {
  position: absolute;
  opacity: 0;
}

.pricing-switcher label {
  position: relative;
  z-index: 1;
  display: inline-block;
  float: left;
  width: 105px;
  height: 39px;
  line-height: 43px;
  cursor: pointer;
  padding-left: 8px;
  font-size: 16px;
  color: #fff;
}

.pricing-switcher label.switch-1.active, .pricing-switcher label.switch-2.active {
  color: #fff;
}

.pricing-switcher .switch {
  position: absolute;
  top: 2px;
  left: 2px;
  height: 40px;
  width: 105px;
  border-radius: 0;
  -webkit-transition: -webkit-transform 0.5s;
  -moz-transition: -moz-transform 0.5s;
  transition: transform 0.5s;
}

.pricing-switcher input[type="radio"]:checked + label + .switch,
.pricing-switcher input[type="radio"]:checked + label:nth-of-type(n) + .switch {
  -webkit-transform: translateX(105px);
  -moz-transform: translateX(105px);
  -ms-transform: translateX(105px);
  -o-transform: translateX(105px);
  transform: translateX(105px);
}

.no-js .pricing-switcher {
  display: none;
}

.pricing-list {
  margin: 32px 0 0;
  list-style-type: none;
}

.pricing-list > li {
  position: relative;
  margin-bottom: 16px;
}

.pricing-wrapper {
  position: relative;
  list-style-type: none;
  padding: 0;
}

.touch .pricing-wrapper {
  -webkit-perspective: 2000px;
  -moz-perspective: 2000px;
  perspective: 2000px;
}

.pricing-wrapper.is-switched .is-visible {
  -webkit-transform: rotateY(180deg);
  -moz-transform: rotateY(180deg);
  -ms-transform: rotateY(180deg);
  -o-transform: rotateY(180deg);
  transform: rotateY(180deg);
  -webkit-animation: rotate 0.5s;
  -moz-animation: rotate 0.5s;
  animation: rotate 0.5s;
}

.pricing-wrapper.is-switched .is-hidden {
  -webkit-transform: rotateY(0);
  -moz-transform: rotateY(0);
  -ms-transform: rotateY(0);
  -o-transform: rotateY(0);
  transform: rotateY(0);
  -webkit-animation: rotate-inverse 0.5s;
  -moz-animation: rotate-inverse 0.5s;
  animation: rotate-inverse 0.5s;
  opacity: 0;
}

.pricing-wrapper.is-switched .is-selected {
  opacity: 1;
}

.pricing-wrapper.is-switched.reverse-animation .is-visible {
  -webkit-transform: rotateY(-180deg);
  -moz-transform: rotateY(-180deg);
  -ms-transform: rotateY(-180deg);
  -o-transform: rotateY(-180deg);
  transform: rotateY(-180deg);
  -webkit-animation: rotate-back 0.5s;
  -moz-animation: rotate-back 0.5s;
  animation: rotate-back 0.5s;
}

.pricing-wrapper.is-switched.reverse-animation .is-hidden {
  -webkit-transform: rotateY(0);
  -moz-transform: rotateY(0);
  -ms-transform: rotateY(0);
  -o-transform: rotateY(0);
  transform: rotateY(0);
  -webkit-animation: rotate-inverse-back 0.5s;
  -moz-animation: rotate-inverse-back 0.5s;
  animation: rotate-inverse-back 0.5s;
  opacity: 0;
}

.pricing-wrapper.is-switched.reverse-animation .is-selected {
  opacity: 1;
}

.pricing-wrapper > li {
  background-color: #1d1d1d;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  outline: 1px solid transparent;
}

.pricing-wrapper > li::after {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  height: 100%;
  width: 50px;
  pointer-events: none;
  background: -webkit-linear-gradient( right , #FFFFFF, rgba(255, 255, 255, 0));
  background: linear-gradient(to left, #FFFFFF, rgba(255, 255, 255, 0));
}

.pricing-wrapper > li.is-ended::after {
  display: none;
}

.pricing-wrapper .is-visible {
  position: relative;
  z-index: 5;
}

.pricing-wrapper .is-hidden {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  z-index: 1;
  -webkit-transform: rotateY(180deg);
  -moz-transform: rotateY(180deg);
  -ms-transform: rotateY(180deg);
  -o-transform: rotateY(180deg);
  transform: rotateY(180deg);
}

.pricing-wrapper .is-selected {
  z-index: 3 !important;
}

.no-js .pricing-wrapper .is-hidden {
  position: relative;
  -webkit-transform: rotateY(0);
  -moz-transform: rotateY(0);
  -ms-transform: rotateY(0);
  -o-transform: rotateY(0);
  transform: rotateY(0);
  margin-top: 16px;
}

.price {
  margin-top: 45px;
  color: #fff;
}

.pricing-header {
  position: relative;
  z-index: 1;
  height: 80px;
  padding: 16px;
  pointer-events: none;
  background-color: #3aa0d1;
  color: #FFFFFF;
}

.pricing-header h2 {
  margin-bottom: 3px;
  font-weight: 600;
  text-transform: uppercase;
}

.currency, .value {
  font-size: 120px;
  font-weight: 300;
}

.pricing-body {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.is-switched .pricing-body {
  overflow: hidden;
}

.pricing-features {
  width: 600px;
}

.pricing-features:after {
  content: "";
  display: table;
  clear: both;
}

.pricing-features li {
  width: 100px;
  float: left;
  padding: 25px 16px;
  font-size: 56px;
  text-align: center;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.pricing-features em {
  display: block;
  margin-bottom: 5px;
  font-weight: 600;
}

.pricing-footer {
  position: absolute;
  z-index: 1;
  top: 0;
  left: 0;
  height: 80px;
  width: 100%;
}

.pricing-footer::after {
  content: '';
  position: absolute;
  right: 16px;
  top: 50%;
  bottom: auto;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  height: 20px;
  width: 20px;
}

.pricing-footer a {
  display: block;
  margin: 0 30px;
}

.select {
  position: relative;
  z-index: 1;
  display: block;
  height: 100%;
  overflow: hidden;
  text-indent: 100%;
  white-space: nowrap;
  color: transparent;
}

.pricing-tables-content .header {
  height: 160px;
  line-height: 280px;
}

.pricing-list {
  margin: 48px 0 0;
  padding: 0;
}

.pricing-list:after {
  content: "";
  display: table;
  clear: both;
}

.pricing-list > li {
  float: left;
  padding: 0 15px;
}

.pricing-wrapper > li::before {
  content: '';
  position: absolute;
  z-index: 6;
  left: -1px;
  top: 50%;
  bottom: auto;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  height: 50%;
  width: 1px;
}

.pricing-wrapper > li::after {
  display: none;
}

.pricing-header {
  height: auto;
  padding: 30px;
  pointer-events: auto;
  text-align: center;
  color: #173d50;
  background-color: transparent;
}

.popular .pricing-header {
  color: #e97d68;
  background-color: transparent;
}

.pricing-header h2 {
  font-size: 1.8rem;
  margin-top: 25px;
  line-height: 1.8rem;
  color: #e7e7e7;
  letter-spacing: 2px;
}

.pricing-header h2 span {
  color: #e7e7e7;
  display: block;
  padding-top: 17px;
  font-weight: 400;
  font-size: 14px;
}

.value {
  font-size: 4rem;
  font-weight: 800;
}

.currency {
  font-size: 4rem;
  font-weight: 600;
}

.pricing-body {
  overflow-x: visible;
}

.pricing-features {
  width: auto;
}

.pricing-features li {
  float: none;
  width: auto;
  padding: 16px;
}

.pricing-features li:nth-of-type(2n+1) {
  background-color: rgba(23, 61, 80, 0.06);
}

.pricing-features em {
  display: inline-block;
  margin-bottom: 0;
}

.pricing-footer {
  position: relative;
  height: auto;
  padding: 30px 0;
  text-align: center;
}

.pricing-footer::after {
  display: none;
}

.select {
  position: static;
  display: inline-block;
  height: auto;
  padding: 20px 48px;
  color: #FFFFFF;
  border-radius: 2px;
  background-color: #0c1f28;
  font-size: 1.4rem;
  text-indent: 0;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.no-touch .select:hover {
  background-color: #112e3c;
}


/* END OF UPGRADE SECTION */

        .processing{
  width: 100%;
  height: 100%;
  background-color:rgba(0, 0, 0, 0.85);
  z-index: 100;
  position: absolute;
  backdrop-filter: blur(5px);
  text-align: center;
  align-items: center;
}
.processing .process-content{
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%);
  position: absolute;
  display: flex;
  flex-direction: column;
}
.processing i{
  color:#fff;
  font-size: 80px;
  
}
.processing span{
  margin-top: 20px;
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 2px;
}

#profile_, #deposit_, #upgrade_, #upload_, #withdraw_{
    display: none;
}
.nav-link{
    cursor: pointer;
}
.prof-div p{
    margin-bottom: 8px;
    margin-top: 8px;
    padding: 0;
    color: #fff!important;
    font-size: 14px!important;
    text-transform: uppercase;
    letter-spacing: 0.7px;
}
.prof-div h4, .prof-div h5{
    color: #fff;
    margin-top: 15px;
}
.prof-div ul li{
    color:#2596be;
}
.prof-div{
    margin-top: 24px;
    margin-bottom: 35px;
}
.prof-div input[type=text], .prof-div input[type=email], .prof-div input[type=password]{
    background-color: transparent;
    width: 100%;
    border: 0.7px solid rgba(225, 225, 225, 0.45);
    border-radius: 4px;
    color: #fff;
    padding: 6px;
}
.prof-active{
    background-color: #fff!important;
    color: #000!important;
}
.prof-btn{
    width: 100%;
    margin-top: 14px;
    border: 0;
    background-color: #2596be!important;
    color: #fff;
    border-radius: 4px;
    padding: 8px 15px;
    text-transform: uppercase;
}
.prof-pending{
    color: #fff;
    padding: 10px;
    font-weight: bold;
    display: inline-block;
    border-radius: 5px;
    background-color: #ef0a1a!important;
    
}

.prof-approved{
    color: #fff;
    padding: 10px;
    font-weight: bold;
    display: inline-block;
    border-radius: 5px;
    animation: blinkingGreenBackground 2s infinite;
}
@keyframes blinkingGreenBackground{
    0%		{ background-color: #207105;}
    25%		{ background-color: #5df362;}
    50%		{ background-color: #035730;}
    75%		{ background-color: #86febe;}
    100%	 { background-color: #1c6638;}
}
.error{
    color: red;
    font-size: 14px;
    font-weight: bold;
}
.Success{
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    position: absolute;
    z-index: 5;
}
.Success div{
    background-color: rgba(225, 225, 225, 1);
    width: 330px;
    height: 300px;
    padding: 20px 0;
    top: 190px;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 3px;
    position: absolute;
    text-align: center;
    backdrop-filter: blur(5px);
}
.Success div h3{
    color: green;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 22px;
    font-weight: bold;
}
.Success div i{
    background-color: #fdfefd;
    padding: 16px;
    border-radius: 50%;
    color: green;
    margin-bottom: 10px;
    font-size: 45px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.Success div p{
    padding: 0 35px;
    color: #000;
}
.Success div button{
    border: 0;
    padding: 10px 30px;
    background-color: green;
    color: #fff;
    cursor: pointer;
    font-weight: bold;
    border-radius: 3px;
}
.Errors{
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    position: absolute;
    z-index: 5;
}
.Errors div{
    background-color: rgb(247, 64, 64);
    width: 330px;
    height: 300px;
    padding: 20px 0;
    top: 190px;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 3px;
    position: absolute;
    text-align: center;
    backdrop-filter: blur(5px);
}
.Errors div h3{
    color: #fff;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 22px;
    font-weight: bold;
}
.Errors div i{
    background-color: #fdfefd;
    padding: 16px;
    border-radius: 50%;
    color: rgb(247, 64, 64);
    margin-bottom: 10px;
    font-size: 45px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.Error div p{
    padding: 0 35px;
    color: #fff;
}
.Errors div button{
    border: 0;
    padding: 10px 30px;
    background-color: #fff;
    color: rgb(247, 64, 64);
    cursor: pointer;
    font-weight: bold;
    border-radius: 3px;
}
.Warning{
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    position: absolute;
    z-index: 5;
}
.Warning div{
    background-color: rgb(249, 196, 81);
    width: 330px;
    height: 300px;
    padding: 20px 0;
    top: 190px;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 3px;
    position: absolute;
    text-align: center;
    backdrop-filter: blur(5px);
}
.Warning div h3{
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 22px;
    font-weight: bold;
}
.Warning div i{
    background-color: #fdfefd;
    padding: 16px;
    border-radius: 50%;
    color: rgb(249, 196, 81);
    margin-bottom: 10px;
    font-size: 45px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.Warning div p{
    padding: 0 35px;
    color: #000;
}
.Warning div button{
    border: 0;
    padding: 10px 30px;
    background-color: #fff;
    color: rgb(249, 196, 81);
    cursor: pointer;
    font-weight: bold;
    border-radius: 3px;
}
.nav-bottom{
    position: fixed;
    width: 100%;
    height: 85px;
    box-shadow: 0 0 3px rgba(0,0,0,0.2);
    background-color: #fff;
    display: none;
    overflow-x: auto;
    bottom: 0;
}
.nav__link{
    display: flex;
    flex-grow: 1;
    min-width: 50px;
    overflow: hidden;
    white-space: nowrap;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    font-family: sans-serif;
    font-size: 16px;
    color: #097969;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
    transition: background-color 0.1s ease-in-out;
    cursor: pointer;
}
.nav__link:hover{
    background-color: #eeeeee;
    text-decoration: none;
}
.nav__link--active{
    color: #009578;
}
.nav__icon{
    font-size: 22px!important;
}
.nav__text{
    font-size: 15px!important;
}
#dep2 h3{
    color: #fff!important;
    font-weight: bold;
    font-size: 17px;
}
#dep2 li{
    color: #fff!important;
    font-size: 14px!important;
}
.font-weight-bold{
    margin-left: 10px;
    margin-right: 10px;
}
.list-group-item{
    font-size: 14px;
}
.copy-link{
    --height: 36px;
    display: flex;
}
.copy-link-input{
    border-top-right-radius: 0!important;
    border-bottom-right-radius: 0!important;
    width: 80%!important;
    flex-grow: 1;
    padding: 0 8px;
    font-size: 14px;
    border: 1px solid #cccccc;
    border-right: none;
    outline: none;
    color: #097969;
    font-weight: bold;
    background-color: #fff;
}
.copy-link-input:hover{
    background: #eeeeee;
}
.copy-link-button{
    flex-shrink: 0;
    width: var(--height);
    height: var(--height);
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #dddddd;
    color: #333333;
    outline: none;
    border: 1px solid #cccccc;
    cursor: pointer;
}
.copy-link-button:hover{
    background-color: #cccccc;
}

  .card-upload{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
  
  }
  .card-upload .card-u{
    border-radius: 5px;
    border: 1px solid #fff;
    padding: 25px 20px;
  }
@media screen and (max-width: 700px){
.acct-stat{
    font-size: 13px;
}
.nav-bottom{
    display: flex;
}
.dep-tbl{
    font-size: 12px;
}
.card-upload{
    display: grid;
    grid-template-columns: 1fr;
    gap: 40px;
  
  }
}

    </style>

</head>

<body id="page-top">

@yield('content')

 <!-- Footer -->
 <footer class="sticky-footer bg-secondary shadow-lg" style="background-color: #374f65 !important">
    <div class="container my-auto">
        <div class="copyright text-center my-auto text-white">
            <span>Copyright &copy; ONLINE FX TRADING <?=date("Y")?>  </span>
        </div>
    </div>
</footer>
<!-- End of Footer -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

 


 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/custom2.js"></script>

<script src='js/notification.js'></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="//code.tidio.co/kajhifeiupw14nzd5dafh0umie6mvqj3.js" async></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/b69656bbf6.js"></script>
    <script src="http://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    @stack('scripts')
</body>

</html>
