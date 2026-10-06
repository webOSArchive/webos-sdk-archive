<?php
//Figure out which page to load
$theContent = "sdk-pdk";
if (isset($_GET['page']) && $_GET['page'] != "") {
  $thePage = $_GET['page'];
  $thePage = str_replace(".html", "", $thePage);
  $theContent = $thePage;
}
$theContent = $theContent . ".html";
?>
<!DOCTYPE html>
<html class="js" lang="en-US">
<head>

<meta name="generator" content="TYPO3 4.5 CMS">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=1">
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
  /* nothing left to include, so the page content is all in place now */
  sdkAsideInit();
}

function toggleSection(contentId, signId) {
  var content = document.getElementById(contentId);
  if (!content) { return false; }
  var isHidden = (content.style.display == "none");
  content.style.display = isHidden ? "block" : "none";
  var sign = document.getElementById(signId);
  if (sign) { sign.innerHTML = isHidden ? "[- hide]" : "[+ show]"; }
  return false;
}

/* --- SDK top nav: hamburger + tap-to-open submenus on small screens ---
   The original nav opens its megamenus on :hover, which touch devices never
   fire, so the dropdowns were unreachable on phones and tablets in portrait.
   On small screens the nav collapses to a Menu button and the submenus stack
   as an accordion. Wide screens, including a TouchPad in landscape, keep the
   original hover behaviour untouched. ES5 only, no jQuery, no classList.
   Names are prefixed sdkNav* so they cannot clash with the shared
   webosarchive.org menu, which owns toggleMenu/redrawMenu. */

function sdkNavHasClass(el, name) {
  return (" " + el.className + " ").indexOf(" " + name + " ") > -1;
}

function sdkNavAddClass(el, name) {
  if (!sdkNavHasClass(el, name)) {
    el.className += (el.className ? " " : "") + name;
  }
}

function sdkNavRemoveClass(el, name) {
  var parts = el.className.split(/\s+/), kept = [], i;
  for (i = 0; i < parts.length; i++) {
    if (parts[i] && parts[i] != name) { kept.push(parts[i]); }
  }
  el.className = kept.join(" ");
}

/* The stylesheet is the only source of truth for which layout is active:
   the button is display:none until the small-screen media query shows it. */
function sdkNavCollapsed() {
  var btn = document.getElementById("sdk-nav-btn");
  return !!(btn && btn.offsetHeight > 0);
}

function sdkNavChild(el, test) {
  var kids = el.childNodes, i;
  for (i = 0; i < kids.length; i++) {
    if (kids[i].nodeType == 1 && test(kids[i])) { return kids[i]; }
  }
  return null;
}

function sdkNavCloseAll(nav) {
  var kids = nav.childNodes, i;
  for (i = 0; i < kids.length; i++) {
    if (kids[i].nodeType == 1 && sdkNavHasClass(kids[i], "sdk-nav-open")) {
      sdkNavRemoveClass(kids[i], "sdk-nav-open");
    }
  }
}

function sdkNavToggle() {
  var nav = document.getElementById("nav");
  if (!nav) { return false; }
  if (sdkNavHasClass(nav, "sdk-nav-open")) {
    sdkNavRemoveClass(nav, "sdk-nav-open");
    sdkNavCloseAll(nav);
  } else {
    sdkNavAddClass(nav, "sdk-nav-open");
  }
  return false;
}

function sdkNavItemClick() {
  /* On a wide screen do nothing and let the original hover styling stand. */
  if (!sdkNavCollapsed()) { return true; }
  var li = this.parentNode;
  var wasOpen = sdkNavHasClass(li, "sdk-nav-open");
  sdkNavCloseAll(li.parentNode);
  if (!wasOpen) { sdkNavAddClass(li, "sdk-nav-open"); }
  return false;
}

