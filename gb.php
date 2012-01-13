<?php
// Revision: 1.11
// Name: gb.php

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
// Copyright (c) 2001-2012 by
// Daniel Köhler
///////////////////////////////////////////////////////////

include "./include/config1.inc.php";
include "./include/config2.inc.php";
include "./include/config3.inc.php";
include "./include/userdaten.inc.php";
include "./include/mailtmpl.inc.php";
include "./include/functions.inc.php";
include "./include/online.inc.php";
include "./include/config.inc.php";
if($gzipit == "ja"){ ob_start ("ob_gzhandler"); }
$tex = "$textout";
$linie = file("./include/eintraege.dat");
$insgesamt = count($linie);
$wds = "$words";
$npn = 6;
$css = $css . "\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
if(isset($HTTP_COOKIE_VARS["ungb3"])){ $setetc = $HTTP_COOKIE_VARS["ungb3"]; }
if(!isset($HTTP_COOKIE_VARS["ungb3"])){ $setetc = "nein"; }
$breite12 = ("$tbreite"-"$breitesmn");
$smil = file("./include/smilies.inc.php");
$smilinsg = count($smil);
if(!isset($eid)){ $eid = "0"; }
if(!isset($name)){ $name = ""; }
if(!isset($seite)){ $seite = "1"; }
if(!isset($smilnummer)){ $smilnummer = "0"; }
if(!isset($kurs)){ $kurs = ""; }
if(!isset($kurs1)){ $kurs1 = ""; }
if(!isset($kurs2)){ $kurs2 = ""; }
if(!isset($tempp)){ $tempp = "0"; }
$startgentime=microtime();
           if($online == "1"){
if($eintragps == ""){ $bps = "20"; }
if($eintragps != ""){ $bps = "$eintragps"; }
$temppp = ceil($insgesamt / $bps);
if ($seite < 1){ $seite = 1; }
if ($seite > $temppp){ $seite = $tempp; }
if(!isset($action)){ $action=""; }
$seiten = "";
if(!isset($seite)){ $seite = 1; }
if($action == ""){
if($temppp > 1){
$seiten = '<font face="'.$sart.'" color="'.$textin.'" size="1">Seite: ';
if($seite <> 1)
{
$tempxxl = $seite - 1;
$seiten .= '<font color="'.$textin.'" size="1">[<a href="'.$PHP_SELF.'?seite=1">&#171;</a>]&nbsp;[<a href="'.$PHP_SELF.'?seite='.$tempxxl.'">&#139;</a>]&nbsp;';
}
$npn ++;
if ($npn == 1)
{
$fpn = 1;
$lpn = $temppp;
} else {
$seite - floor($npn / 2) < 0 ? $fpn = 1 : $fpn = $seite - floor($npn / 2) + 1;
$seite + ceil($npn / 2) - 1 > $temppp ? $lpn = $temppp : $lpn = $seite + ceil($npn / 2) - 1;
}
for($i=$fpn;$i<=$lpn;$i++){
if($i <> $seite){
$seiten .= '<font color="'.$textin.'" size="1">[<a href="'.$PHP_SELF.'?seite='.$i.'">'.$i.'</a>]&nbsp;';
} else {
$seiten .= '<font color="'.$textin.'" size="1">('.$i.')&nbsp;';
}
}
if($seite <> $temppp){
$tempxxl = $seite + 1;
$seiten .= '<font color="'.$textin.'" size="1">[<a href="'.$PHP_SELF.'?seite='.$tempxxl.'">&#155;</a>]&nbsp;[<a href="'.$PHP_SELF.'?seite='.$temppp.'">&#187;</a>]';
}
$seiten .= '</font></font></font></font>';
}
$smalbps = $seite * $bps;
$firstots = $smalbps - $bps + 1;
$smalbps > $insgesamt ? $lastots = $insgesamt : $lastots = $smalbps;
if($background == ""){ $backgroundtag = ""; }
if($background != ""){ $backgroundtag = ' background="'.$background.'"'; }
header("Cache-Control: no-store, no-cache, must-revalidate");
print '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
'.$hcpyr.'
<html>
<head>
<title>'.$titel.'</title>';
echo "\n$head\n$css\n";
if($bgfixed == "fixed"){ $printbgfixed = ' bgproperties="fixed"'; }
print '</head>
<body bgcolor="'.$bgcolor.'"'.$backgroundtag.' text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'"'.$printbgfixed.'>';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
if($gbttyp == "0"){ $ungbn = ''; }
if($gbttyp == "1"){ $ungbn = "$titel"; }
if($gbttyp == "2"){ $ungbn = '<img src="'.$picurl.'" border="0">'; }
print ''.$body.'
<p align="center"><font color="'.$textout.'" size="'.$groseuber.'" face="'.$sart.'">'.$ungbn.'</font></p>
<p align="center">&nbsp;</p>
<p>';
if($begruescenter == "center"){ echo "<center>"; }
if($begruesungstxt != ""){ print '<font color="'.$textout.'" size="'.$grosetext.'" face="'.$sart.'">'.$begruesungstxt.'</font></p>'; }
print '<p><font color="'.$textout.'" size="'.$grosetext.'" face="'.$sart.'">Zum Eintragen <a href="'.$PHP_SELF.'?action=eintragen">hier</a> klicken.</font>';
if($begruescenter == "center"){ echo "</center>"; }
print '</p>
<div align="center">
  <center>
<table border="0" cellpadding="'.$cellpadding.'" cellspacing="1" width="'.$tbreite.'" bgcolor="'.$fabtabrand.'">';
if($insgesamt != "0"){ print '      <tr><td colspan="2" bgcolor="'.$zmweiter.'"><center><font color="'.$textin.'" size="'.$grosetext.'" face="'.$sart.'">Zeige Einträge <b>'.$firstots.'</b> bis <b>'.$lastots.'</b> von <b>'.$insgesamt.'</b></font></center></td></tr>'; }
if($insgesamt == "0"){ print '      <tr><td colspan="2" bgcolor="'.$zmweiter.'"><center><font color="'.$textin.'" size="'.$grosetext.'" face="'.$sart.'">Keine Einträge vorhanden</font></center></td></tr>'; }
if($seiten != ""){ print '      <tr><td colspan="2" bgcolor="'.$zmweiter.'"><p align="left">'.$seiten.'</td></tr>'; }
print '    <tr>
      <td width="'.$breitesmn.'" bgcolor="'.$zmuber.'"><font color="'.$textin.'" size="'.$grosetext.'" face="'.$sart.'"><b>Name</b></font></td>
      <td width="'.$breite12.'" bgcolor="'.$zmuber.'"><font color="'.$textin.'" size="'.$grosetext.'" face="'.$sart.'"><b>Kommentar</b></font></td>
    </tr>';
if($insgesamt == "0"){
print '
      <tr>
      <td bgcolor="'.$zmeintragl.'" valign="top" colspan="2" align="center" width="'.$tbreite.'"><font color="'.$textin.'" size="'.$grosetext.'" face="'.$sart.'"><br><br><b>+ + Noch keine Einträge vorhanden + +</b><br><br><br></font>
      </td></tr>';
}
$file = fopen("./include/eintraege.dat","r");
$numofe = 0;
while (!feof($file))
{
$numofe++;
$line = fgets($file,999999);
if(($numofe <= $seite * $bps) && ($numofe > ($seite - 1) * $bps))
{
$line = trim($line);
$mtext = explode("|",$line);
$nummer = $mtext[0];
$name = $mtext[1];
$datum = $mtext[2];
$icq = "<a href=http://wwp.icq.com/scripts/contact.dll?msgto=$mtext[3]><img height=18 width=18 border=0 src=http://wwp.icq.com/scripts/online.dll?icq=$mtext[3]&img=5></a>";
$mail = "<a href=mailto:$mtext[4]><img border=0 alt='"."$name"."s E-Mail Adresse' src=images/mail.gif></a>";
$url = "<a target=_blank href=$mtext[5]><img border=0 alt='"."$name"."s Homepage' src=images/www.gif></a>";
$ip = "$mtext[6]";
$kommentar = $mtext[7];
$kommentar = str_replace("<br>", "\n", $kommentar);
if ($icq == " <a href=http://wwp.icq.com/scripts/contact.dll?msgto=><img height=18 width=18 border=0 src=http://wwp.icq.com/scripts/online.dll?icq=&img=5></a>" || $icq == "<a href=http://wwp.icq.com/scripts/contact.dll?msgto=><img height=18 width=18 border=0 src=http://wwp.icq.com/scripts/online.dll?icq=&img=5></a>"){ $icq = ""; }
if ($mail == " <a href=mailto:><img border=0 alt='"."$name"."s E-Mail Adresse' src=images/mail.gif></a>" || $mail == "<a href=mailto:><img border=0 alt='"."$name"."s E-Mail Adresse' src=images/mail.gif></a>"){ $mail = ""; }
if ($url == "<a target=_blank href=http://><img border=0 alt='"."$name"."s Homepage' src=images/www.gif></a>" || $url == "<a target=_blank href=><img border=0 alt='"."$name"."s Homepage' src=images/www.gif></a>" || $url == " <a target=_blank href=><img border=0 alt='"."$name"."s Homepage' src=images/www.gif></a>" || $url == "<a target=_blank href= ><img border=0 alt='"."$name"."s Homepage' src=images/www.gif></a>"){ $url = ""; }
parsekommentar();
psmilies();
if(odd("$numofe")){ $eintrybgcol = "$zmeintragl"; }
if(even("$numofe")){ $eintrybgcol = "$zmeintragr"; }
$filer = fopen("./include/eintraege.dat","r");
$inhalt = fgets($filer,999999);
if($insgesamt != "0"){
print '
    <tr>
      <td width="'.$breitesmn.'" bgcolor="'.$eintrybgcol.'" valign="top"><font color="'.$textin.'" size="'.$grosetext.'" face="'.$sart.'"><b>'.$name.'</b></font><br>'.$mail.' '.$url.' '.$icq.' <a href="'.$PHP_SELF.'?action=viewip&name='.$name.'&eid='.$nummer.'"><img src="images/ip.gif" border="0" alt="'.$name.'s IP angucken"></a><br><br><br></td>
      <td valign="top" bgcolor="'.$eintrybgcol.'"><font color="'.$textin.'" size="1" face="'.$sart.'">'.$datum.'&nbsp;&nbsp;&nbsp;<a href="'.$PHP_SELF.'?action=delete&eid='.$nummer.'"><img src="images/delete.gif" border="0" alt="Eintrag löschen"></a>&nbsp;&nbsp;<a href="'.$PHP_SELF.'?action=comment&eid='.$nummer.'"><img src="images/reply.gif" border="0" alt="Kommentar hinzufügen"></a>&nbsp;&nbsp;<a href="'.$PHP_SELF.'?action=edit&eid='.$nummer.'"><img src="images/edit.gif" border="0" alt="Eintrag bearbeiten"></a></font><hr width="97%" size="1" color="'.$fabtabrand.'" style="color:'.$fabtabrand.'; height:1px; border:0px solid;" noshade><font color="'.$textin.'" size="'.$grosetext.'" face="'.$sart.'">'.$kommentar.'<br></font></td>
    </tr>';
flush();
}
}
}
if($seiten != ""){
echo "\n";
print '      <tr><td colspan="2" bgcolor="'.$zmweiter.'"><p align="left">'.$seiten.'</td></tr>';
}
if($aalink == "Ja"){
echo "\n";
print '      <tr><td colspan="2" bgcolor="'.$zmweiter.'"><font color="'.$textin.'"><a href="admin/index.php" target="_blank"><font size="1" color="'.$textin.'" face="'.$sart.'">Administration</font></a></font></td></tr>';
}
if($aalink == "Nein"){ print ''; }
print '</center>
  </table>
</div><br><br>';
if($homepaget == ""){ print '<center><font color="'.$textout.'" size="'.$grosetext.'" face="'.$sart.'"><a href="'.$homepage.'" target="'.$homepagetarget.'">'.$homepaget1.'</a></font></center>'; }
if($homepaget1 == ""){ print '<center><font color="'.$textout.'" size="'.$grosetext.'" face="'.$sart.'"><a href="'.$homepage1.'" target="'.$homepage1target.'">'.$homepaget.'</a></font></center>'; }
if($homepaget1 != "" && $homepaget != ""){ print '<center><font color="'.$textout.'" size="'.$grosetext.'" face="'.$sart.'"><a href="'.$homepage.'" target="'.$homepagetarget.'">'.$homepaget.'</a> | <a href="'.$homepage1.'" target="'.$homepage1target.'">'.$homepaget1.'</a></font></center>'; }
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>
</html>';
}
if($action == "eintragen"){
if(!isset($kommentar)){ $kommentar = ""; }
if(!isset($icq)){ $icq = ""; }
if(!isset($url)){ $url = ""; }
if(!isset($mail)){ $mail = ""; }
if(!isset($step)){ $step = "1"; }
$kommentar = str_replace("\\", "", $kommentar);
$kommentar = str_replace("\$", "&#36;", $kommentar);
$nkommentar = urldecode($kommentar);
$kommentar = urldecode($kommentar);

// security
$security_random=mt_rand(1000,9999);
$security_crypt=crypt($security_random);
$security_value=rawurlencode($security_crypt);

$key = "p2C9s+kA41o7Dq6a";
$td = mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_ECB, '');
$iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
mcrypt_generic_init($td, $key, $iv);
$security_random_encrypted=mcrypt_generic($td, $security_random);
mcrypt_generic_deinit($td);
mcrypt_module_close($td);
$security_random_encrypted_encoded=rawurlencode($security_random_encrypted);

print '<head>';
echo "\n$head\n$css\n";
print '<title>Eintragen</title>
<script language="JavaScript" src="insert.js"></script>
<script language="javascript">
function gbcodes(){
window.open("'.$PHP_SELF.'?action=gbcodes", "", "width=500,height=400,scrollbars=yes");
}
function smilies(){
window.open("'.$PHP_SELF.'?action=smilies", "", "width=500,height=400,scrollbars=yes");
}
function textCounter(field, countfield, maxlimit){
if (field.value.length > maxlimit)
field.value = field.value.substring(0, maxlimit);
else
countfield.value = maxlimit - field.value.length;
}
</script>
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" size="'.$groseuber.'" face="'.$sart.'">Eintragen</font>
<p align="center">&nbsp;</p>';
$nicq = "<a href=http://wwp.icq.com/scripts/contact.dll?msgto=$icq><img height=18 width=18 border=0 src=http://wwp.icq.com/scripts/online.dll?icq=$icq&img=5></a>";
$nmail = "<a href=mailto:$mail><img border=0 alt='"."$name"."s E-Mail Adresse' src=images/mail.gif></a>";
$nurl = "<a target=_blank href=$url><img border=0 alt='"."$name"."s Homepage' src=images/www.gif></a>";
if ($nicq == "<a href=http://wwp.icq.com/scripts/contact.dll?msgto=><img height=18 width=18 border=0 src=http://wwp.icq.com/scripts/online.dll?icq=&img=5></a>" || $icq == "<a href=http://wwp.icq.com/scripts/contact.dll?msgto=><img height=18 width=18 border=0 src=http://wwp.icq.com/scripts/online.dll?icq=&img=5></a>"){ $nicq = ""; }
if ($nmail == "<a href=mailto:><img border=0 alt='"."$name"."s E-Mail Adresse' src=images/mail.gif></a>" || $mail == "<a href=mailto:><img border=0 alt='"."$name"."s E-Mail Adresse' src=images/mail.gif></a>"){ $nmail = ""; }
if ($nurl == "<a target=_blank href=http://><img border=0 alt='"."$name"."s Homepage' src=images/www.gif></a>" || $url == "<a target=_blank href=><img border=0 alt='"."$name"."s Homepage' src=images/www.gif></a>" || $url == " <a target=_blank href=><img border=0 alt='"."$name"."s Homepage' src=images/www.gif></a>" || $url == "<a target=_blank href= ><img border=0 alt='"."$name"."s Homepage' src=images/www.gif></a>"){ $nurl = ""; }
parsekommentar();
psmilies();
if($step != "2"){ $url = "http://"; }
if($step == "2"){
print '<div align="center">
  <center>
<table border="0" cellpadding="'.$cellpadding.'" cellspacing="1" width="650" bgcolor="'.$fabtabrand.'">
    <tr>
      <td width="'.$breitesmn.'" bgcolor="'.$zmuber.'" colspan="2"><font color="'.$textin.'" size="'.$grosetext.'" face="'.$sart.'"><b>Vorschau</b></font></td>
    </tr>
    <tr>
      <td width="'.$breitesmn.'" bgcolor="'.$zmeintragl.'" valign="top"><font color="'.$textin.'" size="'.$grosetext.'" face="'.$sart.'"><b>'.$name.'</b></font><br>'.$nmail.' '.$nurl.' '.$nicq.' <img src="images/ip.gif" border="0" alt="'.$name.'s IP angucken"><br><br><br></td>
      <td valign="top" bgcolor="'.$zmeintragl.'"><font color="'.$textin.'" size="1" face="'.$sart.'">'.datum().'&nbsp;&nbsp;&nbsp;</font><hr width="97%" style="color: '.$fabtabrand.'; height: 1px; border: 1px;" noshade><font color="'.$textin.'" size="'.$grosetext.'" face="'.$sart.'">'.$kommentar.'<br><br></font></td>
    </tr>
  </table>
  <br>
  </center>
</div>';
}
print '<form method="POST" action="'.$PHP_SELF.'?action=eintragspeichern" name="eintragen">
<input type="hidden" name="security_value" value="'.$security_value.'">
  <div align="center">
    <center>
<table border="0" cellpadding="'.$cellpadding.'" cellspacing="1" width="650" bgcolor="'.$fabtabrand.'">
      <tr>
        <td width="100%" bgcolor="'.$zmuber.'" colspan="2" align="left"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>Eintrag</b></font></td>
      </tr>
      <tr>
        <td bgcolor="'.$zmeintrag.'" width="100"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Name*</font></td>
        <td bgcolor="'.$zmeintrag.'" width="500"><input type="text" name="name" size="40" maxlength="'.$namelength.'" value="'.$name.'"></td>
      </tr>
      <tr>
        <td bgcolor="'.$zmeintrag.'" width="100"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">E-Mail</font></td>
        <td bgcolor="'.$zmeintrag.'" width="500"><input type="text" name="mail" size="40" maxlength="'.$maillength.'" value="'.$mail.'"></td>
      </tr>
      <tr>
        <td bgcolor="'.$zmeintrag.'" width="100"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Homepage</font></td>
        <td bgcolor="'.$zmeintrag.'" width="500"><input type="text" name="url" size="40" value="'.$url.'" maxlength="'.$urllength.'"></td>
      </tr>
      <tr>
        <td bgcolor="'.$zmeintrag.'" width="100"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">ICQ UIN</font></td>
        <td bgcolor="'.$zmeintrag.'" width="500"><input type="text" name="icq" size="12" maxlength="'.$icqlength.'" value="'.$icq.'"></td>
      </tr>
      <tr>
        <td width="100%" bgcolor="'.$zmuber.'" colspan="2" align="left"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>Kommentar*</b></font></td>
      </tr>
      <tr>
        <td bgcolor="'.$zmeintrag.'" width="100%" colspan="2">
<div align="center">
  <center>
  <table border="0" cellpadding="2" cellspacing="0" width="100%">
    <tr>
      <td rowspan="5" align="left" valign="top" width="10%"><textarea rows="15" name="kommentar" cols="68" onKeyDown="textCounter(this.form.kommentar,this.form.remLen,'.$komlength.');" onKeyUp="textCounter(this.form.kommentar,this.form.remLen,'.$komlength.');"
onfocus="sel.setSelection(this);" 
onclick="sel.setSelection(this);" 
onkeyup="sel.setSelection(this);" 
onselect="sel.setSelection(this);">';
echo "$nkommentar";
print '</textarea></td>
      <td align="left" valign="top" colspan="2" width="10%">';
gbcodes1();
print '      </td>
    </tr>
    <tr>
      <td align="left" valign="top" width="10%">';
smilies();
print '</td>
      <td align="left" valign="top" width="80%"><font color="'.$textin.'" face="'.$sart.'" size="1"><a href="javascript:gbcodes()"><font color="'.$textin.'" face="'.$sart.'" size="1">GB-Code</font></a>: '.$gbc.'<br>HTML-Code: '.$htmlc.'<br><font color="'.$textin.'"><a href="javascript:smilies()"><font color="'.$textin.'" face="'.$sart.'" size="1">Mehr Smilies</a></font></font></font></td>
    </tr>
    <tr>
      <td align="left" valign="bottom" colspan="2" width="10%"><font color="'.$textin.'" face="'.$sart.'" size="1">Noch</font><input name=remLen readonly type="text" size="'.strlen($komlength).'" value="'.$komlength.'" style="color: '.$textin.'; background: '.$zmeintrag.'; font-family: '.$sart.'; font-size: 10px; border-style: solid; text-align: center; border-color: '.$zmeintrag.'; border-top-width: 0px; border-left-width: 0px; border-right-width: 0px; border-bottom-width: 1px;"><font color="'.$textin.'" face="'.$sart.'" size="1">von '.$komlength.' Zeichen übrig</font></td>
    </tr>
  </table>
  </center>
</div>
        </td>
      </tr>
      <tr>
        <td bgcolor="'.$zmeintrag.'" width="100"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Sicherheitsabfrage*</font></td>
        <td bgcolor="'.$zmeintrag.'" width="300"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Folgende Angabe bitte in das nachfolgende Formularfeld &uuml;bertragen <img src="number.php?id='.$security_random_encrypted_encoded.'" style="vertical-align:bottom" /> <b>&rarr;</b> <input type="text" name="security" size="8" maxlength="'.$securitylength.'" value="'.$security.'"></font></td>
      </tr>
      <tr> 
        <td bgcolor="'.$zmeintrag.'" width="100"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Hinweis</font></td>
        <td bgcolor="'.$zmeintrag.'" width="500"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Alle Felder, die mit * gekennzeichnet sind, müssen ausgefüllt werden.</font></td>
      </tr>
      <tr>
        <td bgcolor="'.$zmeintrag.'" colspan="2" align="center"><input type="submit" name="submit" value="Eintragen">&nbsp;<input type="submit" name="submit" value="Vorschau">&nbsp;<input type="reset" value="Löschen"></td>
      </tr>
    </table>
    </center>
  </div>
</form>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
}
if($action == "eintragspeichern"){
if($submit == "Eintragen"){
        if($setetc == "eingetragen"){
print '<head>
<title>Flood-Sperre</title>
'.$head.'
'.$css.'
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">Flood-Sperre</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">&nbsp;</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">Die Flood-Sperre ist eingeschaltet, man kann sich erst nach '.$floodtime.' Minuten wieder eintragen.</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'"><a href="'.$PHP_SELF.'">Hier</a> gelangen Sie zurück zum Gästebuch</font></p>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
        }
        
        // security
        $in_security_value_crypted=rawurldecode(trim($security_value));
        $in_security_crypted=crypt($security, $in_security_value_crypted);
        if ($in_security_value_crypted != $in_security_crypted) {
	        
print '<head>
<title>Security-Check</title>
'.$head.'
'.$css.'
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" size="'.$groseuber.'" face="'.$sart.'">Fehler</font>
<p align="center">&nbsp;</p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">Die Sicherheitsabfrage war erfolglos!<br><br>Klicken Sie <a href="javascript:history.go(-1)" target="_self">hier</a>, um zur vorherigen Seite zur&uuml;ckzugelangen.<br></font></p>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
        }
        else {
        
        if($setetc == "nein"){
$fp = fopen("./include/eintraege.dat","r");
while (!feof($fp)){
        $alt = fread ($fp,999999);
}
        fclose($fp);
$nummer = nummer();
$ip1 = gethostbyaddr($REMOTE_ADDR);
$ip2 = gethostbyname($REMOTE_ADDR);
$ip = "$ip1 ($ip2)";
$kommentar = str_replace ("\r\n","<br>", $kommentar);
$mail = str_replace ("\r\n","<br>", $mail);
$url = str_replace ("\r\n","<br>", $url);
$name = str_replace ("\r\n","<br>", $name);
$icq = str_replace ("\r\n","<br>", $icq);
$kommentar = str_replace ("\n","<br>", $kommentar);
$mail = str_replace ("\n","<br>", $mail);
$url = str_replace ("\n","<br>", $url);
$name = str_replace ("\n","<br>", $name);
$icq = str_replace ("\n","<br>", $icq);
$kommentar = str_replace("|", "&#124", $kommentar);
$mail = str_replace("|", "&#124", $mail);
$name = str_replace("|", "&#124", $name);
$url = str_replace("|", "&#124", $url);
$icq = str_replace("|", "&#124", $icq);
$kommentar = str_replace("\\", "", $kommentar);
$name = str_replace("\\", "", $name);
$mail = str_replace("\\", "", $mail);
$url = str_replace("\\", "", $url);
$icq = str_replace("\\", "", $icq);
$kommentar = str_replace("\$", "&#36;", $kommentar);
$name = str_replace("\$", "&#36;", $name);
$mail = str_replace("\$", "&#36;", $mail);
$url = str_replace("\$", "&#36;", $url);
$icq = str_replace("\$", "&#36;", $icq);

$allok = "TRUE";

if($mail != ""){
$erlaubt = "[-!#$%&\'*+\\.0-9^_'a-z{|}A-Z~]+";
$pruf = "^" . $erlaubt . "@" . $erlaubt . "\." . $erlaubt . "$";
if(!ereg($pruf, $mail)){
$allok = "FALSE";
}
}
if($url != "http://" && $url != ""){
$erlaubt = "[-!#$%&\'*+\\.0-9^_'a-z{|}A-Z~]+";
$pruf = "^" . "http://" . $erlaubt . "\." . $erlaubt . "$";
if(!ereg($pruf, $url)){
$allok = "FALSE";
}
}
if($icq != ""){
$erlaubt1 = "[0-9]+";
$pruf = "^" . $erlaubt1 . "$";
if(!ereg($pruf, $icq)){
$allok = "FALSE";
}
}
if($name == "" || $name == " " || $kommentar == "" || $kommentar == " " || $kommentar == "  " || $kommentar == "   " || $kommentar == "    " || $kommentar == "<br>" || $kommentar == "&nbsp;"){ $allok = "FALSE"; }
if($allok == "FALSE"){
print '<head>
<title>Fehler</title>';
echo "\n$head\n$css\n";
print '</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" size="'.$groseuber.'" face="'.$sart.'">Fehler</font>
<p align="center">&nbsp;</p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">Folgende Fehler können aufgetreten sein:<br>Sie haben nicht alle Felder, die mit * gekennzeichnet sind ausgefüllt<br>Ihre E-Mail Adresse ist nicht korrekt<br>Ihre Homepage Adresse ist nicht korrekt<br>Ihre ICQ Nummer ist nicht korrekt<br><br>Klicken Sie <a href="javascript:history.go(-1)" target="_self">hier</a>, um zur vorherigen Seite zurückzugelangen.<br></font></p>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
}
if($allok == "TRUE"){
if($flooding == "An"){ setcookie("ungb3", "eingetragen", time() + $floodtime * 60); }
$datum = datum();
$alles = "$nummer|$name|$datum|$icq|$mail|$url|$ip|$kommentar";
$filer = fopen("./include/eintraege.dat","r");
$inhalt = fgets($filer,999999);
$datei = fopen("./include/eintraege.dat", "wb");
if($inhalt == "" || $inhalt == " " || $inhalt == "\n" || $inhalt == "\n\r"){ $fw = fwrite($datei, "$alles"); }
if($inhalt != "" && $inhalt != " " && $inhalt != "\n" && $inhalt != "\n\r"){ $fw = fwrite($datei, "$alles\n$alt"); }
fclose($datei);
print '<head>
<title>'.$titel.'</title>
<meta http-equiv="Refresh" content="2; URL='.$PHP_SELF.'">
'.$head.'
'.$css.'
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$tex.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">
'.$body.'
<FONT color="'.$textout.'" SIZE="'.$grosetext.'" FACE="'.$sart.'">
<B>Danke für Ihren Eintrag! Wir leiten Sie jetzt zur Übersicht weiter, bitte warten Sie zwei Sekunden.<P></font>
<FONT color="'.$textout.'" SIZE="1" FACE="'.$sart.'">
<A HREF="'.$PHP_SELF.'">Klicken Sie hier, wenn Sie nicht länger warten möchten oder Ihr Browser keine automatische Weiterleitung unterstützt.</A>
</B><br><br>
</FONT>
</body>';
if($mail == "" || $mail == " " || $mail == "@"){ $mail = "$name@keine.email"; }
parsekommentar();

// Mailfix 14.10.09

$dankm = str_replace("\$name", "$name", $dankm);
$dankm = str_replace("\$mail", "$mail", $dankm);
$dankm = str_replace("\$url", "$url", $dankm);
$dankm = str_replace("\$icq", "$icq", $dankm);
$dankm = str_replace("\$ip", "$ip", $dankm);
$dankm = str_replace("\$kommentar", "$kommentar", $dankm);
$dankm = str_replace("\$homepage", "$homepage", $dankm);
$dankm = str_replace("<br>", " \n", $dankm);
$benachm = str_replace("\$username", "$wamd5", $benachm);
$benachm = str_replace("\$deinname", "$wamd5", $benachm);
$benachm = str_replace("\$name", "$name", $benachm);
$benachm = str_replace("\$mail", "$mail", $benachm);
$benachm = str_replace("\$url", "$url", $benachm);
$benachm = str_replace("\$icq", "$icq", $benachm);
$benachm = str_replace("\$ip", "$ip", $benachm);
$benachm = str_replace("\$kommentar", "$kommentar", $benachm);
$benachm = str_replace("\$SERVER_NAME", "$SERVER_NAME", $benachm);
$benachm = str_replace("\$PHP_SELF", "$PHP_SELF", $benachm);
$benachm = str_replace("http://$SERVER_NAME$PHP_SELF", "http://$SERVER_NAME" . "$PHP_SELF", $benachm);
$benachm = str_replace("<br>", " \n", $benachm);

if($benachr == "An"){

$mailbetreff = "Neuer Gästebucheintrag";
$mailbetreff = mb_encode_mimeheader($mailbetreff,"ISO-8859-15", "B", "\n");

$mailheader1  = ("From: " . $mail . "\n");
$mailheader1 .= ("Reply-To: " . $mail . "\n");
$mailheader1 .= ("Return-Path: " . $mail . "\n");
$mailheader1 .= ("X-Mailer: PHP/" . phpversion() . "\n");
$mailheader1 .= ("X-Sender-IP: " . $REMOTE_ADDR . "\n");
$mailheader1 .= ("MIME-Version: 1.0" . "\n");
$mailheader1 .= ("Content-Type: text/plain; charset=ISO-8859-15; format=flowed" . "\n");
$mailheader1 .= ("Content-Transfer-Encoding: 7bit" . "\n");

if( isset( $_SERVER["WINDIR"] ) ) {
mail($email, $mailbetreff, $benachm, $mailheader1);
} else {
mail($email, $mailbetreff, $benachm, $mailheader1, "-f $email");
}

}

if($danke == "An"){

$mailbetreff = "Danke für Ihren Eintrag";
$mailbetreff = mb_encode_mimeheader($mailbetreff,"ISO-8859-15", "B", "\n");

$mailheader1  = ("From: " . $email . "\n");
$mailheader1 .= ("Reply-To: " . $email . "\n");
$mailheader1 .= ("Return-Path: " . $email . "\n");
$mailheader1 .= ("X-Mailer: PHP/" . phpversion() . "\n");
$mailheader1 .= ("X-Sender-IP: " . $REMOTE_ADDR . "\n");
$mailheader1 .= ("MIME-Version: 1.0" . "\n");
$mailheader1 .= ("Content-Type: text/plain; charset=ISO-8859-15; format=flowed" . "\n");
$mailheader1 .= ("Content-Transfer-Encoding: 7bit" . "\n");

if( isset( $_SERVER["WINDIR"] ) ) {
mail ($mail, $mailbetreff, $dankm, $mailheader1);
} else {
mail ($mail, $mailbetreff, $dankm, $mailheader1, "-f $email");
}

}

// Mailfix Ende

if($benachr == "Aus"){ echo ""; }
if($danke == "Aus"){ echo ""; }
}

}
}
}
if($submit == "Vorschau"){
$allok = "TRUE";
if($mail != ""){
$erlaubt = "[-!#$%&\'*+\\.0-9^_'a-z{|}A-Z~]+";
$pruf = "^" . $erlaubt . "@" . $erlaubt . "\." . $erlaubt . "$";
if(!ereg($pruf, $mail)){
$allok = "FALSE";
}
}
if($url != "http://" && $url != ""){
$erlaubt = "[-!#$%&\'*+\\.0-9^_'a-z{|}A-Z~]+";
$pruf = "^" . "http://" . $erlaubt . "\." . $erlaubt . "$";
if(!ereg($pruf, $url)){
$allok = "FALSE";
}
}
if($icq != ""){
$erlaubt1 = "[0-9]+";
$pruf = "^" . $erlaubt1 . "$";
if(!ereg($pruf, $icq)){
$allok = "FALSE";
}
}
if($name == "" || $name == " " || $kommentar == "" || $kommentar == " " || $kommentar == "  " || $kommentar == "   " || $kommentar == "    " || $kommentar == "<br>" || $kommentar == "&nbsp;"){ $allok = "FALSE"; }
if($allok == "FALSE"){
print '<head>
<title>Fehler</title>';
echo "\n$head\n$css\n";
print '</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" size="'.$groseuber.'" face="'.$sart.'">Fehler</font>
<p align="center">&nbsp;</p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">'.$jv.'<br>Klicken Sie <a href="javascript:history.go(-1)" target="_self">hier</a>, um zur vorherigen Seite zurückzugelangen.<br></font></p>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
}
if($allok == "TRUE"){
$kommentar = str_replace("\\", "", $kommentar);
$kommentar = str_replace("\$", "&#36;", $kommentar);
$kommentar = urlencode($kommentar);
print '<head>
<title>'.$titel.'</title>
<meta http-equiv="Refresh" content="0; URL='.$PHP_SELF.'?action=eintragen&step=2&name='.$name.'&url='.$url.'&mail='.$mail.'&icq='.$icq.'&kommentar='.$kommentar.'">
'.$head.'
'.$css.'
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$tex.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">
'.$body.'
<FONT color="'.$textout.'" SIZE="'.$grosetext.'" FACE="'.$sart.'">
<B>Danke für Ihre Eingaben! Wir leiten Sie jetzt zur Vorschau weiter, bitte warten Sie kurz.<P></font>
<FONT color="'.$textout.'" SIZE="1" FACE="'.$sart.'">
<A HREF="'.$PHP_SELF.'?action=eintragen&step=2&name='.$name.'&url='.$url.'&mail='.$mail.'&icq='.$icq.'&kommentar='.$kommentar.'">Klicken Sie hier, wenn Sie nicht länger warten möchten oder Ihr Browser keine automatische Weiterleitung unterstützt.</A>
</B><br><br>
</FONT>
</body>';
}
}
}
if($action == "smilies"){
print '<head>
<title>S M I L I E S</title>';
echo "\n$head\n$css\n";
print '<script language="javascript">
function CLOSE(desktopURL){
window.close();
}
</script>
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">
'.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">S M I L I E S</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">Diese Smilies können benutzt werden:</font></p>
<div align="center">
  <center>
<table border="0" cellpadding="'.$cellpadding.'" cellspacing="1" width="97%" bgcolor="'.$fabtabrand.'">
    <tr>
      <td colspan="3" bgcolor="'.$zmeintrag.'"><center><font color="'.$textin.'"><a href="javascript:close()"><font face="'.$sart.'" size="1">Fenster schließen</font></a></font></center></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmuber.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>Eingabe</b></font></td>
      <td bgcolor="'.$zmuber.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>Bedeutung</b></font></td>
      <td bgcolor="'.$zmuber.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>Ergebnis</b></font></td>
    </tr>';
$sfile = fopen('./include/smilies.inc.php','r');
while ( ! feof($sfile)){
$sline = fgets($sfile,999999);
$sline = trim($sline);
$stext = explode("|",$sline);
print '    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">'.$stext[2].'</font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">'.$stext[4].'</font></td>
      <td bgcolor="'.$zmeintrag.'"><img src="images/smilies/'.$stext[3].'"></td>
    </tr>';
}
print '    <tr>
      <td colspan="3" bgcolor="'.$zmeintrag.'"><center><font color="'.$textin.'"><a href="javascript:close()"><font face="'.$sart.'" size="1">Fenster schließen</font></a></font></center></td>
    </tr>
  </table>
  </center>
</div>';
cpyr();
print "</body>\n</html>";
}
if($action == "gbcodes"){
print '<head>
<title>GB-Codes</title>';
echo "\n$head\n$css\n";
print '<script language="javascript">
function CLOSE(desktopURL){
window.close();
}
</script>
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">
'.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">GB-Codes</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">Diese GB-Codes können neben HTML benutzt werden:</font></p>
<div align="center">
  <center>
<table border="0" cellpadding="'.$cellpadding.'" cellspacing="1" width="97%" bgcolor="'.$fabtabrand.'">
    <tr>
      <td colspan="2" bgcolor="'.$zmeintrag.'"><center><font color="'.$textin.'"><a href="javascript:close()"><font color="'.$textin.'" face="'.$sart.'" size="1">Fenster schließen</font></a></font></center></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmuber.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>Eingabe</b></font></td>
      <td bgcolor="'.$zmuber.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>Ergebnis</b></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>[b]</b>Text<b>[/b]</b></font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>Text</b></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>[i]</b>Text<b>[/i]</b></font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><i>Text</i></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>[u]</b>Text<b>[/u]</b></font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><u>Text</u></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>[center]</b>Text<b>[/center]</b></font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Text ist zentriert</u></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>[img]</b>Bildurl<b>[/img]</b></font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Bild wird eingefügt</font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>[size=x]</b>Text<b>[/size]</b></font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Andere Schriftgröße (1-7)</u></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>[font=x]</b>Text<b>[/font]</b></font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Andere Schriftart</u></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>[color=x]</b>Text<b>[/color]</b></font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Andere Schriftfarbe</u></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>[mark=x]</b>Text<b>[/mark]</b></font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Andere Text-Hintergrundfarbe</u></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>[url=x]</b>Websiteurl<b>[/url]</b></font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Hyperlink wird eingefügt</font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><b>[email=x]</b>E-Mail<b>[/email]</b></font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">E-Mail Adresse wird eingefügt</font></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="'.$zmeintrag.'"><center><font color="'.$textin.'"><a href="javascript:close()"><font color="'.$textin.'" face="'.$sart.'" size="1">Fenster schließen</font></a></font></center></td>
    </tr>
  </table>
  </center>
</div>';
cpyr();
print '</body>';
}
if($action == "delete"){
print '<head>
<title>Eintrag löschen</title>';
echo "\n$head\n$css\n";
print '</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">Eintrag löschen</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">&nbsp;</font></p>
<form method="POST" action="'.$PHP_SELF.'?action=del">
<input type="hidden" name="eid" value="'.$eid.'">
<div align="center">
  <center>
<table border="0" cellpadding="'.$cellpadding.'" cellspacing="1" width="550" bgcolor="'.$fabtabrand.'">
    <tr>
      <td bgcolor="'.$zmuber.'" colspan="2">
        <p align="center"><font color="'.$textin.'" face="'.$sart.'" size="1">Achtung! Nach dem Bestätigen wird der Eintrag '.$eid.' gelöscht!</font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Benutzername</font></td>
      <td bgcolor="'.$zmeintrag.'">
          <p><input type="text" name="nemo" size="20"></p>
      </td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Passwort</font></td>
      <td bgcolor="'.$zmeintrag.'">
          <p><input type="password" name="passwo" size="20"></p>
      </td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><input type="reset" value="löschen"></td>
      <td bgcolor="'.$zmeintrag.'"><input type="submit" value="löschen"></td>
    </tr>
  </table>
  </center>
</div>
</form>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
}
if($action == "del"){
$md5pwd = md5("$passwo");
$md5nemo = md5("$nemo");
        if($md5pwd == "$pass" && $md5nemo == "$username"){
$linie = file("./include/eintraege.dat");
$data ="";
$delete ="0";
for($num = 0; $num < count($linie); $num++)
{
$bfile = explode("|",$linie[$num]);
if ($bfile[0] == $eid)
{
$delete = "1";
print '<head>
<title>'.$titel.'</title>
<meta http-equiv="Refresh" content="2; URL='.$PHP_SELF.'">
'.$head.'
'.$css.'
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$tex.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">
'.$body.'
<FONT color="'.$textout.'" SIZE="'.$grosetext.'" FACE="'.$sart.'">
<B>Eintrag '.$eid.' erfolgreich gelöscht! Wir leiten Sie jetzt zur Übersicht weiter, bitte warten Sie zwei Sekunden.<P></font>
<FONT color="'.$textout.'" SIZE="1" FACE="'.$sart.'">
<A HREF="'.$PHP_SELF.'">Klicken Sie hier, wenn Sie nicht länger warten möchten oder Ihr Browser keine automatische Weiterleitung unterstützt.</A>
</B><br><br>
</FONT>
</body>';
}

if($delete == "1")
{
$data.="";
$delete="0";
} else {
$data.="$bfile[0]|$bfile[1]|$bfile[2]|$bfile[3]|$bfile[4]|$bfile[5]|$bfile[6]|$bfile[7]";
}
}
$datar = rtrim($data);
$filer = fopen("./include/eintraege.dat","wb+");
fputs($filer,$datar);
fclose($filer);
        }
$md5pwd = md5("$passwo");
$md5nemo = md5("$nemo");
        if($md5pwd != "$pass" || $md5nemo != "$username"){
print '<head>
<title>Fehler</title>
'.$head.'
'.$css.'
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">Fehler</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">Sie haben einen falschen Benutzernamen oder Passwort eingegeben,<br>achten Sie auf Groß- und Kleinschriebung!<br>Klicken Sie <a href="javascript:history.go(-1)" target="_self">hier</a>, um zur vorherigen Seite zurückzugelangen.</font></p>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
        }
}
if($action == "comment"){
print '<head>
<title>Kommentar hinzufügen</title>';
echo "\n$head\n$css\n";
print '</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">Kommentar hinzufügen</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">&nbsp;</font></p>
<form method="POST" action="'.$PHP_SELF.'?action=commentlogin">
<input type="hidden" name="eid" value="'.$eid.'">
<div align="center">
  <center>
<table border="0" cellpadding="'.$cellpadding.'" cellspacing="1" width="550" bgcolor="'.$fabtabrand.'">
    <tr>
      <td bgcolor="'.$zmuber.'" colspan="2">
        <p align="center"><font color="'.$textin.'" face="'.$sart.'" size="1">Um den Eintrag mit der Nummer '.$eid.' ein Kommentar anzuhängen, müssen Sie sich einloggen!</font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Benutzername</font></td>
      <td bgcolor="'.$zmeintrag.'">
          <p><input type="text" name="loginname" size="20"></p>
      </td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Passwort</font></td>
      <td bgcolor="'.$zmeintrag.'">
          <p><input type="password" name="loginpwd" size="20"></p>
      </td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><input type="reset" value="löschen"></td>
      <td bgcolor="'.$zmeintrag.'"><input type="submit" value="einloggen"></td>
    </tr>
  </table>
  </center>
</div>
</form>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
}
if($action == "commentlogin"){
$md5pwd = md5("$loginpwd");
$md5nemo = md5("$loginname");
        if($md5pwd != "$pass" || $md5nemo != "$username"){
print '<head>
<title>Fehler</title>
'.$head.'
'.$css.'
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">Fehler</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">Sie haben einen falschen Benutzernamen oder Passwort eingegeben,<br>achten Sie auf Groß- und Kleinschriebung!<br>Klicken Sie <a href="javascript:history.go(-1)" target="_self">hier</a>, um zur vorherigen Seite zurückzugelangen.</font></p>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
        }
$md5pwd = md5("$loginpwd");
$md5nemo = md5("$loginname");
if($md5pwd == "$pass" && $md5nemo == "$username"){
print '<head>
<script language="JavaScript" src="insert.js"></script>
<title>Kommentar hinzufügen</title>';
echo "\n$head\n$css\n";
print '</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">Kommentar hinzufügen</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">&nbsp;</font></p>
<form method="POST" action="'.$PHP_SELF.'?action=addcom" name="eintragen">
<input type="hidden" name="eid" value="'.$eid.'">
<input type="hidden" name="nemo" value="'.$loginname.'">
<input type="hidden" name="passwo" value="'.$loginpwd.'">
<div align="center">
  <center>
<table border="0" cellpadding="'.$cellpadding.'" cellspacing="1" width="550" bgcolor="'.$fabtabrand.'">
    <tr>
      <td bgcolor="'.$zmuber.'" colspan="2">
        <p align="center"><font color="'.$textin.'" face="'.$sart.'" size="1">Achtung! Nach dem Bestätigen wird dem Eintrag '.$eid.' ein Kommentar angehängt!</font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'" width="125"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Angezeigter Name</font></td>
      <td bgcolor="'.$zmeintrag.'">
          <p><input type="text" name="knamek" size="20" value="'.$loginname.'"></p>
      </td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'" width="125" align="left" valign="top"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Kommentar<br><br><br></font>';
smilies();
print '      <br><br></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">';
gbcodes2();
print '      <br><textarea name="kommentar" cols="70" rows="10" onfocus="sel.setSelection(this);" onclick="sel.setSelection(this);" onkeyup="sel.setSelection(this);" onselect="sel.setSelection(this);"></textarea><br>
      <font color="'.$textin.'"><a href="javascript:gbcodes()"><font face="'.$sart.'" size="1">GB-Codes</a>&nbsp;</font></font><font color="'.$textin.'"><a href="javascript:smilies()"><font face="'.$sart.'" size="1">Smilies</a></font></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'" width="125"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Text kursiv?</font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><input type="checkbox" value="yes" name="kurs" class="nix"></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'" width="125"><input type="reset" value="löschen"></td>
      <td bgcolor="'.$zmeintrag.'"><input type="submit" value="hinzufügen"></td>
    </tr>
  </table>
  </center>
</div>
</form>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
}
}
if($action == "addcom"){
$md5pwd = md5("$passwo");
$md5nemo = md5("$nemo");
        if($md5pwd == "$pass" && $md5nemo == "$username"){
if($kommentar == "" || $knamek == ""){
print '<head>
<title>Fehler</title>
'.$head.'
'.$css.'
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">Fehler</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">Das Kommentarfeld oder der angezeigte Name ist leer.<br>Klicken Sie <a href="javascript:history.go(-1)" target="_self">hier</a>, um zur vorherigen Seite zurückzugelangen.</font></p>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
}
if($kommentar != "" && $knamek != ""){
$linie = file("./include/eintraege.dat");
$data ="";
$delete ="0";
for($num = 0; $num < count($linie); $num++)
{
$bfile = explode("|",$linie[$num]);
if ($bfile[0] == $eid)
{
$delete = "1";
print '<head>
<title>'.$titel.'</title>
<meta http-equiv="Refresh" content="2; URL='.$PHP_SELF.'">
'.$head.'
'.$css.'
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$tex.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">
'.$body.'
<FONT color="'.$textout.'" SIZE="'.$grosetext.'" FACE="'.$sart.'">
<B>Danke für Ihr Kommentar! Wir leiten Sie jetzt zur Übersicht weiter, bitte warten Sie zwei Sekunden.<P></font>
<FONT color="'.$textout.'" SIZE="1" FACE="'.$sart.'">
<A HREF="'.$PHP_SELF.'">Klicken Sie hier, wenn Sie nicht länger warten möchten oder Ihr Browser keine automatische Weiterleitung unterstützt.</A>
</B><br><br>
</FONT>
</body>';
}
if($delete==1)
{
if($kurs == "yes"){
$kurs1 = "<i>";
$kurs2 = "</i>";
}
$text = "$bfile[7]";
$textinsg = "$text<br><br>\$Kommentar von $knamek:</font><br>$kurs1" . "$kommentar" . "$kurs2<br>";
$textinsg = str_replace("\r\n", "<br>", $textinsg);
$textinsg = str_replace("\n", "<br>", $textinsg);
$textinsg = str_replace("|", "&#124", $textinsg);
$textinsg = str_replace("\\", "", $textinsg);
if($eid != "1"){ $data.="$bfile[0]|$bfile[1]|$bfile[2]|$bfile[3]|$bfile[4]|$bfile[5]|$bfile[6]|$textinsg\n"; }
if($eid == "1"){ $data.="$bfile[0]|$bfile[1]|$bfile[2]|$bfile[3]|$bfile[4]|$bfile[5]|$bfile[6]|$textinsg"; }
$delete="0";
} else {
$data.="$bfile[0]|$bfile[1]|$bfile[2]|$bfile[3]|$bfile[4]|$bfile[5]|$bfile[6]|$bfile[7]";
}
}
$filer = fopen("./include/eintraege.dat","wb+");
fputs($filer,$data);
fclose($filer);
        }
}
$md5pwd = md5("$passwo");
$md5nemo = md5("$nemo");
        if($md5pwd != "$pass" || $md5nemo != "$username"){
print '<head>
<title>Fehler</title>
'.$head.'
'.$css.'
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">Fehler</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">Sie haben einen falschen Benutzernamen oder Passwort eingegeben,<br>achten Sie auf Groß- und Kleinschriebung!<br>Klicken Sie <a href="javascript:history.go(-1)" target="_self">hier</a>, um zur vorherigen Seite zurückzugelangen.</font></p>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
        }
}
if($action == "edit"){
print '<head>
<title>Eintrag bearbeiten</title>';
echo "\n$head\n$css\n";
print '</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">Eintrag bearbeiten</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">&nbsp;</font></p>
<form method="POST" action="'.$PHP_SELF.'?action=editlogin">
<input type="hidden" name="eid" value="'.$eid.'">
<div align="center">
  <center>
<table border="0" cellpadding="'.$cellpadding.'" cellspacing="1" width="550" bgcolor="'.$fabtabrand.'">
    <tr>
      <td bgcolor="'.$zmuber.'" colspan="2">
        <p align="center"><font color="'.$textin.'" face="'.$sart.'" size="1">Um den Eintrag mit der Nummer '.$eid.' zu bearbeiten, müssen Sie sich einloggen!</font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Benutzername</font></td>
      <td bgcolor="'.$zmeintrag.'">
          <p><input type="text" name="loginname" size="20"></p>
      </td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Passwort</font></td>
      <td bgcolor="'.$zmeintrag.'">
          <p><input type="password" name="loginpwd" size="20"></p>
      </td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><input type="reset" value="löschen"></td>
      <td bgcolor="'.$zmeintrag.'"><input type="submit" value="einloggen"></td>
    </tr>
  </table>
  </center>
</div>
</form>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
}
if($action == "editlogin"){
$md5pwd = md5("$loginpwd");
$md5nemo = md5("$loginname");
        if($md5pwd != "$pass" || $md5nemo != "$username"){
print '<head>
<title>Fehler</title>
'.$head.'
'.$css.'
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">Fehler</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">Sie haben einen falschen Benutzernamen oder Passwort eingegeben,<br>achten Sie auf Groß- und Kleinschriebung!<br>Klicken Sie <a href="javascript:history.go(-1)" target="_self">hier</a>, um zur vorherigen Seite zurückzugelangen.</font></p>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
        }
$md5pwd = md5("$loginpwd");
$md5nemo = md5("$loginname");
if($md5pwd == "$pass" && $md5nemo == "$username"){

$linie = file("./include/eintraege.dat");
for($num = 0; $num < count($linie); $num++)
{
$bfile = explode("|",$linie[$num]);
if ($bfile[0] == $eid)
{
$oldname = "$bfile[1]";
$olddatum = "$bfile[2]";
$oldicq = "$bfile[3]";
$oldmail = "$bfile[4]";
$oldurl = "$bfile[5]";
$oldip = "$bfile[6]";
$oldtext = "$bfile[7]";
}
}
print '<head>
<script language="JavaScript" src="insert.js"></script>
<title>Eintrag bearbeiten</title>';
echo "\n$head\n$css\n";
$oldtext = str_replace("<br>", "\n", $oldtext);
$oldtext = rtrim($oldtext);
print '</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">Eintrag bearbeiten</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">&nbsp;</font></p>
<form method="POST" action="'.$PHP_SELF.'?action=editsave" name="eintragen">
<input type="hidden" name="eid" value="'.$eid.'">
<input type="hidden" name="nemo" value="'.$loginname.'">
<input type="hidden" name="passwo" value="'.$loginpwd.'">
<div align="center">
  <center>
<table border="0" cellpadding="'.$cellpadding.'" cellspacing="1" width="550" bgcolor="'.$fabtabrand.'">
    <tr>
      <td bgcolor="'.$zmuber.'" colspan="2">
        <p align="center"><font color="'.$textin.'" face="'.$sart.'" size="1">Bei dem Text "Kommentar" bitte das \$ davor stehen lassen!<br>Achtung! Nach dem Bestätigen erscheint der Eintrag '.$eid.' mit diesen Daten:</font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'" width="125"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Name</font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><input type="text" size="40" name="newname" value="'.$oldname.'"></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'" width="125"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Datum</font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><input type="text" size="40" name="newdatum" value="'.$olddatum.'" readonly></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'" width="125"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">E-Mail</font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><input type="text" size="40" name="newmail" value="'.$oldmail.'"></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'" width="125"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Homepage</font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><input type="text" size="40" name="newurl" value="'.$oldurl.'"></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'" width="125"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">IP-Nummer</font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><input type="text" size="40" name="newip" value="'.$oldip.'" readonly></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'" width="125"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">ICQ UIN</font></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><input type="text" size="40" name="newicq" value="'.$oldicq.'"></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'" width="125" align="left" valign="top"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Kommentar<br><br><br></font>';
smilies();
print '      <br><br></td>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">';
gbcodes2();
print '      <textarea name="kommentar" cols="70" rows="10" onfocus="sel.setSelection(this);" onclick="sel.setSelection(this);" onkeyup="sel.setSelection(this);" onselect="sel.setSelection(this);">'.$oldtext.'</textarea><br>
      <font color="'.$textin.'"><a href="javascript:gbcodes()"><font color="'.$textin.'" face="'.$sart.'" size="1">GB-Codes</a>&nbsp;</font></font><font color="'.$textin.'"><a href="javascript:smilies()"><font color="'.$textin.'" face="'.$sart.'" size="1">Smilies</a></font></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'" width="125"><input type="reset" value="löschen"></td>
      <td bgcolor="'.$zmeintrag.'"><input type="submit" value="speichern"></td>
    </tr>
  </table>
  </center>
</div>
</form>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
}
}
if($action == "editsave"){
$md5pwd = md5("$passwo");
$md5nemo = md5("$nemo");
        if($md5pwd == "$pass" && $md5nemo == "$username"){
$linie = file("./include/eintraege.dat");
$data ="";
$delete ="0";
for($num = 0; $num < count($linie); $num++)
{
$bfile = explode("|",$linie[$num]);
if ($bfile[0] == $eid)
{
$delete = "1";
print '<head>
<title>'.$titel.'</title>
<meta http-equiv="Refresh" content="2; URL='.$PHP_SELF.'">
'.$head.'
'.$css.'
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$tex.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">
'.$body.'
<FONT color="'.$textout.'" SIZE="'.$grosetext.'" FACE="'.$sart.'">
<B>Danke für das Bearbeiten! Wir leiten Sie jetzt zur Übersicht weiter, bitte warten Sie zwei Sekunden.<P></font>
<FONT color="'.$textout.'" SIZE="1" FACE="'.$sart.'">
<A HREF="'.$PHP_SELF.'">Klicken Sie hier, wenn Sie nicht länger warten möchten oder Ihr Browser keine automatische Weiterleitung unterstützt.</A>
</B><br><br>
</FONT>
</body>';
}
$kommentar = str_replace("\r\n", "<br>", $kommentar);
$kommentar = str_replace("\n", "<br>", $kommentar);
$kommentar = str_replace("|", "&#124", $kommentar);
$kommentar = str_replace("\\", "", $kommentar);
if($delete==1)
{
if($eid != "1"){ $data.="$bfile[0]|$newname|$newdatum|$newicq|$newmail|$newurl|$newip|$kommentar\n"; }
if($eid == "1"){ $data.="$bfile[0]|$newname|$newdatum|$newicq|$newmail|$newurl|$newip|$kommentar"; }
$delete="0";
} else {
$data.="$bfile[0]|$bfile[1]|$bfile[2]|$bfile[3]|$bfile[4]|$bfile[5]|$bfile[6]|$bfile[7]";
}
}
$filer = fopen("./include/eintraege.dat","wb+");
fputs($filer,$data);
fclose($filer);
        }
$md5pwd = md5("$passwo");
$md5nemo = md5("$nemo");
        if($md5pwd != "$pass" || $md5nemo != "$username"){
print '<head>
<title>Fehler</title>
'.$head.'
'.$css.'
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">Fehler</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">Sie haben einen falschen Benutzernamen oder Passwort eingegeben,<br>achten Sie auf Groß- und Kleinschriebung!<br>Klicken Sie <a href="javascript:history.go(-1)" target="_self">hier</a>, um zur vorherigen Seite zurückzugelangen.</font></p>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
        }
}
if($action == "viewip"){
print '<head>
<title>'.$name.'s IP angucken</title>';
echo "\n$head\n$css\n";
print '</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">'.$name.'s IP angucken</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">&nbsp;</font></p>
<form method="POST" action="'.$PHP_SELF.'?action=ipview">
<input type="hidden" name="eid" value="'.$eid.'">
<div align="center">
  <center>
<table border="0" cellpadding="'.$cellpadding.'" cellspacing="1" width="550" bgcolor="'.$fabtabrand.'">
    <tr>
      <td bgcolor="'.$zmuber.'" colspan="2"><p align="center"><font color="'.$textin.'" face="'.$sart.'" size="1">Nur wer den Benutzernamen und das Passwort kennt, kann die IP von '.$name.' (Eintrag '.$eid.') angucken</font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Benutzername</font></td>
      <td bgcolor="'.$zmeintrag.'"><p><input type="text" name="nemo" size="20"></p>
      </td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'">Passwort</font></td>
      <td bgcolor="'.$zmeintrag.'"><p><input type="password" name="passwo" size="20"></p>
      </td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'"><input type="reset" value="löschen"></td>
      <td bgcolor="'.$zmeintrag.'"><input type="submit" value="angucken"></td>
    </tr>
  </table>
  </center>
</div>
</form>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
}
if($action == "ipview"){
$md5pwd = md5("$passwo");
$md5nemo = md5("$nemo");
        if($md5pwd == "$pass" && $md5nemo == "$username"){
$linie = file("./include/eintraege.dat");
for($num = 0; $num < count($linie); $num++)
{
$bfile = explode("|",$linie[$num]);
if ($bfile[0] == $eid)
{
$name = "$bfile[1]";
$ip = "$bfile[6]";
}
}
print '<head>
'.$head.'
'.$css.'
<title>'.$name.'s IP angucken</title>
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">'.$name.'s IP angucken</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">&nbsp;</font></p>
<div align="center">
  <center>
<table border="0" cellpadding="'.$cellpadding.'" cellspacing="1" width="550" bgcolor="'.$fabtabrand.'">
    <tr>
      <td bgcolor="'.$zmuber.'" colspan="2">
        <p align="center"><font color="'.$textin.'" face="'.$sart.'" size="1">Vor den Klammern steht der Hostname und in den Klammern die IP</font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'" colspan="2" align="center"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><br>'.$name.'s IP ist <b>'.$ip.'<br><br></font></td>
    </tr>
    <tr>
      <td bgcolor="'.$zmeintrag.'" colspan="2" align="center"><font color="'.$textin.'" face="'.$sart.'" size="'.$grosetext.'"><a href="'.$PHP_SELF.'">Hier</a> gelangen Sie zurück zum Gästebuch</font></td>
    </tr>
  </table>
  </center>
</div>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
        }
$md5pwd = md5("$passwo");
$md5nemo = md5("$nemo");
        if($md5pwd != "$pass" || $md5nemo != "$username"){
print '<head>
<title>Fehler</title>
'.$head.'
'.$css.'
</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$groseuber.'">Fehler</font></p>
<p align="center"><font color="'.$textout.'" face="'.$sart.'" size="'.$grosetext.'">Sie haben einen falschen Benutzernamen oder Passwort eingegeben,<br>achten Sie auf Groß- und Kleinschriebung!<br>Klicken Sie <a href="javascript:history.go(-1)" target="_self">hier</a>, um zur vorherigen Seite zurückzugelangen.</font></p>';
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>';
        }
}
        }
