<?php
// Revision: 1.1
// Name: global.php

$linie = file("../include/eintraege.dat");
$insgesamt = count($linie);
$smil = file("../include/smilies.inc.php");
$smilinsg = count($smil);
$phpver = phpversion();
if($phpver >= "4.0.4"){ $reicht = "<img src='images/ok.gif' heigth='11' width='11'>"; }
if($phpver < "4.0.4"){ $reicht = "<img src='images/x.gif' heigth='11' width='11'>"; }
$eintragsize = filesize("../include/eintraege.dat");
$eintragsize = ("$eintragsize"/"1024");
$eintragsize = round($eintragsize,2);
if(!isset($action)){ $action = ""; }
if(!isset($pwd)){ $pwd = ""; }
if(!isset($logged)){ $logged = ""; }
if(!isset($type)){ $type = ""; }
if(!isset($gzipit)){ $gzipit = ""; }
if(!isset($nemo)){ $nemo = ""; }
if(!isset($htc1)){ $htc1 = ""; }
if(!isset($htc2)){ $htc2 = ""; }
if(!isset($htc3)){ $htc3 = ""; }
if(!isset($htc4)){ $htc4 = ""; }
if(!isset($linkunde)){ $linkunde = ""; }
if(!isset($vlinkunde)){ $vlinkunde = ""; }
if(!isset($alinkunde)){ $alinkunde = ""; }
if(!isset($hoverunde)){ $hoverunde = ""; }
if(!isset($insgwichtig)){ $insgwichtig = ""; }
if(!isset($begruescente)){ $begruescente = ""; }
if(!isset($alt)){ $alt = ""; }
if(!isset($erset)){ $erset = ""; }
if(!isset($picnam)){ $picnam = ""; }
if(!isset($schreibrechte)){ $schreibrechte = ""; }

$pathschreib = "../include/";
$dir_handle1337 = @opendir($pathschreib) or die("Konnte include Verzeichnis nicht öffnen");
while ($file1337 = readdir($dir_handle1337)){
if ($file1337 == ".." ||  $file1337 == ".htaccess"){
continue;
}else{
$datei1337 = $file1337;
$id1337 = fileperms("$pathschreib"."$datei1337");
$id1337 = decoct($id1337);
$id1337 = substr($id1337, (strlen($id1337) - 3));
if($id1337 == "777"){ $schreibok = "<img src='images/ok.gif' heigth='11' width='11'>"; }
if($id1337 != "777"){ $schreibok = "<img src='images/x.gif' heigth='11' width='11'>"; }
if($datei1337 == "."){ $datei1337 = "$pathschreib"; }
$schreibrechte .= "$datei1337 $schreibok<br>";
}
}
closedir($dir_handle1337); 

