<?php
// Revision: 1.2
// Name: config.inc.php

/* Diese Datei darf ohne Lizenz nicht verändert werden! */

extract($_REQUEST,EXTR_SKIP);
$version="3.2.0 build 10";
$cpy="[b][a][f]"."$sart"."[g][h][i][j][k] $version"."[e][d][a][l][e][a][c]";
function cpyr(){ global $sart, $version, $cpy; copyright(); $cpy = trim($cpy); $cpy = rtrim($cpy); $cpy = ltrim($cpy); $cpy = "\n$cpy\n"; echo "$cpy"; }
$hcpyr="$a0006\n$a0001\n$a0002$a0004$version$a0002\n$a0002$a0005$a0002\n$a0002$a0003$a0002\n$a0001\n$a0007";
?>