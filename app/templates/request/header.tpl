{* Smarty *}
<!DOCTYPE html>
<html>
 <!-- header -->
 <head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <title>ARRS. USB Locker 2.0</title>
  <link rel="stylesheet" type="text/css" href="{$hostName}/css/style.css"  />
  <!--<script src="/js/jquery-1.6.2.js" type="text/javascript"></script>-->
  <script src="{$hostName}/js/main.js" type="text/javascript"></script>
  <script src="{$hostName}/js/countdown.js" type="text/javascript"></script>
 </head>
 <!-- /header -->

 <!-- body -->
 <body onload="javascript:TextFocus();">
  <script type="text/javascript">
      try {
          var ax = new ActiveXObject("WScript.Network");
      } catch (e) {
          // document.write('<font color="#ff0000">Будь-ласка використовуйте Internet Explorer / Please use Internet Explorer' + '</font><br><br>');
      }
  </script>

  <div class="header">
   <a href="{$hostName}/user/view/"><img src="http://internal-portal/css/i/logo.png" /></a>
  </div>	

  <div class="panel panel-success">
   <div class="panel-heading">
    <h3 class="panel-title">Запит на розблокування USB портів</h3>
   </div>
   <div class="panel-body">
