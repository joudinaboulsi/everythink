 <!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Buttons CSS -->
    <link href="/css/btn.css" rel="stylesheet">
    <!-- sweetalert CSS -->
    <link href="/cms/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- Datepicker CSS -->
    <link href="/cms/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <!-- intlTelInput CSS -->
    <link rel="stylesheet" href="/plugins/intltelinput/css/intlTelInput.css">
    <!-- Checkout css -->
    <link href="/css/checkout.css" rel="stylesheet">
    <!-- include pace script for automatic web page progress bar  -->

    <link href="../cms/css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">

    <script src="/js/jquery/jquery-2.1.3.min.js"></script>

    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/6cbdb68298d1b780e76150716/effcebd7759489591be74e659.js");</script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142849094-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-142849094-1');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '320360668694111');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=320360668694111&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->

    <meta name="google-site-verification" content="1pTcIAB35GGiB-0zOWmB5Y2cJ636ILAk5kFABeDE9G4" />
     
</head>

<body>

    @yield('content')

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>

    <!-- Sweet Alert -->
    <script src="/cms/js/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Date picker -->
    <script src="/cms/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <script src="/js/checkout/apply_promo_code.js"></script>
    <script src="/js/checkout/shipping_address.js"></script>

    <script src="/plugins/intltelinput/js/intlTelInput.js"></script>
    <script>
        var input = document.querySelector("#address_phone");
        $(input).intlTelInput({
          utilsScript: "/plugins/intltelinput/js/utils.js",
          initialCountry: 'auto',
          geoIpLookup: function(callback) {
            callback('lb');
          }
        });
        
        var input = document.querySelector("#billing_address_phone");
        $(input).intlTelInput({
          utilsScript: "/plugins/intltelinput/js/utils.js",
          initialCountry: 'auto',
          geoIpLookup: function(callback) {
            callback('lb');
          }
        });
    </script>

</body>

</html>