<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Dashboard | Online FX Trading</title>
    <link rel="shortcut icon" type="image/x-icon" href="admin/images/favicon.png">
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="admin/assets/vendor_components/bootstrap/dist/css/bootstrap.css">
    
	<!--amcharts -->
	<link href="admin/lib/plugins/export/export.css" rel="stylesheet" type="text/css" />
	
	<!-- Bootstrap-extend -->
	<link rel="stylesheet" href="admin/css/bootstrap-extend.css">

	<!-- theme style -->
	<link rel="stylesheet" href="admin/css/master_style.css">

	<!-- Crypto_Admin skins -->
	<link rel="stylesheet" href="admin/css/skins/_all-skins.css">
	<link href="admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  	<link href="admin/css/bootstrap-datepicker.min.css" rel="stylesheet">
  	<link href="admin/css/sweetalert2.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .nav-bottom{
    position: fixed;
    width: 100%;
    height: 65px;
    box-shadow: 0 0 3px rgba(0,0,0,0.2);
    background-color: #fff;
    display: flex;
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
    font-size: 13px;
    color: #1f1a40;
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
    font-size: 18px!important;
}
.nav__text{
    font-size: 12px!important;
}
</style>
</head>
<body class="hold-transition skin-yellow sidebar-mini">

@yield('content')
<footer class="main-footer">
	  &copy; 2008 - 2023 <a href="https://www.apexgenex.com">ONLINE FX TRADING</a>. All Rights Reserved.
  	</footer>
  
</div>
	  
	<!-- jQuery 3 -->
	<script src="admin/assets/vendor_components/jquery/dist/jquery.js"></script>
	
	<!-- popper -->
	<script src="admin/assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="admin/assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>
	
	<!-- Slimscroll -->
	<script src="admin/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
	
	<!-- FastClick -->
	<script src="admin/assets/vendor_components/fastclick/lib/fastclick.js"></script>
	<!-- SweetAlert -->
	<script type="text/javascript" src="admin/js/sweetalert2.min.js"></script>
	
	<!-- This is data table -->
    <script src="admin/assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>
	
	<!-- Crypto_Admin App -->
	<script src="admin/js/template.js"></script>
	
	<!-- Crypto_Admin dashboard demo (This is only for demo purposes) -->
	<script src="admin/js/pages/dashboard.js"></script>

	<!-- Crypto_Admin for demo purposes -->
	<script src="admin/js/demo.js"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
	<!-- Crypto_Admin for Data Table -->
	<script src="admin/js/pages/data-table.js"></script>
	<!-- Ajax Get Data -->
	
	<script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
    </script>
    
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    
    <script>
    function googleTranslateElementInit() {
     new google.translate.TranslateElement(
                {pageLanguage: 'en'},
                'google_translate_element'
            );
        /*
        To remove the "powered by google",
        uncomment one of the following code blocks.
        NB: This breaks Google's Attribution Requirements:
        https://developers.google.com/translate/v2/attribution#attribution-and-logos
    */
    
    // Native (but only works in browsers that support query selector)
    if(typeof(document.querySelector) == 'function') {
        document.querySelector('.goog-logo-link').setAttribute('style', 'display: none');
        document.querySelector('.goog-te-gadget').setAttribute('style', 'font-size: 0');
    }
    
    // If you have jQuery - works cross-browser - uncomment this
    jQuery('.goog-logo-link').css('display', 'none');
    jQuery('.goog-te-gadget').css('font-size', '0');
    }
    </script>
    <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

	@stack('scripts')

</body>
</html>