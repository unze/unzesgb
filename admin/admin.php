<?php
// Revision: 1.3
// Name: admin.php

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
// Copyright (c) 2001-2006 by
// Daniel Köhler
///////////////////////////////////////////////////////////

include "../include/config1.inc.php";
include "../include/config2.inc.php";
include "../include/config3.inc.php";
include "../include/userdaten.inc.php";
include "../include/mailtmpl.inc.php";
include "../include/functions.inc.php";
include "../include/online.inc.php";
include "../include/config.inc.php";
if($gzipit == "ja"){ ob_start ("ob_gzhandler"); }
$md5pwd = md5("$pwd");
$md5nemo = md5("$nemo");
include "./global.php";
if($action == ""){
  header("Location: index.php");
}
if($action == "frame"){
        if($md5pwd == "$pass" && $md5nemo == "$username"){
print '<html>
<head>
<title>unzes gb '.$version.' - Administration</title>
</head>
<frameset rows="64,*" framespacing="0" border="0" frameborder="0">
  <frameset cols="164,*">
  <frame name="ecke" scrolling="no" noresize target="main" src="'.$PHP_SELF.'?action=ecke&nemo='.$md5nemo.'&pwd='.$md5pwd.'">
    <frame name="oben" target="main" src="'.$PHP_SELF.'?action=oben&nemo='.$md5nemo.'&pwd='.$md5pwd.'" scrolling="no" noresize>
  </frameset>
  <frameset cols="165,*">
    <frame name="nav" target="main" scrolling="no" noresize src="'.$PHP_SELF.'?action=nav&nemo='.$md5nemo.'&pwd='.$md5pwd.'">
    <frame name="main" scrolling="auto" src="'.$PHP_SELF.'?action=main&nemo='.$md5nemo.'&pwd='.$md5pwd.'">
  </frameset>
  <noframes>
  <body>
  <p>Ihr Browser unterstützt leider keine Frames...</p>
  </body>
  </noframes>
</frameset>

</html>';
        }
        if($md5pwd != "$pass" || $md5nemo != "$username"){ header("Location: index.php?logged=1"); }
}
        if($md5pwd == md5("$pass") && $md5nemo == md5("$username")){
if($action == "ecke"){
print '<html>

<head>
<title>unzes gb '.$version.' - Administration</title>
<link rel="stylesheet" href="style.css">
</head>
<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" bgcolor="#46A0E3">
<div>&nbsp;</div>
</body>
</html>';
}

if($action == "main"){
print '<html>
<head>
<title>unzes gb '.$version.' - Administration</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<p align="center"><font size="5">unzes gb '.$version.' - Administration</font></p>
<p align="center">&nbsp;</p>
<div align="center">
  <center>
  <table border="0" cellpadding="2" cellspacing="1" width="600" bgcolor="#46A0E3">
    <tr>
      <td bgcolor="#D6DFF7" width="100%" colspan="2" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;Statistiken</font></b></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230">unzes gb Version</td>
      <td bgcolor="#FFFFFF" width="370">'.$version.'</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230">PHP-Version</td>
      <td bgcolor="#FFFFFF" width="370">'.$phpver.' '.$reicht.'</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230">Schreibrechte (777)</td>
      <td bgcolor="#FFFFFF" width="370">'.$schreibrechte.'</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230">Status</td>
      <td bgcolor="#FFFFFF" width="370">'.$onlinestat.'</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230">Einträge</td>
      <td bgcolor="#FFFFFF" width="370">'.$insgesamt.' (<a href="'.$PHP_SELF.'?action=zipdownload&nemo='.$nemo.'&pwd='.$pwd.'">downloaden</a>, '.$eintragsize.' KB)</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230">Smilies</td>
      <td bgcolor="#FFFFFF" width="370">'.$smilinsg.' ('.$insgwichtig.' wichtige)</td>
    </tr>
    <tr>
      <td bgcolor="#D6DFF7" width="100%" colspan="2" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;Mitarbeiter</font></b></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230"><p align="left">Daniel Köhler (unze)</td>
      <td bgcolor="#FFFFFF" width="370"><p align="left">Projektleiter, Hauptentwickler</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230"><p align="left">F-Zero</td>
      <td bgcolor="#FFFFFF" width="370"><p align="left">Ratgeber, Gelegentliche Mithilfe</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230"><p align="left">Fritz Elfers</td>
      <td bgcolor="#FFFFFF" width="370"><p align="left">Ratgeber, Betatester</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230"><p align="left">Manuel Schiller</td>
      <td bgcolor="#FFFFFF" width="370"><p align="left">Ratgeber, Gelegentliche Mithilfe</td>
    </tr>
    <tr>
      <td bgcolor="#D6DFF7" width="100%" colspan="2" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;Links</font></b></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230"><p align="left">Homepage</td>
      <td bgcolor="#FFFFFF" width="370"><p align="left"><a href="http://www.unze.net/" target="_blank">unze.net</a></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230"><p align="left">Supportforum</td>
      <td bgcolor="#FFFFFF" width="370"><p align="left"><a href="http://forum.unze.net/" target="_blank">forum.unze.net</a></td>
    </tr>
<!--    <tr>
      <td bgcolor="#FFFFFF" width="230"><p align="left">Versionscheck</td>
      <td bgcolor="#FFFFFF" width="370"><p align="left"><a href="http://dev.73x.de/gbversion.php?version='.$version.'" target="_blank">&#187;&nbsp;Check</a></td>
    </tr>-->
  </table>
  </center>
</div>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
</body>
</html>';
}

if($action == "zipdownload"){
  $zipfile = new zipfile();
  $filedata = implode('',file("../include/eintraege.dat"));
  $zipfile -> addFile($filedata, "eintraege.dat");
  header("Content-type: application/octet-stream");
  header("Content-disposition: attachment; filename=eintraege.zip");
  echo $zipfile -> file();
}

if($action == "nav"){
print '<html>
<head>
<title>unzes gb '.$version.' - Administration</title>
<link rel="stylesheet" href="style.css">
<base target="main">
</head>
<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" bgcolor="#46A0E3">
<center>
<map name="adminnav">
        <area href="'.$PHP_SELF.'?action=main&nemo='.$nemo.'&pwd='.$pwd.'" shape="rect" coords="7, 41, 119, 64" title="Admin-Startseite">
        <area href="'.$PHP_SELF.'?action=allgemein&nemo='.$nemo.'&pwd='.$pwd.'" shape="rect" coords="7, 63, 154, 86" title="Allgemeine Einstellungen">
        <area href="'.$PHP_SELF.'?action=darstellung&nemo='.$nemo.'&pwd='.$pwd.'" shape="rect" coords="7, 85, 140, 106" title="Darstellungsoptionen">
        <area href="'.$PHP_SELF.'?action=sicherheit&nemo='.$nemo.'&pwd='.$pwd.'" shape="rect" coords="7, 109, 130, 131" title="Sicherheitsoptionen">
        <area href="'.$PHP_SELF.'?action=eintraege&nemo='.$nemo.'&pwd='.$pwd.'" shape="rect" coords="8, 132, 131, 151" title="Einträge bearbeiten">
        <area href="'.$PHP_SELF.'?action=smilies&nemo='.$nemo.'&pwd='.$pwd.'" shape="rect" coords="7, 152, 123, 174" title="Smilies bearbeiten">
        <area href="'.$PHP_SELF.'?action=mailvorlagen&nemo='.$nemo.'&pwd='.$pwd.'" shape="rect" coords="7, 174, 155, 197" title="Mailtemplates bearbeiten">
        <area href="'.$PHP_SELF.'?action=status&nemo='.$nemo.'&pwd='.$pwd.'" shape="rect" coords="8, 200, 119, 220" title="Gästebuchstatus">
        <area href="'.$PHP_SELF.'?action=dfcookie&nemo='.$nemo.'&pwd='.$pwd.'" shape="rect" coords="7, 222, 139, 243" title="Flood-Cookie löschen">
        <area href="'.$PHP_SELF.'?action=passwort&nemo='.$nemo.'&pwd='.$pwd.'" shape="rect" coords="6, 244, 142, 266" title="Benutzerdaten ändern">
        <area href="index.php?logged=2" shape="rect" coords="7, 266, 91, 288" title="Ausloggen" target="_top"></map>
        <img border="0" src="images/menu.png" usemap="#adminnav" width="160" height="300">
</center>
</body>
</html>';
}

if($action == "oben"){
print '<html>
<head>
<title>unzes gb '.$version.' - Administration</title>
<link rel="stylesheet" href="style.css">
</head>
<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" bgcolor="#46A0E3">
<div align="center">
  <table border="0" cellpadding="2" cellspacing="1" width="100%" height="100%">
    <tr>
      <td width="50%" valign="top" align="left"><div align="left" style="font-size: 11px; color:; #ffffff">&nbsp;</div></td>
      <td width="50%" valign="top" align="right"><div align="right" style="font-size: 11px; color: #ffffff;">Version '.$version.'<br><a href="../gb.php" target="_blank" style="font-size: 11px; color: #ffffff;">Zum Gästebuch</a></div></td>
    </tr>
    <tr>
      <td width="50%" valign="bottom" align="left"><div align="left" style="font-size: 11px;">&nbsp;</div></td>
      <td width="50%" valign="bottom" align="right"><div align="right" style="font-size: 11px;"><a href="index.php?logged=2" target="_top" style="font-size: 11px;"><img src="images/logout.png" height="22" width="22" border="0" alt="Ausloggen"></a></div></td>
    </tr>
  </table>
</div>
</body>
</html>';
}

if($action == "eintraege"){
print '<html>
<head>
<title>Einträge bearbeiten</title>
<link rel="stylesheet" href="style.css">
<script language="JavaScript" src="popuphilfe.js"></script>
</head>
<body>
<center><font size="5">Einträge bearbeiten</font><br><br><br></center>
<div align="center">
  <center>
  <table border="0" cellpadding="2" cellspacing="1" width="600" bgcolor="#46A0E3">
    <tr>
      <td bgcolor="#D6DFF7" width="100%" colspan="3" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;Funktionen</font></b></td>
    </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Nummerieren</b></td>
        <td bgcolor="#FFFFFF" width="350"><a href="'.$PHP_SELF.'?action=nummerieren&nemo='.$nemo.'&pwd='.$pwd.'">&#187;&nbsp;Start</a></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(nummerieren)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
  </table>
</div>
<br>';
cpyr();
print "</body>\n</html>";
}

if($action == "nummerieren"){
print '<html>
<head>
<title>Nummerieren</title>
<link rel="stylesheet" href="style.css">
<script language="JavaScript" src="popuphilfe.js"></script>
</head>
<body>
<center><font size="5">Nummerieren</font><br><br><br></center>
<form action="'.$PHP_SELF.'?action=neuenummer&pwd='.$pass.'&nemo='.$nemo.'" method="post">
<div align="center">
  <center>
    <table border="0" cellpadding="3" cellspacing="1" width="600" bgcolor="#46A0E3">
      <tr>
        <td colspan="3" bgcolor="#D6DFF7" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;Nummerieren</font></b></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Startzahl</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="newnumber" size="7" value="1"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(startzahl)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Hinweis</b></td>
        <td width="370" bgcolor="#FFFFFF" colspan="2"><font size="1">Unterbrechen Sie auf keinen Fall die Aktion, nachdem Sie auf "starten" geklickt haben. Sichern / Downloaden Sie vorher die eintraege.dat!</font></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" colspan="3" valign="middle" align="center"><input type="reset" value="zurücksetzen"> <input type="submit" value="  starten  "></td>
      </tr>
    </table>
  </center>
</div>
</form>';
cpyr();
print "</body>\n</html>";
}

if($action == "neuenummer"){
print '<html>
<head>
<title>Nummerieren</title>
<link rel="stylesheet" href="style.css">
<script language="JavaScript" src="popuphilfe.js"></script>
</head>
<body>
<center><font size="5">Nummerieren</font><br><br><br></center>
<div align="center">
  <center>
    <table border="0" cellpadding="3" cellspacing="1" width="600" bgcolor="#46A0E3">
      <tr>
        <td colspan="3" bgcolor="#D6DFF7" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;Nummerieren</font></b></td>
      </tr>
      <tr>
        <td colspan="3" bgcolor="#FFFFFF" valign="middle" align="center">';
$neuenummer = ("$insgesamt"+"$newnumber");
$file = fopen("../include/eintraege.dat","r");
while (!feof($file))
{
$neuenummer--;
$line = fgets($file,999999);
$line = trim($line);
$mtext = explode("|",$line);

if($mtext[0] != "1"){ $data.="$neuenummer|$mtext[1]|$mtext[2]|$mtext[3]|$mtext[4]|$mtext[5]|$mtext[6]|$mtext[7]\n"; }
if($mtext[0] == "1"){ $data.="$neuenummer|$mtext[1]|$mtext[2]|$mtext[3]|$mtext[4]|$mtext[5]|$mtext[6]|$mtext[7]"; }
echo "Nr. $mtext[0] nummeriert<br>\n";
flush();
}

$data = chop($data);
$filer = fopen("../include/eintraege.dat","wb+");
fputs($filer,$data);
fclose($filer);

print '
</td>
      </tr>
      <tr>
        <td colspan="3" bgcolor="#FFFFFF" valign="middle" align="center"><a href="'.$PHP_SELF.'?action=eintraege&nemo='.$nemo.'&pwd='.$pwd.'">&lt;-&nbsp;zurück</a></td>
      </tr>
    </table>
  <br>
  </center>
</div>';
cpyr();
print "</body>\n</html>";
}

if($action == "allgemein"){
print '<html>
<head>
<title>Allgemeine Einstellungen</title>
<link rel="stylesheet" href="style.css">
<script language="JavaScript" src="popuphilfe.js"></script>
</head>
<body>
<center><font size="5">Allgemeine Einstellungen</font><br><br><br></center>
<form action="'.$PHP_SELF.'?action=speichern1&pwd='.$pass.'&nemo='.$nemo.'" method="post">
<input type="hidden" value="'.$version.'" name="ver">
<div align="center">
  <center>
    <table border="0" cellpadding="3" cellspacing="1" width="600" bgcolor="#46A0E3">
      <tr>
        <td colspan="3" bgcolor="#D6DFF7" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;Allgemeine Einstellungen</font></b></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Name des Gästebuchs</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="gbnam" size="30" value="'.$titel.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(guestbookname)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Bildurl</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="tite" size="30" value="'.$picurl.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(bildurl)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Art des Titels</b></td>
        <td bgcolor="#FFFFFF" width="350">'.$hatch6.'</td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(titletype)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Server Offset</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="off" size="30" value="'.$offset.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(serveroffset)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Zeitzone</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="timez" size="30" value="'.$zeitzone.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(timezone)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Begrüßungstext</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="begrues" size="40" value="'.$begruesungstxt.'">&nbsp;<input type="checkbox" name="begruescente" value="center" class="check"'.$htc5.'><font size="1">center?</font></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(welcometext)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Benachrichtigungs E-Mail</b></td>
        <td bgcolor="#FFFFFF" width="350">'.$hatch.'</td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(notification)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Dankes E-Mail</b></td>
        <td bgcolor="#FFFFFF" width="350">'.$hatch1.'</td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(thank)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>E-Mail für Benachrichtigung</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="mail" size="30" value="'.$email.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(notimail)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>URL des 1. Linkes</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="home" size="30" value="'.$homepage.'">&nbsp;<input type="text" name="hometarget" size="15" value="'.$homepagetarget.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(url1)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Titel des 1. Linkes</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="homet" size="30" value="'.$homepaget.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(title1)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>URL des 2 Linkes</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="home1" size="30" value="'.$homepage1.'">&nbsp;<input type="text" name="home1target" size="15" value="'.$homepage1target.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(url2)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Titel des 2. Linkes</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="homet1" size="30" value="'.$homepaget1.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(title2)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Einträge pro Seite</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="eintraps" size="5" value="'.$eintragps.'">
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(maxentrys)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Individuelles CSS</b></td>
        <td bgcolor="#FFFFFF" width="350"><textarea cols="65" rows="10" name="indicss" wrap="off">'.$indcss.'</textarea></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(indvcss)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Individueller Head-Tag</b></td>
        <td bgcolor="#FFFFFF" width="350"><textarea cols="65" rows="10" name="hed" wrap="off">'.$head.'</textarea></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(indvhead)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Individueller Body-Tag</b></td>
        <td bgcolor="#FFFFFF" width="350"><textarea cols="65" rows="10" name="bod" wrap="off">'.$body.'</textarea></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(indvbody)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" colspan="3" valign="middle" align="center"><input type="reset" value="zurücksetzen"> <input type="submit" value="  speichern  "></td>
      </tr>
    </table>
  </center>
</div>
</form>';
cpyr();
print "</body>\n</html>";
}

if($action == "sicherheit"){
print '<html>
<head>
<title>Sicherheitsoptionen</title>
<link rel="stylesheet" href="style.css">
<script language="JavaScript" src="popuphilfe.js"></script>
</head>
<body>
<center><font size="5">Sicherheitsoptionen</font><br><br><br></center>
<form action="'.$PHP_SELF.'?action=speichern3&pwd='.$pass.'&nemo='.$nemo.'" method="post">
<input type="hidden" value="'.$version.'" name="ver">
<div align="center">
  <center>
    <table border="0" cellpadding="3" cellspacing="1" width="600" bgcolor="#46A0E3">
      <tr>
        <td colspan="3" bgcolor="#D6DFF7" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;Sicherheitsoptionen</font></b></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Administrations-Link anzeigen</b></td>
        <td bgcolor="#FFFFFF" width="350">'.$hui.'</td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(adminlink)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>HTML-Code</b></td>
        <td bgcolor="#FFFFFF" width="350">'.$hatch2.'</td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(htmlcode)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>GB-Code</b></td>
        <td bgcolor="#FFFFFF" width="350">'.$hatch3.'</td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(gbcode)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Flood-Sperre</b></td>
        <td bgcolor="#FFFFFF" width="350">'.$hatch5.'</td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(floodsperre)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Flood-Zeit (in Minuten)</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="floodtim" size="10" value="'.$floodtime.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(floodtime)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Badword-Liste</b></td>
        <td bgcolor="#FFFFFF" width="350"><textarea cols="50" rows="7" name="word" wrap="virtual">'.$words.'</textarea></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(badwordlist)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Replace-Word</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="replacew" size="30" value="'.$replaceword.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(replaceword)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td colspan="3" bgcolor="#D6DFF7" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;Maximale Zeichenlängen</font></b></td></tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Kommentar</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="kolength" value="'.$komlength.'" maxlength="7" size="30"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(commente)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Name</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="namlength" value="'.$namelength.'" size="30"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(namee)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>E-Mail</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="mailength" value="'.$maillength.'" size="30"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(emaile)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Homepage</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="urlength" value="'.$urllength.'" size="30"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(homepagee)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>ICQ UIN</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="iclength" value="'.$icqlength.'" size="30"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(icquine)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Wortlänge</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="worlength" value="'.$wordlength.'" size="30"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(worde)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" colspan="3" valign="middle" align="center"><input type="reset" value="zurücksetzen"> <input type="submit" value="  speichern  "></td>
      </tr>
    </table>
  </center>
</div>
</form>';
cpyr();
print "</body>\n</html>";
}

if($action == "dfcookie"){
setcookie ("ungb3");
print '<html>
<head>
<title>Flood-Cookie gelöscht</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<center><font size="5">Flood-Cookie löschen</font><br><br><br></center>
<div align="center">
  <center>
    <table border="0" cellpadding="3" cellspacing="1" width="600" bgcolor="#46A0E3">
      <tr>
        <td bgcolor="#D6DFF7" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;Flood-Cookie wurde gelöscht</font></b></td></tr>
      <tr>
        <td width="100%" bgcolor="#FFFFFF" align="center"><br>Ihr Flood-Cookie wurde erfolgreich gelöscht, Sie können nun wieder einen Eintrag erstellen!<br><br></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" colspan="3" valign="middle" align="center"><a href="'.$PHP_SELF.'?action=main&pwd='.$pwd.'&nemo='.$nemo.'">Zurück zur Administration</a></td>
      </tr>
    </center>
  </table>
</div>';
cpyr();
print "</body>\n</html>";
}

if($action == "darstellung"){
print '<html>
<head>
<title>Darstellungsoptionen</title>
<link rel="stylesheet" href="style.css">
<script language="JavaScript" src="popuphilfe.js"></script>
</head>
<body>
<center><font size="5">Darstellungsoptionen</font><br><br><br></center>
<form action="'.$PHP_SELF.'?action=speichern2&pwd='.$pass.'&nemo='.$nemo.'" method="post">
<div align="center">
  <center>
    <table border="0" cellpadding="3" cellspacing="1" width="600" bgcolor="#46A0E3">
      <tr>
        <td colspan="3" bgcolor="#D6DFF7" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;Darstellungsoptionen</font></b></td></tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Hintergrundfarbe</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="bgcolo" size="7" value="'.$bgcolor.'" onChange="newcolor(this.form.colorbgcolor,this.value)">&nbsp;&nbsp;<input type="button" name="colorbgcolor" value="       " style="background-color: '.$bgcolor.';" disabled></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(bgcolor)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Textfarbe innerhalb Tabellen</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="txtin" size="7" value="'.$textin.'" onChange="newcolor(this.form.colortextin,this.value)">&nbsp;&nbsp;<input type="button" name="colortextin" value="       " style="background-color: '.$textin.';" disabled></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(txtcit)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Textfarbe außerhalb Tabellen</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="txtout" size="7" value="'.$textout.'" onChange="newcolor(this.form.colortextout,this.value)">&nbsp;&nbsp;<input type="button" name="colortextout" value="       " style="background-color: '.$textout.';" disabled></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(txtcat)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Kommentarfarbe</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="kofarb" size="7" value="'.$kommfarb.'" onChange="newcolor(this.form.colorkommfarb,this.value)">&nbsp;&nbsp;<input type="button" name="colorkommfarb" value="       " style="background-color: '.$kommfarb.';" disabled>&nbsp;</td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(commentcol)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Link</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="lin" size="7" value="'.$link.'" onChange="newcolor(this.form.colorlink,this.value)">&nbsp;&nbsp;<input type="button" name="colorlink" value="       " style="background-color: '.$link.';" disabled>&nbsp;&nbsp;<input type="checkbox" name="linkunde" value="ja" class="check"'.$htc1.'><font size="1">underline?</font></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(linkcol)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Aktiver Link</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="alin" size="7" value="'.$alink.'" onChange="newcolor(this.form.coloralink,this.value)">&nbsp;&nbsp;<input type="button" name="coloralink" value="       " style="background-color: '.$alink.';" disabled>&nbsp;&nbsp;<input type="checkbox" name="alinkunde" value="ja" class="check"'.$htc2.'><font size="1">underline?</font></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(alinkcol)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Besuchter Link</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="vlin" size="7" value="'.$vlink.'" onChange="newcolor(this.form.colorvlink,this.value)">&nbsp;&nbsp;<input type="button" name="colorvlink" value="       " style="background-color: '.$vlink.';" disabled>&nbsp;&nbsp;<input type="checkbox" name="vlinkunde" value="ja" class="check"'.$htc3.'><font size="1">underline?</font></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(vlinkcol)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Hover Link</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="hlin" size="7" value="'.$hlink.'" onChange="newcolor(this.form.colorhlink,this.value)">&nbsp;&nbsp;<input type="button" name="colorhlink" value="       " style="background-color: '.$hlink.';" disabled>&nbsp;&nbsp;<input type="checkbox" name="hoverunde" value="ja" class="check"'.$htc4.'><font size="1">underline?</font></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(hlinkcol)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Schriftart</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="sar" size="30" value="'.$sart.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(fontface)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Textgröße Überschriften</b></td>
        <td bgcolor="#FFFFFF" width="350">'.$hatch7.'</td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(fontsizeu)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Textgröße</b></td>
        <td bgcolor="#FFFFFF" width="350">'.$hatch8.'</td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(fontsize)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Hintergrundbild</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="backgroun" size="30" value="'.$background.'">&nbsp;<input type="checkbox" name="bgfixe" value="fixed" class="check"'.$htc6.'><font size="1">fixed?</font></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(bgpic)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>CSS Schriftart</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="cssff" size="30" value="'.$cssfontf.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(cssfface)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>CSS Farbe</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="csscol" size="7" value="'.$csscolor.'" onChange="newcolor(this.form.colorcsscolor,this.value)">&nbsp;&nbsp;<input type="button" name="colorcsscolor" value="       " style="background-color: '.$csscolor.';" disabled></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(csscolor)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>CSS Textfarbe</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="csstxt" size="7" value="'.$csstext.'" onChange="newcolor(this.form.colorcsstext,this.value)">&nbsp;&nbsp;<input type="button" name="colorcsstext" value="       " style="background-color: '.$csstext.';" disabled></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(cssfcolor)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>CSS Schriftgröße</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="cssgro" size="7" value="'.$cssgrose.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(cssfsize)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Scrollbar-Base-Color:</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="scrollcolo" size="7" value="'.$scrollcol.'" onChange="newcolor(this.form.colorcsscolor,this.value)">&nbsp;&nbsp;<input type="button" name="colorcsscolor" value="       " style="background-color: '.$scrollcol.';" disabled></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(scrollcol)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td colspan="3" bgcolor="#D6DFF7" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;Tabellenoptionen</font></b></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Tabellenbreite</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="tbreit" size="7" value="'.$tbreite.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(tablewid)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Eintrags-Zellenbreite links</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="breitesm" size="7" value="'.$breitesmn.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(cellwidl)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Zellenabstand innen</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="tpadding" size="7" value="'.$cellpadding.'"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(cellpadding)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Randfarbe</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="fabtabran" size="7" value="'.$fabtabrand.'" onChange="newcolor(this.form.colorfabtabrand,this.value)">&nbsp;&nbsp;<input type="button" name="colorfabtabrand" value="       " style="background-color: '.$fabtabrand.';" disabled></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(bordercolor)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Zellen-Hintergrundfarbe</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="zmeintra" size="7" value="'.$zmeintrag.'" onChange="newcolor(this.form.colorzmeintrag,this.value)">&nbsp;&nbsp;<input type="button" name="colorzmeintrag" value="       " style="background-color: '.$zmeintrag.';" disabled></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(cellbgcolor)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Überschrifts-Hintergrundfarbe</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="zmube" size="7" value="'.$zmuber.'" onChange="newcolor(this.form.colorzmuber,this.value)">&nbsp;&nbsp;<input type="button" name="colorzmuber" value="       " style="background-color: '.$zmuber.';" disabled></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(cellucolor)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>1. Eintrags-Hintergrundfarbe</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="zmeintral" size="7" value="'.$zmeintragl.'" onChange="newcolor(this.form.colorzmeintragl,this.value)">&nbsp;&nbsp;<input type="button" name="colorzmeintragl" value="       " style="background-color: '.$zmeintragl.';" disabled></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(entrybgcol1)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>2. Eintrags-Hintergrundfarbe</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="zmeintrar" size="7" value="'.$zmeintragr.'" onChange="newcolor(this.form.colorzmeintragr,this.value)">&nbsp;&nbsp;<input type="button" name="colorzmeintragr" value="       " style="background-color: '.$zmeintragr.';" disabled></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(entrybgcol2)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Zellenhintergrund bei Seitenlinks</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="text" name="zmweite" size="7" value="'.$zmweiter.'" onChange="newcolor(this.form.colorzmweiter,this.value)">&nbsp;&nbsp;<input type="button" name="colorzmweiter" value="       " style="background-color: '.$zmweiter.';" disabled></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(cellbgcolw)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td colspan="3" bgcolor="#D6DFF7" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;Sonstiges</font></b></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Includes verwenden</b></td>
        <td bgcolor="#FFFFFF" width="350">'.$hatch4.'</td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(includes)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>GZIP aktivieren</b></td>
        <td bgcolor="#FFFFFF" width="350">'.$gzipi.'</td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(gzip)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" colspan="3" valign="middle" align="center"><input type="reset" value="zurücksetzen"> <input type="submit" value="  speichern  "></td>
      </tr>
    </center>
  </table>
</div>
</form>';
cpyr();
print "</body>\n</html>";
}

if($action == "status"){
print '<html>
<head>
<title>Gästebuchstatus bearbeiten</title>
<link rel="stylesheet" href="style.css">
<script language="JavaScript" src="popuphilfe.js"></script>
</head>
<body>
<center><font size="5">Gästebuchstatus bearbeiten</font><br><br><br></center>
<form action="'.$PHP_SELF.'?action=speichern4&pwd='.$pass.'&nemo='.$nemo.'" method="post">
<input type="hidden" value="'.$pass.'" name="pw">
<div align="center">
  <center>
    <table border="0" cellpadding="3" cellspacing="1" width="600" bgcolor="#46A0E3">
      <tr>
        <td colspan="3" bgcolor="#D6DFF7" valign="top" align="left"><b><font color="#215DC6">&#187;&nbsp;Gästebuchstatus bearbeiten</font></b></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Status</b></td>
        <td bgcolor="#FFFFFF" width="350">'.$gbstat.'</td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(gbstat)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Offlinetext</b></td>
        <td bgcolor="#FFFFFF" width="350"><textarea rows="7" name="offlinetxt" cols="60" wrap="virtual">'.$offlinetext.'</textarea></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(offlinetext)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" colspan="3" valign="middle" align="center"><input type="reset" value="zurücksetzen"> <input type="submit" value="  speichern  "></td>
      </tr>
    </table>
  </center>
</div>
</form>';
cpyr();
print "</body>\n</html>";
}

if($action == "passwort"){
print '<html>
<head>
<title>Benutzerdaten ändern</title>
<link rel="stylesheet" href="style.css">
<script language="JavaScript" src="popuphilfe.js"></script>
</head>
<body>
<center><font size="5">Benutzerdaten ändern</font><br><br><br></center>
<form action="'.$PHP_SELF.'?action=newuserdats&pwd='.$pass.'&nemo='.$nemo.'" method="post">
<input type="hidden" value="'.$pass.'" name="pw">
<div align="center">
  <center>
    <table border="0" cellpadding="3" cellspacing="1" width="600" bgcolor="#46A0E3">
      <tr>
        <td colspan="3" bgcolor="#D6DFF7" valign="top" align="left"><b><font color="#215DC6">&#187;&nbsp;Benutzerdaten</font></b></td>
      </tr>
      <tr>
         <td width="230" bgcolor="#FFFFFF"><b>Benutzername</b></td>
         <td bgcolor="#FFFFFF" width="350"><input type="text" name="nemfiz" value="'.$wamd5.'" size="30"></td>
         <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(username)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Passwort</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="password" name="passwd1" value="'.$wumd5.'" size="30"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(password1)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td width="230" bgcolor="#FFFFFF"><b>Wiederholung</b></td>
        <td bgcolor="#FFFFFF" width="350"><input type="password" name="passwd2" value="'.$wumd5.'" size="30"></td>
        <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(password2)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" colspan="3" valign="middle" align="center"><input type="reset" value="zurücksetzen"> <input type="submit" value="  speichern  "></td></tr>
     </table>
  </center>
</div>
</form>';
cpyr();
print "</body>\n</html>";
}

if($action == "mailvorlagen"){
print '<html>
<head>
<title>Mailtemplates bearbeiten</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<p align="center"><font size="5">Mailtemplates bearbeiten</font></p>
<p align="center">&nbsp;</p>
<form method="POST" action="'.$PHP_SELF.'?action=tpledit&nemo='.$nemo.'&pwd='.$pwd.'">
<div align="center">
  <center>
    <table border="0" cellpadding="2" cellspacing="1" width="600" bgcolor="#46A0E3">
      <tr>
        <td bgcolor="#D6DFF7" width="100%" colspan="2" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;Vorlage auswählen</font></b></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" width="230">Vorlage</td>
        <td bgcolor="#FFFFFF" width="370"><p align="center"><select size="1" name="tmpl">
          <option value="dankm">Dankes E-Mail</option>
          <option value="benachm">Benachrichtigungs E-Mail</option>
        </select></p>
        </td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" width="100%" colspan="2" align="center"><input type="submit" value="bearbeiten"></td>
      </tr>
    </table>
  </center>
</div>
</form>';
cpyr();
print "</body>\n</html>";
}

if($action == "smilies"){
print '<html>
<head>
<title>Smilies bearbeiten</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<p align="center"><font size="5">Smilies bearbeiten</font></p>
<p align="center">&nbsp;</p>
<p align="center">Bitte nur 6-14 wichtige Smilies! Aktuell: '.$insgwichtig.'.</p>
<form action="'.$PHP_SELF.'?action=editsmil&pwd='.$pwd.'&nemo='.$nemo.'" method="post">
<div align="center">
  <center>
  <table border="0" cellspacing="1" width="600" cellpadding="2" bgcolor="#46A0E3">
    <tr>
      <td bgcolor="#D6DFF7" width="25%"><b><font color="#215DC6">Nummer (wichtig)</font></b></td>
      <td bgcolor="#D6DFF7" width="25%"><b><font color="#215DC6">Bild</font></b></td>
      <td bgcolor="#D6DFF7" width="25%"><b><font color="#215DC6">Bildname</font></b></td>
      <td bgcolor="#D6DFF7" width="25%"><b><font color="#215DC6">Ersetzung</font></b></td>
    </tr>';
$sfile = fopen('../include/smilies.inc.php','r');
while (!feof($sfile)){
$sline = fgets($sfile,999999);
$sline = trim($sline);
$stext = explode("|",$sline);
$snumb = "$stext[0]";
$swich = "$stext[1]";
$serse = "$stext[2]";
$sbild = "$stext[3]";
$saltt = "$stext[4]";
if($stext[1] == "0"){ $wichtigk = "Nein"; }
if($stext[1] == "1"){ $wichtigk = "Ja"; }
if($smilinsg != "0"){
print '
    <tr>
      <td bgcolor="#FFFFFF" width="25%"><input type="radio" name="smilnummer" value="'.$snumb.'" class="check">&nbsp;#'.$snumb.' ('.$wichtigk.')</td>
      <td bgcolor="#FFFFFF" width="25%"><img src="../images/smilies/'.$sbild.'" alt="'.$saltt.'"></td>
      <td bgcolor="#FFFFFF" width="25%">'.$sbild.'</td>
      <td bgcolor="#FFFFFF" width="25%">'.$serse.'</td>
    </tr>
';
}
}
if($smilinsg == "0"){
print '    <tr>
      <td bgcolor="#FFFFFF" colspan="4" align="center">Keine Smilies vorhanden</td>
    </tr>';
}
if($smilinsg != "0"){
print'
    <tr>
      <td bgcolor="#FFFFFF" colspan="4">
<div align="left">
  <table border="0" cellpadding="2" cellspacing="1">
    <tr>
      <td><input type="submit" value="löschen" name="type"></td>
      <td><input type="submit" value="bearbeiten" name="type"></td>
      <td><input type="submit" value="Neuen Smilie hinzufügen" name="type"></td>
    </tr>
  </table>
</div>
      </td>';
}
print '    </tr>
  </table>
  </center>
</div>
</form>';
cpyr();
print "</body>\n</html>";
}

if($action == "editsmil"){

        if($smilnummer != ""){
    if($type == "löschen"){
print '<html>
<head>
<title>Smilie löschen</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<p align="center"><font size="5">Smilie löschen</font></p>
<p align="center">&nbsp;</p>
<div align="center">
  <center>
  <table border="0" cellpadding="2" cellspacing="1" width="600" bgcolor="#46A0E3">
    <tr>
      <td bgcolor="#D6DFF7" width="100%" align="left"><p align="left"><b><font color="#215DC6">&#187;&nbsp;Smilie #'.$smilnummer.' löschen</font></b></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="100%">
<div align="center">
  <center>
<br>Soll der Smilie #'.$smilnummer.' wirklich gelöscht werden?<br>
  <table border="0" cellpadding="2" cellspacing="1">
    <tr>
      <td><form action="'.$PHP_SELF.'?action=delsmil&pwd='.$pwd.'&nemo='.$nemo.'" method="post"><input type="hidden" name="smilnummer" value="'.$smilnummer.'"><input type="submit" value="     Ja     "></form></td>
      <td><FORM><INPUT TYPE=BUTTON VALUE="    Nein    " onClick="history.go(-1)"></FORM></td>
    </tr>
  </table>
  </center>
</div></td>
    </tr>
  </table>
  </center>
</div>';
cpyr();
print "</body>\n</html>";
    }
    if($type == "bearbeiten"){
$linie = file("../include/smilies.inc.php");
for($num = 0; $num < count($linie); $num++)
{
$bfile = explode("|",$linie[$num]);
if ($bfile[0] == $smilnummer)
{
$smilnum = "$bfile[0]";
$wichti = "$bfile[1]";
$erset = "$bfile[2]";
$picnam = "$bfile[3]";
$alt = "$bfile[4]";
}
}
if($wichti == "1"){ $plui = '<select size="1" name="wichti"><option selected value="1">Ja</option><option value="0">Nein</option></select>'; }
if($wichti == "0"){ $plui = '<select size="1" name="wichti"><option value="1">Ja</option><option selected value="0">Nein</option></select>'; }
if($wichti == ""){ $plui = '<select size="1" name="wichti"><option selected></option><option value="1">Ja</option><option value="0">Nein</option></select>'; }
print '<html>
<head>
<title>Smilie bearbeiten</title>
<link rel="stylesheet" href="style.css">
<script language="JavaScript" src="popuphilfe.js"></script>
</head>
<body>
<p align="center"><font size="5">Smilie bearbeiten</font></p>
<p align="center">&nbsp;</p>
<form action="'.$PHP_SELF.'?action=savesmiled&pwd='.$pwd.'&nemo='.$nemo.'" method="post">
<input type="hidden" name="smilnummer" value="'.$smilnummer.'">
<div align="center">
  <center>
  <table border="0" cellpadding="2" cellspacing="1" width="600" bgcolor="#46A0E3">
    <tr>
      <td bgcolor="#D6DFF7" colspan="3" width="100%" align="left"><p align="left"><b><font color="#215DC6">&#187;&nbsp;Smilie #'.$smilnummer.' bearbeiten</font></b></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230">Bildname</td>
      <td bgcolor="#FFFFFF" width="350"><input type="text" name="bildnam" size="30" value="'.$picnam.'" onChange="newpic(this.form.ssmilie,this.value)">&nbsp;&nbsp;<input type="button" name="ssmilie" title="'.$alt.'" style="background:url(../images/smilies/'.$picnam.'); border-left-width:0px; border-top-width:0px; border-right-width:0px; border-bottom-width:0px; background-repeat:no-repeat; width:16px; height:16px;"></td>
      <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(smilpic)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230">Ersetzung</td>
      <td bgcolor="#FFFFFF" width="350"><input type="text" name="ersetz" size="30" value="'.$erset.'"></td>
      <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(smilers)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230">Beschreibung</td>
      <td bgcolor="#FFFFFF" width="350"><input type="text" name="beschreib" size="30" value="'.$alt.'" onChange="newalt(this.form.ssmilie,this.value)"></td>
      <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(smilbesch)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230">Wichtig</td>
      <td bgcolor="#FFFFFF" width="350">'.$plui.'</td>
      <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(smilwich)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" colspan="3" width="100%" align="center"><input type="reset" value="zurücksetzen"> <input type="submit" value="  speichern  "></td>
    </tr>
  </table>
  </center>
</div>
</form>';
cpyr();
print "</body>\n</html>";
    }
         }
         if($type == "Neuen Smilie hinzufügen"){ $smilnummer = "0"; }
         if($smilnummer == ""){
             print '<html>
<head>
<title>Fehler</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<p align="center"><font size="5">Fehler</font></p>
<p align="center">&nbsp;</p>
<p align="center">Sie müssen einen Smilie auswählen!<br>Klicken Sie <a href="javascript:history.go(-1)" target="_self">hier</a>, um zur vorherigen Seite zurückzugelangen.</p>';
cpyr();
print "</body>\n</html>";
         }
}
         if($type == "Neuen Smilie hinzufügen"){
print '<html>
<head>
<title>Smilie hinzufügen</title>
<link rel="stylesheet" href="style.css">
<script language="JavaScript" src="popuphilfe.js"></script>
</head>
<body>
<p align="center"><font size="5">Smilie hinzufügen</font></p>
<p align="center">&nbsp;</p>
<form action="'.$PHP_SELF.'?action=savenewsmile&pwd='.$pwd.'&nemo='.$nemo.'" method="post">
<div align="center">
  <center>
  <table border="0" cellpadding="2" cellspacing="1" width="600" bgcolor="#46A0E3">
    <tr>
      <td bgcolor="#D6DFF7" colspan="3" width="100%" align="left"><p align="left"><b><font color="#215DC6">&#187;&nbsp;Neuen Smilie hinzufügen</font></b></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230">Bildname</td>
      <td bgcolor="#FFFFFF" width="350"><input type="text" name="bildnam" size="30" value="'.$picnam.'" onChange="newpic(this.form.ssmilie,this.value)">&nbsp;&nbsp;<input type="button" name="ssmilie" title="'.$alt.'" style="background:url(../images/smilies/'.$picnam.'); border-left-width:0px; border-top-width:0px; border-right-width:0px; border-bottom-width:0px; background-repeat:no-repeat; width:16px; height:16px;"></td>
      <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(smilpic)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230">Ersetzung</td>
      <td bgcolor="#FFFFFF" width="350"><input type="text" name="ersetz" size="30" value="'.$erset.'"></td>
      <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(smilers)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230">Beschreibung</td>
      <td bgcolor="#FFFFFF" width="350"><input type="text" name="beschreib" size="30" value="'.$alt.'" onChange="newalt(this.form.ssmilie,this.value)"></td>
      <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(smilbesch)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" width="230">Wichtig</td>
      <td bgcolor="#FFFFFF" width="350"><select size="1" name="wichti"><option selected></option><option value="1">Ja</option><option value="0">Nein</option></select></td>
      <td bgcolor="#FFFFFF" width="20" align="center"><a href="javascript:hilfe(smilwich)"><img src="images/hilfe.gif" height="13" width="13" border="0" alt="Hilfe"></a></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" colspan="3" width="100%" align="center"><input type="reset" value="zurücksetzen"> <input type="submit" value="  speichern  "></td>
    </tr>
  </table>
  </center>
</div>
</form>';
cpyr();
print "</body>\n</html>";
         }
if($action == "savenewsmile"){
$fp = fopen("../include/smilies.inc.php","r");
while (!feof($fp)){
$alt = fread ($fp,999999);
}
fclose($fp);
$sfile = fopen('../include/smilies.inc.php','r');
$sline = fgets($sfile,999999);
$sline = trim($sline);
$stext = explode("|",$sline);
$firstnum = ("$stext[0]"+"1");
$neu = "$firstnum|$wichti|$ersetz|$bildnam|$beschreib";
$sdatas = "$neu\n$alt";
$filer = fopen("../include/smilies.inc.php","wb+");
fputs($filer,$sdatas);
fclose($filer);
print '<head>
<title>Der Smilie wurde erfolgreich gelöscht! Wir leiten Sie jetzt zur Übersicht weiter, bitte warten Sie zwei Sekunden.</title>
<meta http-equiv="Refresh" content="2; URL='.$PHP_SELF.'?action=smilies&nemo='.$nemo.'&pwd='.$pwd.'">
<link rel="stylesheet" href="style.css">
<style>
.text {font-weight: bold;}
</style>
</head>
<body>
<FONT SIZE="2"><B>Der Smilie wurde erfolgreich hinzugefügt! Wir leiten Sie jetzt zur Übersicht weiter, bitte warten Sie zwei Sekunden.</B></font>
<p><A HREF="'.$PHP_SELF.'?action=smilies&nemo='.$nemo.'&pwd='.$pwd.'"><B><FONT SIZE="1">Klicken Sie hier, wenn Sie nicht länger warten möchten oder Ihr Browser keine automatische Weiterleitung unterstützt.</FONT></B></A>
<br><br>
</body>';
}

if($action == "delsmil"){
$linie = file("../include/smilies.inc.php");
$data ="";
$delete ="0";
for($num = 0; $num < count($linie); $num++)
{
$bfile = explode("|",$linie[$num]);
if ($bfile[0] == $smilnummer)
{
$delete = "1";
print '<head>
<title>Der Smilie wurde erfolgreich gelöscht! Wir leiten Sie jetzt zur Übersicht weiter, bitte warten Sie zwei Sekunden.</title>
<meta http-equiv="Refresh" content="2; URL='.$PHP_SELF.'?action=smilies&nemo='.$nemo.'&pwd='.$pwd.'">
<link rel="stylesheet" href="style.css">
<style>
.text {font-weight: bold;}
</style>
</head>
<body>
<FONT SIZE="2"><B>Der Smilie wurde erfolgreich gelöscht! Wir leiten Sie jetzt zur Übersicht weiter, bitte warten Sie zwei Sekunden.</B></font>
<p><A HREF="'.$PHP_SELF.'?action=smilies&nemo='.$nemo.'&pwd='.$pwd.'"><B><FONT SIZE="1">Klicken Sie hier, wenn Sie nicht länger warten möchten oder Ihr Browser keine automatische Weiterleitung unterstützt.</FONT></B></A>
<br><br>
</body>';
}
if($delete == "1")
{
$data.="";
$delete="0";
}
else
{
$data.="$bfile[0]|$bfile[1]|$bfile[2]|$bfile[3]|$bfile[4]";
}
}
$datar = rtrim($data);
$filer = fopen("../include/smilies.inc.php","wb+");
fputs($filer,$datar);
fclose($filer);
}

if($action == "savesmiled"){
$linie = file("../include/smilies.inc.php");
$data ="";
$delete ="0";
for($num = 0; $num < count($linie); $num++)
{
$bfile = explode("|",$linie[$num]);
if ($bfile[0] == $smilnummer)
{
$delete = "1";
print '<head>
<title>Der Smilie wurde erfolgreich gelöscht! Wir leiten Sie jetzt zur Übersicht weiter, bitte warten Sie zwei Sekunden.</title>
<meta http-equiv="Refresh" content="2; URL='.$PHP_SELF.'?action=smilies&nemo='.$nemo.'&pwd='.$pwd.'">
<link rel="stylesheet" href="style.css">
<style>
.text {font-weight: bold;}
</style>
</head>
<body>
<FONT SIZE="2"><B>Der Smilie wurde erfolgreich bearbeitet! Wir leiten Sie jetzt zur Übersicht weiter, bitte warten Sie zwei Sekunden.</B></font>
<p><A HREF="'.$PHP_SELF.'?action=smilies&nemo='.$nemo.'&pwd='.$pwd.'"><B><FONT SIZE="1">Klicken Sie hier, wenn Sie nicht länger warten möchten oder Ihr Browser keine automatische Weiterleitung unterstützt.</FONT></B></A>
<br><br>
</body>';
}
if($delete==1)
{
if($smilnummer != "1"){
$data.="$bfile[0]|$wichti|$ersetz|$bildnam|$beschreib\n";
}
if($smilnummer == "1"){
$data.="$bfile[0]|$wichti|$ersetz|$bildnam|$beschreib";
}
$delete="0";
}
else
{
$data.="$bfile[0]|$bfile[1]|$bfile[2]|$bfile[3]|$bfile[4]";
}
}
$datar = rtrim($data);
$filer = fopen("../include/smilies.inc.php","wb+");
fputs($filer,$datar);
fclose($filer);
}

if($action == "tpledit"){
$dankm = str_replace("\\$", "\$", $dankm);
$benachm = str_replace("\\$", "\$", $benachm);
if($tmpl == "dankm"){ $tmplname = "Dankes E-Mail"; }
if($tmpl == "benachm"){ $tmplname = "Benachrichtigungs E-Mail"; }
print '<html>
<head>
<title>Mailtemplates bearbeiten</title>
<link rel="stylesheet" href="style.css">
<script language="JavaScript" src="popuphilfe.js"></script>
<script language="JavaScript">
function insert() {
if (( navigator.userAgent.indexOf("Opera" ) != -1) || ( navigator.userAgent.indexOf("Netscape" ) != -1)) {
text_before = document.mailtmplform.newtext.value;
text_after = "";
} else {
document.mailtmplform.newtext.focus();
var sel = document.selection.createRange();
sel.collapse();
var sel_before = sel.duplicate();
var sel_after = sel.duplicate();
sel.moveToElementText(document.mailtmplform.newtext);
sel_before.setEndPoint("StartToStart",sel);
sel_after.setEndPoint("EndToEnd",sel);
text_before = sel_before.text;
text_after = sel_after.text;
}
}
function setmailcode(code) {
insert();
document.mailtmplform.newtext.value = text_before + code + text_after;
document.mailtmplform.newtext.focus();
}
</script>
</head>
<body>
<p align="center"><font size="5">Mailtemplates bearbeiten</font></p>
<p align="center">&nbsp;</p>
<form method="POST" action="'.$PHP_SELF.'?action=savetpl&nemo='.$nemo.'&pwd='.$pwd.'" name="mailtmplform">
<input type="hidden" name="tmpl" value="'.$tmpl.'">
<div align="center">
  <center>
  <table border="0" cellpadding="5" cellspacing="1" width="600" bgcolor="#46A0E3">
    <tr>
      <td bgcolor="#D6DFF7" valign="middle" align="left"><b><font color="#215DC6">&#187;&nbsp;'.$tmplname.' bearbeiten</font></b></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" valign="middle" align="left"><select size="1" onChange="setmailcode(value)">
<option selected>VARIABLEN</option>
<option value="$name">Name</option>
<option value="$mail">E-Mail</option>
<option value="$url">Homepage</option>
<option value="$icq">ICQ UIN</option>
<option value="$ip">IP-Nummer</option>
<option value="$kommentar">Kommentar</option>
<option value="$deinname">Adminname</option>
<option value="$homepage">Link 1 (Allg. Einst.)</option>
</select>
<select size="1" onChange="setmailcode(value)">
<option selected>SIZE</option>
<option value="<font size=\'1\'></font>">1 (8pt)</option>
<option value="<font size=\'2\'></font>">2 (10pt)</option>
<option value="<font size=\'3\'></font>">3 (12pt)</option>
<option value="<font size=\'4\'></font>">4 (14pt)</option>
<option value="<font size=\'5\'></font>">5 (18pt)</option>
<option value="<font size=\'6\'></font>">6 (24pt)</option>
<option value="<font size=\'7\'></font>">7 (36pt)</option>
</select>
<select size="1" onChange="setmailcode(value)">
<option selected>FONT</option>
<option value="<font face=\'Arial\'></font>">Arial</option>
<option value="<font face=\'Courier\'></font>">Courier</option>
<option value="<font face=\'Courier\'></font>">Courier New</option>
<option value="<font face=\'Helvetica\'></font>">Helvetica</option>
<option value="<font face=\'Tahoma\'></font>">Tahoma</option>
<option value="<font face=\'Times New Roman\'></font>">Times New Roman</option>
<option value="<font face=\'Verdana\'></font>">Verdana</option>
</select>
<select size="1" onChange="setmailcode(value)">
<option selected>COLOR</option>
<option value="<font color=\'skyblue\'></font>" style="color:skyblue;">sky blue</option>
<option value="<font color=\'royalblue\'></font>" style="color:royalblue;">royal blue</option>
<option value="<font color=\'blue\'></font>" style="color:blue;">blue</option>
<option value="<font color=\'darkblue\'></font>" style="color:darkblue;">dark-blue</option>
<option value="<font color=\'orange\'></font>" style="color:orange;">orange</option>
<option value="<font color=\'orangered\'></font>" style="color:orangered;">orange-red</option>
<option value="<font color=\'crimson\'></font>" style="color:crimson;">crimson</option>
<option value="<font color=\'red\'></font>" style="color:red;">red</option>
<option value="<font color=\'firebrick\'></font>" style="color:firebrick;">firebrick</option>
<option value="<font color=\'darkred\'></font>" style="color:darkred;">dark red</option>
<option value="<font color=\'green\'></font>" style="color:green;">green</option>
<option value="<font color=\'limegreen\'></font>" style="color:limegreen;">limegreen</option>
<option value="<font color=\'seagreen\'></font>" style="color:seagreen;">sea-green</option>
<option value="<font color=\'deeppink\'></font>" style="color:deeppink;">deeppink</option>
<option value="<font color=\'tomato\'></font>" style="color:tomato;">tomato</option>
<option value="<font color=\'coral\'></font>" style="color:coral;">coral</option>
<option value="<font color=\'purple\'></font>" style="color:purple;">purple</option>
<option value="<font color=\'indigo\'></font>" style="color:indigo;">indigo</option>
<option value="<font color=\'burlywood\'></font>" style="color:burlywood;">burlywood</option>
<option value="<font color=\'sandybrown\'></font>" style="color:sandybrown;">sandy brown</option>
<option value="<font color=\'sienna\'></font>" style="color:sienna;">sienna</option>
<option value="<font color=\'chocolate\'></font>" style="color:chocolate;">chocolate</option>
<option value="<font color=\'teal\'></font>" style="color:teal;">teal</option>
<option value="<font color=\'silver\'></font>" style="color:silver;">silver</option></select>
</select>
<select size="1" onChange="setmailcode(value)">
<option selected>SONSTIGES</option>
<option value="<b></b>">fett</option>
<option value="<i></i>">kursiv</option>
<option value="<u></u>">unterstrichen</option>
<option value="<a href=\'http://\'></a>">Hyperlink</option>
<option value="<a href=\'mailto:\'></a>">E-Mail</option>
<option value="<img src=\'\'>">Bild</option>
</select>
</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" valign="middle" align="center">
        <p align="center"><textarea rows="16" name="newtext" cols="112" wrap="off">';
if($tmpl == "dankm"){ print ''.$dankm.''; }
if($tmpl == "benachm"){ print ''.$benachm.''; }
print '</textarea><br><font size="1">Achtung: Hier funktionieren keine GB-Codes! HTML-Code kann aber ohne Einschränkungen genutzt werden.</font></td>
    </tr>
  </center>
    <tr>
      <td bgcolor="#FFFFFF" align="center"><input type="reset" value="zurücksetzen"> <input type="submit" value="  speichern  "></td>
    </tr>
  </table>
</div>
</form>';
cpyr();
print "</body>\n</html>";
}

if($action == "savetpl"){
$dat = fopen("../include/mailtmpl.inc.php","wb");
$newtext = str_replace("\\", "", $newtext);
$newtext = str_replace("\r\n", "\\n", $newtext);
$newtext = str_replace("\n", "\\n", $newtext);
$dankm = str_replace("\\", "", $dankm);
$dankm = str_replace("\r\n", "\\n", $dankm);
$dankm = str_replace("\n", "\\n", $dankm);
$benachm = str_replace("\\", "", $benachm);
$benachm = str_replace("\r\n", "\\n", $benachm);
$benachm = str_replace("\n", "\\n", $benachm);
if($tmpl == "dankm"){ $benachm = str_replace("\$", "\\$", $benachm); }
if($tmpl == "benachm"){ $dankm = str_replace("\$", "\\$", $dankm); }
$newtext = str_replace("\$", "\\$", $newtext);
if($tmpl == "benachm"){
fwrite($dat,'<?php
$benachm = "'.$newtext.'";
$dankm = "'.$dankm.'";
?>');
}
if($tmpl == "dankm"){
fwrite($dat,'<?php
$benachm = "'.$benachm.'";
$dankm = "'.$newtext.'";
?>');
}
fclose($dat);
print '<head>
<title>Einstellungen Gespeichert</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>Template gespeichert!<br><br><a href="'.$PHP_SELF.'?action=tpledit&pwd='.$pwd.'&nemo='.$nemo.'">Zurück zu den Mailtemplates</a><br><a href="'.$PHP_SELF.'?action=main&pwd='.$pwd.'&nemo='.$nemo.'">Zurück zur Administration</a><br><a href="../gb.php" target="_top">Zum Gästebuch</a><br></div>
</body>';
}

if($action == "newuserdats"){
        if($passwd1 == "$passwd2"){
$dat = fopen("../include/userdaten.inc.php","wb");
fwrite ($dat, '<?php
$username = md5("'.$nemfiz.'");
$wamd5 = "'.$nemfiz.'";
$pass = md5("'.$passwd1.'");
$wumd5 = "'.$passwd1.'";
?>');
fclose($dat);
print '<head>
<title>Einstellungen Gespeichert</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>Die Daten wurden gespeichert!<br>Falls Sie Ihre Benutzerdaten geändert haben,<br>loggen Sie sich jetzt bitte aus und wieder neu ein!<br><br><a href="'.$PHP_SELF.'?action=passwort&pwd='.md5($passwd1).'&nemo='.md5($nemfiz).'">Zurück zu den Benutzerdaten</a><br><a href="'.$PHP_SELF.'?action=main&pwd='.md5($passwd1).'&nemo='.md5($nemfiz).'">Zurück zur Administration</a><br><a href="../gb.php" target="_top">Zum Gästebuch</a><br></div>
</body>';
        }
        if($passwd1 != "$passwd2"){
print '<head>
<title>Einstellungen Gespeichert</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>Die beiden Passwörter stimmen nicht überein!<br>Klicken Sie <a href="javascript:history.go(-1)" target="_self">hier</a>, um zur vorherigen Seite zurückzugelangen.<br></div>
</body>';
        }
}

if($action == "speichern1"){
$tite = str_replace("|", "&#124", $tite);
$begrues = str_replace("|", "&#124", $begrues);
$hed = str_replace("|", "&#124", $hed);
$bod = str_replace("|", "&#124", $bod);
$tite = str_replace("\\", "", $tite);
$hed = str_replace("\\", "", $hed);
$begrues = str_replace("\\", "", $begrues);
$bod = str_replace("\\", "", $bod);
$tite = str_replace("'", "&#39;", $tite);
$hed = str_replace("'", "&#39;", $hed);
$begrues = str_replace("'", "&#39;", $begrues);
$bod = str_replace("'", "&#39;", $bod);
$dat = fopen("../include/config1.inc.php","wb");
fwrite ($dat, '<?php
$titel="'.$gbnam.'";
$picurl="'.$tite.'";
$gbttyp="'.$ubertyp.'";
$offset="'.$off.'";
$zeitzone="'.$timez.'";
$begruesungstxt="'.$begrues.'";
$benachr="'.$benach.'";
$danke="'.$dank.'";
$email="'.$mail.'";
$homepage="'.$home.'";
$homepagetarget="'.$hometarget.'";
$homepaget="'.$homet.'";
$homepage1="'.$home1.'";
$homepage1target="'.$home1target.'";
$homepaget1="'.$homet1.'";
$eintragps="'.$eintraps.'";
$head="'.$hed.'";
$body="'.$bod.'";
$indcss="'.$indicss.'";
$begruescenter="'.$begruescente.'";
?>');
fclose($dat);
print '<head>
<title>Einstellungen Gespeichert</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>Die Daten wurden gespeichert!<br><br><a href="'.$PHP_SELF.'?action=allgemein&pwd='.$pwd.'&nemo='.$nemo.'">Zurück zu den allgemeinen Einstellungen</a><br><a href="'.$PHP_SELF.'?action=main&pwd='.$pwd.'&nemo='.$nemo.'">Zurück zur Administration</a><br><a href="../gb.php" target="_top">Zum Gästebuch</a><br></div>
</body>';
}

if($action == "speichern2"){
if($linkunder == "ja"){ $rtc1 = "underline"; }
if($alinkunder == "ja"){ $rtc2 = " underline"; }
if($vlinkunder == "ja"){ $rtc3 = "underline"; }
if($hoverunder == "ja"){ $rtc4 = "underline"; }
if($linkunder == ""){ $rtc1 = "none"; }
if($alinkunder == ""){ $rtc2 = " none"; }
if($vlinkunder == ""){ $rtc3 = "none"; }
if($hoverunder == ""){ $rtc4 = "none"; }
$cssinsg = "<style type=\"text/css\">
textarea, input, option, select { background-color: $csscol; color: $csstxt; font-family: $cssff; font-size: $cssgro" . "pt; }
A:link    { text-decoration: $rtc1; color: $lin }
A:active  { text-decoration: $rtc2; color: $alin }
A:visited { text-decoration: $rtc3; color: $vlin }
A:hover   { text-decoration: $rtc4; color: $hlin }
.nix      { background-color: $zmeintra; color: $csstxt; font-family: $cssff; font-size: $cssgro" . "pt; }
body      { scrollbar-base-color: $scrollcol; }
\$indcss
</style>";
$dat = fopen("../include/config2.inc.php","wb");
fwrite ($dat, '<?php
$gzipit="'.$gzipt.'";
$bgcolor="'.$bgcolo.'";
$background="'.$backgroun.'";
$bgfixed="'.$bgfixe.'";
$link="'.$lin.'";
$alink="'.$alin.'";
$cssfontf="'.$cssff.'";
$csscolor="'.$csscol.'";
$csstext="'.$csstxt.'";
$cssgrose="'.$cssgro.'";
$vlink="'.$vlin.'";
$hlink="'.$hlin.'";
$css=\''.$cssinsg.'\';
$scrollcol="'.$scrollcolo.'";
$sart="'.$sar.'";
$tbreite="'.$tbreit.'";
$zmeintragl="'.$zmeintral.'";
$zmeintragr="'.$zmeintrar.'";
$zmeintrag="'.$zmeintra.'";
$fabtabrand="'.$fabtabran.'";
$zmuber="'.$zmube.'";
$breitesmn="'.$breitesm.'";
$textin="'.$txtin.'";
$textout="'.$txtout.'";
$kommfarb="'.$kofarb.'";
$cellpadding = "'.$tpadding.'";
$groseuber="'.$groseub.'";
$grosetext="'.$grosetxt.'";
$includev="'.$includ.'";
$zmweiter="'.$zmweite.'";
$linkunder="'.$linkunde.'";
$alinkunder="'.$alinkunde.'";
$vlinkunder="'.$vlinkunde.'";
$hoverunder="'.$hoverunde.'";
?>');
fclose($dat);
print '<head>
<title>Einstellungen Gespeichert</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>Die Daten wurden gespeichert!<br><br><a href="'.$PHP_SELF.'?action=darstellung&pwd='.$pwd.'&nemo='.$nemo.'">Zurück zu den Darstellungsoptionen</a><br><a href="'.$PHP_SELF.'?action=main&pwd='.$pwd.'&nemo='.$nemo.'">Zurück zur Administration</a><br><a href="../gb.php" target="_top">Zum Gästebuch</a><br></div>
</body>';
}

if($action == "speichern3"){
$word = str_replace("\\", "", $word);
$word = str_replace("'", "&#39;", $word);
$dat = fopen("../include/config3.inc.php","wb");
fwrite ($dat, '<?php
$aalink="'.$adminlink.'";
$htmlc="'.$htmlcode.'";
$gbc="'.$gbcode.'";
$flooding="'.$floodin.'";
$floodtime="'.$floodtim.'";
$words="'.$word.'";
$replaceword="'.$replacew.'";
$komlength="'.$kolength.'";
$namelength="'.$namlength.'";
$maillength="'.$mailength.'";
$urllength="'.$urlength.'";
$icqlength="'.$iclength.'";
$wordlength="'.$worlength.'";
?>');
fclose($dat);
print '<head>
<title>Einstellungen Gespeichert</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>Die Daten wurden gespeichert!<br><br><a href="'.$PHP_SELF.'?action=sicherheit&pwd='.$pwd.'&nemo='.$nemo.'">Zurück zu den Sicherheitsoptionen</a><br><a href="'.$PHP_SELF.'?action=main&pwd='.$pwd.'&nemo='.$nemo.'">Zurück zur Administration</a><br><a href="../gb.php" target="_top">Zum Gästebuch</a><br></div>
</body>';
}

if($action == "speichern4"){
$offlinetxt = str_replace("\\", "", $offlinetxt);
$offlinetxt = str_replace("'", "&#39;", $offlinetxt);
$dat = fopen("../include/online.inc.php","wb");
fwrite ($dat, '<?php
$online="'.$gbstatus.'";
$offlinetext="'.$offlinetxt.'";
?>');
fclose($dat);
print '<head>
<title>Einstellungen Gespeichert</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>Die Daten wurden gespeichert!<br><br><a href="'.$PHP_SELF.'?action=status&pwd='.$pwd.'&nemo='.$nemo.'">Zurück zum Gästebuchstatus</a><br><a href="'.$PHP_SELF.'?action=main&pwd='.$pwd.'&nemo='.$nemo.'">Zurück zur Administration</a><br><a href="../gb.php" target="_top">Zum Gästebuch</a><br></div>
</body>';
}
        }
?>