function sdkNavInit() {
  var nav = document.getElementById("nav");
  if (!nav || document.getElementById("sdk-nav-btn")) { return; }

  var btn = document.createElement("a");
  btn.id = "sdk-nav-btn";
  btn.href = "javascript:;";
  btn.title = "Menu";
  btn.innerHTML = '<span class="sdk-nav-bars"><span></span><span></span>' +
                  '<span></span></span>Menu';
  btn.onclick = sdkNavToggle;
  nav.parentNode.insertBefore(btn, nav);

  /* Only hide the nav behind the button once this script has run, so the
     nav stays visible if scripting is off. */
  sdkNavAddClass(document.documentElement, "sdk-nav-ready");

  var kids = nav.childNodes, i, li, link;
  for (i = 0; i < kids.length; i++) {
    li = kids[i];
    if (li.nodeType != 1 || li.tagName.toLowerCase() != "li") { continue; }
    /* Top-level items that are plain links keep working as links. */
    if (!sdkNavChild(li, function (el) { return sdkNavHasClass(el, "megamenu"); })) { continue; }
    link = sdkNavChild(li, function (el) { return el.tagName.toLowerCase() == "a"; });
    if (link) { link.onclick = sdkNavItemClick; }
  }
}

/* --- Contents sidebar: collapse it on small screens ---
   The article layout is a fixed 990px two-column float, so on a narrow
   screen the 227px Contents rail is what pushes the page sideways. The
   stylesheet unfloats both columns; this turns the Contents heading into a
   toggle so the list does not take a screenful before the article starts.
   Wired here rather than in each page fragment, because all of the content
   pages share the same .col-aside > .sidebox > h3 + ol.article-nav shape. */

function sdkNavFindByClass(root, tag, name) {
  var els = root.getElementsByTagName(tag), i;
  for (i = 0; i < els.length; i++) {
    if (sdkNavHasClass(els[i], name)) { return els[i]; }
  }
  return null;
}

function sdkAsideClick(e) {
  /* On a wide screen the sidebar is always open, so leave it alone. */
  if (!sdkNavCollapsed()) { return true; }
  e = e || window.event;
  var target = e ? (e.target || e.srcElement) : null;
  /* a real link inside the heading stays a link */
  if (target && target.tagName && target.tagName.toLowerCase() == "a") { return true; }
  var box = this.parentNode;
  var sign = sdkNavFindByClass(box, "span", "sdk-aside-sign");
  if (sdkNavHasClass(box, "sdk-aside-open")) {
    sdkNavRemoveClass(box, "sdk-aside-open");
    if (sign) { sign.innerHTML = "[+ show]"; }
  } else {
    sdkNavAddClass(box, "sdk-aside-open");
    if (sign) { sign.innerHTML = "[- hide]"; }
  }
  return false;
}

function sdkAsideInit() {
  var main = document.getElementById("main");
  if (!main) { return; }
  var aside = sdkNavChild(main, function (el) { return sdkNavHasClass(el, "col-aside"); });
  if (!aside || sdkNavHasClass(aside, "sdk-aside-done")) { return; }
  sdkNavAddClass(aside, "sdk-aside-done");

  var kids = aside.childNodes, i, box, heads, sign;
  for (i = 0; i < kids.length; i++) {
    box = kids[i];
    if (box.nodeType != 1 || !sdkNavHasClass(box, "sidebox")) { continue; }
    if (!sdkNavFindByClass(box, "ol", "article-nav")) { continue; }
    heads = box.getElementsByTagName("h3");
    if (!heads.length) { continue; }
    sdkNavAddClass(box, "sdk-aside-box");
    sign = document.createElement("span");
    sign.className = "section-toggle-sign sdk-aside-sign";
    sign.innerHTML = "[+ show]";
    heads[0].appendChild(document.createTextNode(" "));
    heads[0].appendChild(sign);
    heads[0].onclick = sdkAsideClick;
  }

  /* Collapsed, a contents list at the foot of a long article is no use as
     navigation, so move the rail above the article on small screens only.
     The wide layout is left exactly as it was. */
  if (sdkNavCollapsed()) {
    var content = document.getElementById("content");
    if (content && content.parentNode == main) {
      main.insertBefore(aside, content);
    }
  }
}
</script> 
</head>
<body class="PageArticle">
<?php include("menu.php")?>
<!-- Top Menu is here -->
<div class="page-bg-ext"></div>

<?php include("header.php")?>
<script>
  sdkNavInit();
</script>

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
