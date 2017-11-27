<?php
$address="127.0.0.1";
$port="32226";
$sock=socket_create(AF_INET,SOCK_STREAM,0) or $sock = false;
socket_connect($sock,$address,$port) or $sock = false;
 ?>