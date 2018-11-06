<!DOCTYPE html>
<html>
<title>Mulberrysoft</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Prompt:300">

<link rel="stylesheet" href="./assets/css/custom.css">
<link rel="stylesheet" href="./assets/css/mbs.css">

<style>
body,h1,h2,h3,h4,h5 {font-family: "Prompt", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
.box-redTMP{ 

background: rgba(235,65,130,1);
background: -moz-linear-gradient(45deg, rgba(235,65,130,1) 0%, rgba(247,185,52,1) 69%, rgba(247,185,52,1) 100%);
background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(235,65,130,1)), color-stop(69%, rgba(247,185,52,1)), color-stop(100%, rgba(247,185,52,1)));
background: -webkit-linear-gradient(45deg, rgba(235,65,130,1) 0%, rgba(247,185,52,1) 69%, rgba(247,185,52,1) 100%);
background: -o-linear-gradient(45deg, rgba(235,65,130,1) 0%, rgba(247,185,52,1) 69%, rgba(247,185,52,1) 100%);
background: -ms-linear-gradient(45deg, rgba(235,65,130,1) 0%, rgba(247,185,52,1) 69%, rgba(247,185,52,1) 100%);
background: linear-gradient(45deg, rgba(235,65,130,1) 0%, rgba(247,185,52,1) 69%, rgba(247,185,52,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eb4182', endColorstr='#f7b934', GradientType=1 );

}
</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar box-redTMP w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
  <center><img   style="height:120px;" src="http://www.mulberrysoft.com/wp-content/uploads/2018/04/cropped-logo_ltd_1.png" alt=""></center>
    <h3 class="w3-padding-20"><b style="font-size:34px;">Mulberrysoft</b><br><span style="font-size:14px;">BackendSetting</span></h3>
    <hr style="background-color:black; border-color:black;"></div>
  <div class="w3-bar-block">
    <a  class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a  class="w3-bar-item w3-button w3-hover-white">Varible Setting</a> 
    <a class="w3-bar-item w3-button w3-hover-white">Account Setting</a> 
    <a  class="w3-bar-item w3-button w3-hover-white">Choice Setting</a> 
    <a  class="w3-bar-item w3-button w3-hover-white">Packages</a> 
    <a  class="w3-bar-item w3-button w3-hover-white">Contact</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container shadow w3-top w3-hide-large box-white w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button box-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Mulberrysoft</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">
  @yield('vue')
</div>

 
<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>
 
 <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
  @yield('script')
</body>
</html>
