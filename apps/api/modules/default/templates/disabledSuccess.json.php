<?php 
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header("Content-Type:text/json"); ?>
{ "error" : [
"code" : 403,
"message" : "The Page is Unavailable",
"description" : "This page has been disabled."
]
}