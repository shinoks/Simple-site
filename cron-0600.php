<?php
$params = array('username'=>'cron', 'password'=>'UJf837$ksd94*$@)46643456f', 'action'=>'sendFakturaRemainder');


$handle = curl_init('http://www.skleptest.grupaformat.pl/index.php?api=api');
curl_setopt($handle, CURLOPT_POST, true);
curl_setopt($handle, CURLOPT_POSTFIELDS, $params);
curl_exec($handle);