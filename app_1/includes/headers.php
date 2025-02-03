<?php
$origin = ["bestsideconsulting.ma", "localhost"][0];

header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Origin: $origin");
header("Access-Control-Allow-Credentials: true");
header("Cache-Control: no-cache");
header("Content-Type: application/json");