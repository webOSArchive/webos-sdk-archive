<?php

$searchTerms = $_GET["search"];
if (isset($searchTerms) && $searchTerms != "") {
    $searchTerms = str_replace(' ', '+', $searchTerms);

    header("Location: https://www.google.com/search?q=site:sdk.webosarchive.com+" . $searchTerms);
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