$sfile = fopen('../include/smilies.inc.php','r');
while (!feof($sfile)){
$sline = fgets($sfile,999999);
$sline = trim($sline);
$stext = explode("|",$sline);
if($stext[1] == "1"){
$insgwichtig += "1";
}
}
if($benachr == "An"){ $hatch = "<select name=\"benach\"><option selected value=\"An\">An</option><option value=\"Aus\">Aus</option></select>"; }
if($danke == "An"){ $hatch1 = "<select name=\"dank\"><option selected value=\"An\">An</option><option value=\"Aus\">Aus</option></select>"; }
if($benachr == "Aus"){ $hatch = "<select name=\"benach\"><option value=\"An\">An</option><option selected value=\"Aus\">Aus</option></select>"; }
if($danke == "Aus"){ $hatch1 = "<select name=\"dank\"><option value=\"An\">An</option><option selected value=\"Aus\">Aus</option></select>"; }
if($benachr == ""){ $hatch = "<select name=\"benach\"><option></option><option value=\"An\">An</option><option value=\"Aus\">Aus</option></select>"; }
if($danke == ""){ $hatch1 = "<select name=\"dank\"><option></option><option value=\"An\">An</option><option value=\"Aus\">Aus</option></select>"; }
if($aalink == "Ja"){ $hui = "<select name=\"adminlink\"><option selected value=\"Ja\">Ja</option><option value=\"Nein\">Nein</option></select>"; }
if($aalink == "Nein"){ $hui = "<select name=\"adminlink\"><option value=\"Ja\">Ja</option><option selected value=\"Nein\">Nein</option></select>"; }
if($aalink == ""){ $hui = "<select name=\"adminlink\"><option></option><option value=\"Ja\">Ja</option><option value=\"Nein\">Nein</option></select>"; }
if($htmlc == "An"){ $hatch2 = "<select name=\"htmlcode\"><option selected value=\"An\">An</option><option value=\"Aus\">Aus</option></select>"; }
if($gbc == "An"){ $hatch3 = "<select name=\"gbcode\"><option selected value=\"An\">An</option><option value=\"Aus\">Aus</option></select>"; }
if($htmlc == "Aus"){ $hatch2 = "<select name=\"htmlcode\"><option value=\"An\">An</option><option selected value=\"Aus\">Aus</option></select>"; }
if($gbc == "Aus"){ $hatch3 = "<select name=\"gbcode\"><option value=\"An\">An</option><option selected value=\"Aus\">Aus</option></select>"; }
if($htmlc == ""){ $hatch2 = "<select name=\"htmlcode\"><option></option><option value=\"An\">An</option><option value=\"Aus\">Aus</option></select>"; }
if($gbc == ""){ $hatch3 = "<select name=\"gbcode\"><option></option><option value=\"An\">An</option><option value=\"Aus\">Aus</option></select>"; }
if($includev == "Ja"){ $hatch4 = "<select name=\"includ\"><option selected value=\"Ja\">Ja</option><option value=\"Nein\">Nein</option></select>"; }
if($includev == "Nein"){ $hatch4 = "<select name=\"includ\"><option value=\"Ja\">Ja</option><option selected value=\"Nein\">Nein</option></select>"; }
if($includev == ""){ $hatch4 = "<select name=\"includ\"><option></option><option value=\"Ja\">Ja</option><option value=\"Nein\">Nein</option></select>"; }
if($flooding == "An"){ $hatch5 = "<select name=\"floodin\"><option selected value=\"An\">An</option><option value=\"Aus\">Aus</option></select>"; }
if($flooding == "Aus"){ $hatch5 = "<select name=\"floodin\"><option value=\"An\">An</option><option selected value=\"Aus\">Aus</option></select>"; }
if($flooding == ""){ $hatch5 = "<select name=\"floodin\"><option></option><option value=\"An\">An</option><option value=\"Aus\">Aus</option></select>"; }
if($online == "1"){ $gbstat = "<select size=\"1\" name=\"gbstatus\"><option selected value=\"1\">online</option><option value=\"0\">offline</option></select>"; }
if($online == "0"){ $gbstat = "<select size=\"1\" name=\"gbstatus\"><option value=\"1\">online</option><option value=\"0\" selected>offline</option></select>"; }
if($online == ""){ $gbstat = "<select size=\"1\" name=\"gbstatus\"><option></option><option value=\"1\">online</option><option value=\"0\">offline</option></select>"; }
if($gzipit == "Ja"){ $gzipi = "<select size=\"1\" name=\"gzipt\"><option selected value=\"Ja\">Ja</option><option value=\"Nein\">Nein</option></select>"; }
if($gzipit == "Nein"){ $gzipi = "<select size=\"1\" name=\"gzipt\"><option value=\"Ja\">Ja</option><option selected value=\"Nein\">Nein</option></select>"; }
if($gzipit == ""){ $gzipi = "<select size=\"1\" name=\"gzipt\"><option></option><option value=\"Ja\">Ja</option><option value=\"Nein\">Nein</option></select>"; }
if($gbttyp == "0"){ $hatch6 = "<select size=\"1\" name=\"ubertyp\"><option value=\"0\" selected>Keiner</option><option value=\"1\">Text</option><option value=\"2\">Bild</option></select>"; }
if($gbttyp == "1"){ $hatch6 = "<select size=\"1\" name=\"ubertyp\"><option value=\"0\">Keiner</option><option value=\"1\" selected>Text</option><option value=\"2\">Bild</option></select>"; }
if($gbttyp == "2"){ $hatch6 = "<select size=\"1\" name=\"ubertyp\"><option value=\"0\">Keiner</option><option value=\"1\">Text</option><option value=\"2\" selected>Bild</option></select>"; }
if($groseuber == ""){ $hatch7 = "<select size=\"1\" name=\"groseub\"><option selected></option><option value=\"1\">1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($groseuber == "1"){ $hatch7 = "<select size=\"1\" name=\"groseub\"><option value=\"1\" selected>1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($groseuber == "2"){ $hatch7 = "<select size=\"1\" name=\"groseub\"><option value=\"1\">1 (8pt)</option><option value=\"2\" selected>2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($groseuber == "3"){ $hatch7 = "<select size=\"1\" name=\"groseub\"><option value=\"1\">1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\" selected>3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($groseuber == "4"){ $hatch7 = "<select size=\"1\" name=\"groseub\"><option value=\"1\">1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\" selected>4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($groseuber == "5"){ $hatch7 = "<select size=\"1\" name=\"groseub\"><option value=\"1\">1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\" selected>5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($groseuber == "6"){ $hatch7 = "<select size=\"1\" name=\"groseub\"><option value=\"1\">1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\" selected>6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($groseuber == "7"){ $hatch7 = "<select size=\"1\" name=\"groseub\"><option value=\"1\">1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\" selected>7 (36pt)</option></select>"; }
if($grosetext == ""){ $hatch8 = "<select size=\"1\" name=\"grosetxt\"><option selected></option><option value=\"1\">1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($grosetext == "1"){ $hatch8 = "<select size=\"1\" name=\"grosetxt\"><option value=\"1\" selected>1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($grosetext == "2"){ $hatch8 = "<select size=\"1\" name=\"grosetxt\"><option value=\"1\">1 (8pt)</option><option value=\"2\" selected>2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($grosetext == "3"){ $hatch8 = "<select size=\"1\" name=\"grosetxt\"><option value=\"1\">1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\" selected>3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($grosetext == "4"){ $hatch8 = "<select size=\"1\" name=\"grosetxt\"><option value=\"1\">1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\" selected>4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($grosetext == "5"){ $hatch8 = "<select size=\"1\" name=\"grosetxt\"><option value=\"1\">1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\" selected>5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($grosetext == "6"){ $hatch8 = "<select size=\"1\" name=\"grosetxt\"><option value=\"1\">1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\" selected>6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($grosetext == "7"){ $hatch8 = "<select size=\"1\" name=\"grosetxt\"><option value=\"1\">1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\" selected>7 (36pt)</option></select>"; }
//if($cssgrose == ""){ $hatch9 = "<select size=\"1\" name=\"cssgro\"><option selected></option><option value=\"1\">1 (8pt)</option><option value=\"2\">2 (10pt)</option><option value=\"3\">3 (12pt)</option><option value=\"4\">4 (14pt)</option><option value=\"5\">5 (18pt)</option><option value=\"6\">6 (24pt)</option><option value=\"7\">7 (36pt)</option></select>"; }
if($online == "1"){ $onlinestat = "online"; }
if($online == "0"){ $onlinestat = "offline"; }
if($online == ""){ $onlinestat = "???"; }
if($linkunder == "ja"){ $htc1 = " checked"; }
if($alinkunder == "ja"){ $htc2 = " checked"; }
if($vlinkunder == "ja"){ $htc3 = " checked"; }
if($hoverunder == "ja"){ $htc4 = " checked"; }
if($begruescenter == "center"){ $htc5 = " checked"; }
if($bgfixed == "fixed"){ $htc6 = " checked"; }

