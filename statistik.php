<?php
// Revision: 1.0
// Name: statistik.php

///////////////////////////////////////////////////////////
// Dieses Script wurde programmiert von
// Daniel Köhler und F-Zero
///////////////////////////////////////////////////////////
// Alle Scripte dürfen privat
// frei eingesetzt werden
///////////////////////////////////////////////////////////
// Noch mehr Scripte:
// http://www.unze.net/
///////////////////////////////////////////////////////////
// Copyright (c) 2001-2005 by
// Daniel Köhler
///////////////////////////////////////////////////////////

$pfad = ""; // Pfad zum GB (relativ oder komplett, mit / am Ende)

include "$pfad"."include/config1.inc.php";
include "$pfad"."include/config2.inc.php";
include "$pfad"."include/config3.inc.php";
include "$pfad"."include/userdaten.inc.php";
include "$pfad"."include/mailtmpl.inc.php";
include "$pfad"."include/functions.inc.php";
include "$pfad"."include/online.inc.php";
include "$pfad"."include/config.inc.php";
if($gzipit == "ja"){ ob_start ("ob_gzhandler"); }
$linie = file("$pfad"."include/eintraege.dat");
$insgesamt = count($linie);

$file = fopen("$pfad"."include/eintraege.dat","r");
while(!feof($file)){
$line = fgets($file,filesize("./include/eintraege.dat"));
$line = trim($line);
$mtext = explode("|",$line);
$date = "$mtext[2]";
$date = str_replace("erstellt am","","$date");
  echo "$date<br>\n";
}







?>