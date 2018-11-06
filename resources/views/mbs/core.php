<?php 

function coreON(){
?> 
<!-- Sidebar/menu -->
<nav class="w3-sidebar box-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
  <center><img   style="height:120px;" src="http://www.mulberrysoft.com/wp-content/uploads/2018/04/cropped-logo_ltd_1.png" alt=""></center>
    <h3 class="w3-padding-20"><b style="font-size:34px;">Mulberrysoft</b><br><span style="font-size:14px;">BackendSetting</span></h3>
  </div>
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

<?
}


function coreOFF(){
    ?>
 
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
    <?php
}