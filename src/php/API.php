<?php

use PHP\CoolSort;

require('CoolSort.php');
require('data.php');

$base64Code = base64_encode(implode(' - ' , $socialNetworks));
$codeList = str_split($base64Code);
$codeListKeys = array_keys($codeList);
shuffle($codeListKeys);
$coolSort = new CoolSort();
$coolSort->execute($codeListKeys);

echo json_encode(['parts' => $coolSort->getMergedParts(), 'code' => $codeList]);
