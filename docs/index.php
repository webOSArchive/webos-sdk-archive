<html>
<head>
    <title>webOS Archive - SDK Reference</title>
    <style>
      body, html {width: 100%; height: 100%; margin: 0; padding: 0}
      .menu-wrapper {position: absolute;top: 0; left: 0; right: 0; height: 45px; }
      .second-row {position: absolute; top: 45px; left: 0; right: 0; bottom: 0;  }
      .second-row iframe {display: block; width: 100%; height: 100%; border: none;}
    </style>
    <link rel="../shortcut icon" href="favicon.ico" type="application/x-empty; charset=binary">
    <link rel="../icon" href="favicon.ico" type="application/x-empty; charset=binary">
</head>
<body>
<?php

$usePath = "index.html";
$uri = $_SERVER['REQUEST_URI'];
$uriParts = explode("?", $uri);
if (isset($uriParts[1])) {
  $usePath = urldecode($uriParts[1]);
}
$usePath = "docs.html#" . $usePath;
?>
<?php include("../menu.php"); ?>
<div class="second-row">
<iframe src="<?PHP echo $usePath ?>" width="100%" height="100%">
</div>
</body>
</html>