class zipfile
{
  var $datasec      = array();
  var $ctrl_dir     = array();
  var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
  var $old_offset   = 0;
  function unix2DosTime($unixtime = 0) {
    $timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);
    if ($timearray['year'] < 1980) {
      $timearray['year']    = 1980;
      $timearray['mon']     = 1;
      $timearray['mday']    = 1;
      $timearray['hours']   = 0;
      $timearray['minutes'] = 0;
      $timearray['seconds'] = 0;
    }
    return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) |
            ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
  }
  function addFile($data, $name, $time = 0)
  {
    $name     = str_replace('\\', '/', $name);
    $dtime    = dechex($this->unix2DosTime($time));
    $hexdtime = '\x' . $dtime[6] . $dtime[7]
      . '\x' . $dtime[4] . $dtime[5]
      . '\x' . $dtime[2] . $dtime[3]
      . '\x' . $dtime[0] . $dtime[1];
      eval('$hexdtime = "' . $hexdtime . '";');
      $fr   = "\x50\x4b\x03\x04";
      $fr   .= "\x14\x00";
      $fr   .= "\x00\x00";
      $fr   .= "\x08\x00";
      $fr   .= $hexdtime;
      $unc_len = strlen($data);
      $crc     = crc32($data);
      $zdata   = gzcompress($data);
      $zdata   = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
      $c_len   = strlen($zdata);
      $fr      .= pack('V', $crc);
      $fr      .= pack('V', $c_len);
      $fr      .= pack('V', $unc_len);
      $fr      .= pack('v', strlen($name));
      $fr      .= pack('v', 0);
      $fr      .= $name;
      $fr .= $zdata;
      $fr .= pack('V', $crc);
      $fr .= pack('V', $c_len);
      $fr .= pack('V', $unc_len);
      $this -> datasec[] = $fr;
      $new_offset        = strlen(implode('', $this->datasec));
      $cdrec = "\x50\x4b\x01\x02";
      $cdrec .= "\x00\x00";
      $cdrec .= "\x14\x00";
      $cdrec .= "\x00\x00";
      $cdrec .= "\x08\x00";
      $cdrec .= $hexdtime;
      $cdrec .= pack('V', $crc);
      $cdrec .= pack('V', $c_len);
      $cdrec .= pack('V', $unc_len);
      $cdrec .= pack('v', strlen($name) );
      $cdrec .= pack('v', 0 );
      $cdrec .= pack('v', 0 );
      $cdrec .= pack('v', 0 );
      $cdrec .= pack('v', 0 );
      $cdrec .= pack('V', 32 );
      $cdrec .= pack('V', $this -> old_offset );
      $this -> old_offset = $new_offset;
      $cdrec .= $name;
      $this -> ctrl_dir[] = $cdrec;
  }
  function file()
  {
    $data    = implode('', $this -> datasec);
    $ctrldir = implode('', $this -> ctrl_dir);
    return
    $data .
    $ctrldir .
    $this -> eof_ctrl_dir .
    pack('v', sizeof($this -> ctrl_dir)) .
    pack('v', sizeof($this -> ctrl_dir)) .
    pack('V', strlen($ctrldir)) .
    pack('V', strlen($data)) .
    "\x00\x00";
  }
}
?>