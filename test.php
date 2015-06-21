<?php

$url = "https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyCfFUXBDjRAEvfZu65YQxlGXNj1GrcJxgU";
$obj = json_decode(file_get_contents($url),true);
var_dump($obj);