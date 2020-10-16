<!DOCTYPE html>
<html class="js" lang="en-US">
<head>
<?php
echo $_SERVER['HTTP_HOST'];
echo stripos($_SERVER['HTTP_HOST'], "sdk")
if (stripos($_SERVER['HTTP_HOST'], "sdk") != "0")
{
	echo "I should go to index site";
}
// index.php
//header("Location: http://www.webosarchive.com", TRUE, 301);
//exit();
?>
<meta name="generator" content="TYPO3 4.5 CMS">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
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
<link rel="shortcut icon" href="https://web.archive.org/web/20130130211140im_/https://developer.palm.com/content/typo3conf/ext/palm_template/icons/favicon.ico" type="application/x-empty; charset=binary">
<link rel="icon" href="https://web.archive.org/web/20130130211140im_/https://developer.palm.com/content/typo3conf/ext/palm_template/icons/favicon.ico" type="application/x-empty; charset=binary">
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

  <div id="header">
    <div id="header_inner">
      <div class="hp-center">
        <a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/home.html" id="logo" name="logo"><img src="assets/logo24.png" alt="Palm Developer Center" width="227" height="41" /></a>

        <ul class="hp-nav" id="nav">
          <li>
            <a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/showcase.html" title="Showcase" target="_top" class="top">Showcase</a>

            <div class="megamenu">
              <div class="nav-child">
                <h4 class="menu-heading"><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/showcase/why_webos.html" target="_top">Why webOS</a></h4>

                <ul class="nav-list last">
                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/showcase/why_webos.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> The Opportunity</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/showcase/why_webos.html#item2" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Innovative Platform</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/showcase/why_webos.html#item3" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Cross-Platform</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/showcase/why_webos.html#item5" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Vibrant Community</a></li>
                </ul>
              </div>

              <div class="nav-child">
                <h4 class="menu-heading"><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/showcase.html" target="_top">Showcase</a></h4>

                <ul class="nav-list last">
                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/showcase/app_showcase.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> App Showcase</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/showcase/developer_voices.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Developer Voices</a></li>
                </ul>
              </div>
            </div>
          </li>

          <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/index.php?option=com_appsubmission&amp;view=applist" title="My Apps" target="_top" class="top">My Apps</a></li>

          <li class="current">
            <a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources.html" title="Resources" target="_top" class="top">Resources</a>

            <div class="megamenu">
              <div class="nav-child">
                <h4 class="menu-heading"><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/design_resources.html" target="_top">Design</a></h4>

                <ul class="nav-list">
                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/api/design/design-enyo.html"><img src="assets/wayback.png" style="vertical-align:top;"> Enyo Design Guide</a></li>

                  <li style="list-style: none">
                   <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/advanced_application_guidelines.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Advanced Application Guidelines</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/hp_webos_and_game_development.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> webOS and Game Development</a></li>
                </ul>

                <h4 class="menu-heading"><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/development_resources.html" target="_top">Development</a></h4>

                <ul class="nav-list">
                  <li><a href="index.php" target="_top"><img src="assets/check.png" style="vertical-align:top;"> Download the SDK</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/api/dev-guide/enyo/enyo-basics-from-the-bottom-up.html"><img src="assets/wayback.png" style="vertical-align:top;"> Enyo from the Ground Up</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/api/dev-guide/enyo/tutorial.html"><img src="assets/wayback.png" style="vertical-align:top;"> Enyo Tutorial</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/develop/third_party_tools.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Third-party Tools</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/develop/pdk_overview.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> PDK Development</a></li>

                  <li style="list-style: none"><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/develop/developing_on_an_unactivated_device.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Unactivated Devices</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/footer/glossary.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Glossary</a></li>
                </ul>

                <h4 class="menu-heading"><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/showcase/device_showcase.html" target="_top">Device Specs</a></h4>

                <ul class="nav-list last">
                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/showcase/device_showcase.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> View All</a></li>
                </ul>
              </div>

              <div class="nav-child">
                <h4 class="menu-heading"><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/distribution_and_promotion_resources.html" target="_top">Distribution and Promotion</a></h4>

                <ul class="nav-list">
                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/distribute/developing_and_distributing_with_hp/developer_program_details.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Distributing with HP</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/distribute/application_content_criteria.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> App Content Criteria</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/distribute/application_checklist.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> App Submission Checklist</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/distribute/distribution_international_e_commerce.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> International e-commerce FAQ</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/distribute/submitting_your_enyo_app.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Submit Your Enyo App</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/distribute/app_marketing_kit.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Market Your App</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/distribute/promo_codes.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Promo codes</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/develop/managing_in_app_purchase_items.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> In-App Purchase</a></li>
                </ul>

                <h4 class="menu-heading">FAQs</h4>

                <ul class="nav-list">
                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/develop/faq.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Developer Program FAQ</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/develop/pdk_technical_faq.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> PDK Technical FAQ</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/distribute/distribution_international_e_commerce.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> International e-commerce FAQ</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/distribute/where_can_i_distribute_my_apps.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Countries List</a></li>
                </ul>

                <h4 class="menu-heading"><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/videos/videos.html" target="_top">Videos</a></h4>

                <ul class="nav-list last">
                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/videos/videos.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> View All</a></li>
                </ul>
              </div>
            </div>
          </li>

          <li>
            <a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/community.html" title="Community" target="_top" class="top">Community</a>

            <div class="megamenu">
              <div class="nav-child">
                <h4 class="menu-heading">Connect</h4>

                <ul class="nav-list last">
                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/distribution/index.php"><img src="assets/wayback.png" style="vertical-align:top;"> Forums</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/http://developer.palm.com/blog" target="_blank"><img src="assets/wayback.png" style="vertical-align:top;"> Developer Blog</a></li>

                  <li><a href="http://twitter.com/webosdev" target="_blank"><img src="assets/check.png" style="vertical-align:top;"> Twitter</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/community/irc.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> IRC</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/rss_feeds.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> RSS</a></li>
                </ul>
              </div>

              <div class="nav-child">
                <h4 class="menu-heading">Resources</h4>

                <ul class="nav-list last">
                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/community/certified_developer_list.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Certified Developers</a></li>

                  <li><a href="https://github.com/search?q=webos" target="_blank"><img src="assets/check.png" style="vertical-align:top;"> webOS on github</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/resources/distribute/custom_feeds/custom_feeds.html" target="_top"><img src="assets/wayback.png" style="vertical-align:top;"> Guide to Custom Feeds</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/http://webos101.com/Main_Page" target="_blank"><img src="assets/wayback.png" style="vertical-align:top;"> webOS101 (external)</a></li>
                </ul>

                <h4 class="menu-heading">Community Sites</h4>

                <ul class="nav-list last">
                  <li><a href="https://web.archive.org/web/20130130211140/http://www.mobspot.com/" target="_blank"><img src="assets/wayback.png" style="vertical-align:top;"> mobspot</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/http://www.cyrket.com/m/palm/" target="_blank"><img src="assets/wayback.png" style="vertical-align:top;"> Cyrket</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/http://www.precentral.net/" target="_blank"><img src="assets/wayback.png" style="vertical-align:top;"> PreCentral</a></li>

                  <li><a href="https://web.archive.org/web/20130130211140/http://apps.webosroundup.com/" target="_blank"><img src="assets/wayback.png" style="vertical-align:top;"> webOS Roundup</a></li>
                  
                  <li><a href="https://www.webosnation.com" target="_blank"><img src="assets/check.png" style="vertical-align:top;"> webOS Nation</a></li>
                </ul>
              </div>
            </div>
          </li>

          <li>
            <a href="https://web.archive.org/web/20130130211140/https://developer.palm.com/content/api/index.html" title="Documentation" target="_top" class="top">Documentation</a>

            <div class="megamenu">
              <div class="nav-child">
                <h4 class="menu-heading">SDK Documentation</h4>

                <ul class="nav-list last">
                  <li><a href="docs/index.html"><img src="assets/check.png" style="vertical-align:top;"> Index</a></li>

                  <li><a href="docs/dev-guide.html"><img src="assets/check.png" style="vertical-align:top;"> Developer Guide</a></li>

                  <li><a href="docs/reference.html"><img src="assets/check.png" style="vertical-align:top;"> API Reference</a></li>

                  <li><a href="https://kylemaas.github.io/luna-sysmgr/index.htm"><img src="assets/check.png" style="vertical-align:top;"> Luna Service Reference</a></li>
                  
                  <li><a href="https://webos-internals.org/wiki/Main_Page"><img src="assets/check.png" style="vertical-align:top;"> WebOS Internals Wiki</a></li>
                </ul>
              </div>

              <div class="nav-child"></div>
            </div>
          </li>
        </ul>

        <div class="attachment">
          <div class="signup">
            <a class="account-text ctx-first" href="https://web.archive.org/web/20130130211140/https://developer.palm.com/index.php?option=com_user&amp;view=login&amp;login">Sign In</a> <a class="account-text" href=
            "https://web.archive.org/web/20130130211140/https://developer.palm.com/index.php?option=com_user&amp;view=login&amp;signup">Sign Up</a>
          </div>

          <form class="hp-search" action="https://web.archive.org/web/20130130211140/http://www.palm.com/us/search/developer.html" method="get">
            <fieldset>
              <legend><span>Search Form</span></legend> <button class="sifr ext-sifr-search" type="submit"><span>Search</span></button> <input class="search-txt" name="search" placeholder="Just Search" /> <input value="all" id="basic-search-collection" type="hidden" />
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>


<div w3-include-html="sdk-pdk.html"></div>
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