if($online == "0"){
print '<html>
<head>
<title>'.$titel.'</title>';
echo "\n$head\n$css\n";
print '</head>
<body bgcolor="'.$bgcolor.'" background="'.$background.'" text="'.$textout.'" link="'.$link.'" alink="'.$alink.'" vlink="'.$vlink.'">';
if($includev == "Ja"){
echo "\n";
include "./include/oben.inc.php";
}
if($gbttyp == "0"){
$ungbn = "$titel";
}
if($gbttyp == "1"){
$ungbn = '<img src="'.$picurl.'" border="0">';
}
print ''.$body.'
<p align="center"><font color="'.$textout.'" size="'.$groseuber.'" face="'.$sart.'">'.$ungbn.'</font></p>
<p align="center">&nbsp;</p>
<p>';
if($begruescenter == "center"){ echo "<center>"; }
print '<font color="'.$textout.'" size="'.$grosetext.'" face="'.$sart.'">'.$begruesungstxt.'</font></p>
<p><font color="'.$textout.'" size="'.$grosetext.'" face="'.$sart.'">'.$ba.'</font>';
if($begruescenter == "center"){ echo "<center>"; }
print '</p>
<div align="center">
  <center>
<table border="0" cellpadding="'.$cellpadding.'" cellspacing="1" width="'.$tbreite.'" bgcolor="'.$fabtabrand.'">
    <tr>
      <td bgcolor="'.$zmuber.'" colspan="2" align="center"><font color="'.$textin.'" size="'.$grosetext.'" face="'.$sart.'"><b>Offline</b></font></td>
    </tr>';
print '
      <tr>
      <td bgcolor="'.$zmeintragl.'" valign="top" colspan="2" align="center" width="'.$tbreite.'"><font color="'.$textin.'" size="'.$grosetext.'" face="'.$sart.'"><br>'.$offlinetext.'<br><br></font>
      </td></tr>
      </center>
  </table>
</div><br><br>';
if($homepaget == ""){ print '<center><font color="'.$textout.'" size="'.$grosetext.'" face="'.$sart.'"><a href="'.$homepage.'">'.$homepaget1.'</a></font></center>'; }
if($homepaget1 == ""){ print '<center><font color="'.$textout.'" size="'.$grosetext.'" face="'.$sart.'"><a href="'.$homepage1.'">'.$homepaget.'</a></font></center>'; }
if($homepaget1 != "" && $homepaget != ""){ print '<center><font color="'.$textout.'" size="'.$grosetext.'" face="'.$sart.'"><a href="'.$homepage.'">'.$homepaget.'</a> | <a href="'.$homepage1.'">'.$homepaget1.'</a></font></center>'; }
cpyr();
if($includev == "Ja"){
echo "\n";
include "./include/unten.inc.php";
echo "\n";
}
print '</body>
</html>';
}
?>