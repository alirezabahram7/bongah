<head>
<meta charset="utf-8">
<title>بنگاه: معاملات رهن اجاره قیمت خانه</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <!-- Bootstrap -->
 <!--===============================================================================================-->
 <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/login-bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/login-util.css">
	<link rel="stylesheet" type="text/css" href="/css/login-main.css">
<!--===============================================================================================-->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
 <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/iranian-sans" type="text/css"/>

<!--==========================================leaflet===============================================-->

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
  integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
  crossorigin=""/>


<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
  integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
  crossorigin=""></script>
<!--===============================================================================================-->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="/js/main.js"></script>
 <script src="/js/bootstrap-confirmation.js"></script>



<link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<a id="back2Top" title="Back to top" href="#">&#10148;</a>

<a id="back2Down" title="Back to down" href="#">&#10148;</i></a>

<script>
/*Scroll to top when arrow up clicked BEGIN*/
$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 100) {
        $('#back2Top').fadeIn();
    } else {
        $('#back2Top').fadeOut();
    }
});
$(document).ready(function() {
    $("#back2Top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});
 /*Scroll to top when arrow up clicked END*/



/*Scroll to down when arrow down clicked BEGIN*/
$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height < 100) {
        $('#back2Down').fadeIn();
    } else {
        $('#back2Down').fadeOut();
    }
});
$(document).ready(function() {
    $("#back2Down").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop:100000}, "slow");
        return false;
    });

});
 /*Scroll to top when arrow up clicked END*/
</script>
