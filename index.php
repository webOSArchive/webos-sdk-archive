<?php
//Figure out which page to load
$theContent = "sdk-pdk";
if ($_GET['page'] != "") {
  $thePage = $_GET['page'];
  $thePage = str_replace(".html", "", $thePage);
  $theContent = $thePage;
}
$theContent = $theContent . ".html";
?>
<!DOCTYPE html>
<html class="js" lang="en-US">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-12254772-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-12254772-4');
</script>

<meta name="generator" content="TYPO3 4.5 CMS">
<meta name="viewport" content="width=1024, initial-scale=0.5, maximum-scale=2, user-scalable=1">
<meta name="description" content="SDK-PDK Download">
<meta name="keywords" content="Develop, Tools, SDK, PDK">
<meta name="created" content="15.09.2011 20:35:27">
<meta name="modified" content="15.09.2011 21:16:29">
<meta name="robots" content="index, follow">
<meta name="MSSmartTagsPreventParsing" content="true">
<meta name="MSThemeCompatible" content="no">
<meta name="imagetoolbar" content="false">

<!--[if lt IE 7]> <link rel="stylesheet" type="text/css" href="/content/typo3conf/ext/palm_template/css/ie6.1301600288.css" media="all"> <![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" href="/content/typo3conf/ext/palm_template/css/ie7.1301600288.css" media="all"> <![endif]-->
<!--[if IE 8]> <link rel="stylesheet" type="text/css" href="/content/typo3conf/ext/palm_template/css/ie8.1301600288.css" media="all"> <![endif]-->
<!--[if IE 9 ]> <link rel="stylesheet" type="text/css" href="/content/typo3conf/ext/palm_template/css/ie9.1301600288.css" media="all"> <![endif]-->
<!--[if gt IE 9 ]><link rel="stylesheet" type="text/css" href="/content/typo3conf/ext/palm_template/css/common.1301600288.css" media="all"><![endif]-->
<!--[if !IE]><!--> <link rel="stylesheet" type="text/css" href="assets/common.css" media="all"> <!--<![endif]-->
<link rel="stylesheet" type="text/css" href="assets/additional.css" media="screen">

<title>webOS Dev Center - SDK-PDK Download</title>			
<link rel="shortcut icon" href="favicon.ico" type="application/x-empty; charset=binary">
<link rel="icon" href="favicon.ico" type="application/x-empty; charset=binary">
<script>
function includeHTML() {
  var z, i, elmnt, file, xhttp;
  /* Loop through a collection of all HTML elements: */
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    /*search for elements with a certain atrribute:*/
    file = elmnt.getAttribute("w3-include-html");
    if (file) {
      /* Make an HTTP request using the attribute value as the file name: */
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {elmnt.innerHTML = this.responseText;}
          if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
          /* Remove the attribute, and call this function once more: */
          elmnt.removeAttribute("w3-include-html");
          includeHTML();
        }
      }
      xhttp.open("GET", file, true);
      xhttp.send();
      /* Exit the function: */
      return;
    }
  }
}
</script> 
</head>
<body class="PageArticle">

<!-- Top Menu is here -->
<div class="page-bg-ext"></div>

<?php include("header.php")?>

<?php
/* detect Mobile Safari */
$browserAsString = $_SERVER['HTTP_USER_AGENT'];
if (strstr($browserAsString, " Mobi"))
{
  echo("<br><div style='margin:auto; width:60%; padding: 25px; border: 1px solid red;background: white;'><p align='center'><b><em>Note: ");
  if (strstr($browserAsString, " AppleWebKit/"))
  {
    echo("Due to the age of this site, the menus do not work with mobile Safari, and a significant portion of the site content will be unaccessible to you. To use the menus please use Chrome or Firefox, or switch to a Desktop environment.");
  }
  else
  {
    echo("Due to the age of this site, the menus may not work on your mobile device in portrait orientation. Please make sure you rotate your device to landscape mode, or switch to a Desktop environment.");
  }
  echo("</em></b></p></div><br>");
}

?>

<div w3-include-html="<?php echo($theContent);?>"></div>
<!--Footer starts here-->
<div w3-include-html="footer.html"></div> 

<script>
  includeHTML();
</script> 

  <!--[if lt IE 7 ]><script src="/content/typo3conf/ext/palm_template/js/libs/dd_belatedpng.js"></script><script> DD_belatedPNG.fix('img, .png_bg'); </script><![endif]-->
  <script src="assets/jquery-1.js" type="text/javascript"></script>
  <script src="assets/jquery_002.js" type="text/javascript"></script>
  <script src="assets/jquery.js" type="text/javascript"></script>
  <script src="assets/jquery_004.js" type="text/javascript"></script>
  <script src="assets/jquery_003.js" type="text/javascript"></script>
  <script src="assets/plugins.js" type="text/javascript"></script>
  <script src="assets/script.js" type="text/javascript"></script>


  <div id="fancybox-tmp"></div>
  <div id="fancybox-loading"></div>
  <div id="fancybox-overlay"></div>
  <div id="fancybox-wrap">
    <div id="fancybox-outer">
      <div class="fancybox-bg" id="fancybox-bg-n"></div>
      <div class="fancybox-bg" id="fancybox-bg-ne"></div>
      <div class="fancybox-bg" id="fancybox-bg-e"></div>
      <div class="fancybox-bg" id="fancybox-bg-se"></div>
      <div class="fancybox-bg" id="fancybox-bg-s"></div>
      <div class="fancybox-bg" id="fancybox-bg-sw"></div>
      <div class="fancybox-bg" id="fancybox-bg-w"></div>
      <div class="fancybox-bg" id="fancybox-bg-nw"></div>
      <div id="fancybox-content"></div><a id="fancybox-close" name="fancybox-close"></a>
      <div id="fancybox-title"></div><a href="javascript:;" id="fancybox-left" name=
      "fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a><a href=
      "javascript:;" id="fancybox-right" name="fancybox-right"><span class="fancy-ico"
      id="fancybox-right-ico"></span></a>
    </div>
  </div>
</body>
</html>
