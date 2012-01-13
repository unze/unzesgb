<?php
// Revision: 1.4
// Name: functions.inc.php

function psmilies(){
global $kommentar, $smilinsg;
// Smilies
$sfile = fopen('./include/smilies.inc.php','r');
while (!feof($sfile))
{
$sline = fgets($sfile,filesize("./include/smilies.inc.php"));
$sline = trim($sline);
$stext = explode("|",$sline);
     for($i = 0; $i < $smilinsg; $i++){
     $kommentar = str_replace("$stext[2]", "<img src='images/smilies/$stext[3]' alt='$stext[4]'>", $kommentar);
     }
}
}

function odd($var){
    return ($var % 2 == 1);
}

function even($var){
    return ($var % 2 == 0);
}

function datum(){
global $offset, $zeitzone;
$MONTH=array ("blank","Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember"); // Namen der Monate
$MON=date("n"); // Monat
$zeit= date("H")+$offset; // Stunde minus Offset
$datum=date("d").". ".$MONTH[$MON]." ".date("Y"); // Datum insgesamt
$time= date("$zeit:i"); // Zeit
$zeitinsg = "erstellt am $datum um $time Uhr $zeitzone";
return $zeitinsg;
}

function nummer(){
$filed = fopen('./include/eintraege.dat','r');
$line = fgets($filed,filesize("./include/eintraege.dat"));
$line = trim($line);
$text = explode("|",$line);
$numb = $text[0];
$nummer = ("$numb"+"1");
return $nummer;
}

function gbcodes1(){
print '<select size="1">
<option selected>SIZE</option>
<option onclick="sel.replaceSelection(\'[size=1]\', \'[/size]\')">1 (8pt)</option>
<option onclick="sel.replaceSelection(\'[size=2]\', \'[/size]\')">2 (10pt)</option>
<option onclick="sel.replaceSelection(\'[size=3]\', \'[/size]\')">3 (12pt)</option>
<option onclick="sel.replaceSelection(\'[size=4]\', \'[/size]\')">4 (14pt)</option>
<option onclick="sel.replaceSelection(\'[size=5]\', \'[/size]\')">5 (18pt)</option>
<option onclick="sel.replaceSelection(\'[size=6]\', \'[/size]\')">6 (24pt)</option>
<option onclick="sel.replaceSelection(\'[size=7]\', \'[/size]\')">7 (36pt)</option>
</select>
<select size="1">
<option selected>FONT</option>
<option onclick="sel.replaceSelection(\'[font=arial]\', \'[/font]\')">Arial</option>
<option onclick="sel.replaceSelection(\'[font=courier]\', \'[/font]\')">Courier</option>
<option onclick="sel.replaceSelection(\'[font=courier new]\', \'[/font]\')">Courier New</option>
<option onclick="sel.replaceSelection(\'[font=helvetica]\', \'[/font]\')">Helvetica</option>
<option onclick="sel.replaceSelection(\'[font=tahoma]\', \'[/font]\')">Tahoma</option>
<option onclick="sel.replaceSelection(\'[font=times new roman]\', \'[/font]\')">Times New Roman</option>
<option onclick="sel.replaceSelection(\'[font=verdana]\', \'[/font]\')">Verdana</option>
</select>
<br><img src="images/leer.gif" heigth="2" width="2"><br>
<input type="button" title="fett" value=" B " onclick="sel.replaceSelection(\'[b]\', \'[/b]\');">
<input type="button" title="kursiv" value=" I " onclick="sel.replaceSelection(\'[i]\', \'[/i]\');">
<input type="button" title="'.$dq.'" value=" U " onclick="sel.replaceSelection(\'[u]\', \'[/u]\');">
<input type="button" title="Hyperlink" value="www" onclick="sel.replaceSelection(\'[url=http://]\', \'[/url]\');">
<input type="button" title="E-Mail Adresse" value=" @ " onclick="sel.replaceSelection(\'[email=@]\', \'[/email]\');">
<input type="button" title="Bild einfügen" value="IMG" onclick="sel.replaceSelection(\'[img]\', \'[/img]\');">
<br><img src="images/leer.gif" heigth="2" width="2"><br>
<select size="1">
<option selected>COLOR</option>
<option onclick="sel.replaceSelection(\'[color=skyblue]\', \'[/color]\')" style="color:skyblue;">sky blue</option>
<option onclick="sel.replaceSelection(\'[color=royalblue]\', \'[/color]\')" style="color:royalblue;">royal blue</option>
<option onclick="sel.replaceSelection(\'[color=blue]\', \'[/color]\')" style="color:blue;">blue</option>
<option onclick="sel.replaceSelection(\'[color=darkblue]\', \'[/color]\')" style="color:darkblue;">dark-blue</option>
<option onclick="sel.replaceSelection(\'[color=orange]\', \'[/color]\')" style="color:orange;">orange</option>
<option onclick="sel.replaceSelection(\'[color=orangered]\', \'[/color]\')" style="color:orangered;">orange-red</option>
<option onclick="sel.replaceSelection(\'[color=crimson]\', \'[/color]\')" style="color:crimson;">crimson</option>
<option onclick="sel.replaceSelection(\'[color=red]\', \'[/color]\')" style="color:red;">red</option>
<option onclick="sel.replaceSelection(\'[color=firebrick]\', \'[/color]\')" style="color:firebrick;">firebrick</option>
<option onclick="sel.replaceSelection(\'[color=darkred]\', \'[/color]\')" style="color:darkred;">dark red</option>
<option onclick="sel.replaceSelection(\'[color=green]\', \'[/color]\')" style="color:green;">green</option>
<option onclick="sel.replaceSelection(\'[color=limegreen]\', \'[/color]\')" style="color:limegreen;">limegreen</option>
<option onclick="sel.replaceSelection(\'[color=seagreen]\', \'[/color]\')" style="color:seagreen;">sea-green</option>
<option onclick="sel.replaceSelection(\'[color=deeppink]\', \'[/color]\')" style="color:deeppink;">deeppink</option>
<option onclick="sel.replaceSelection(\'[color=tomato]\', \'[/color]\')" style="color:tomato;">tomato</option>
<option onclick="sel.replaceSelection(\'[color=coral]\', \'[/color]\')" style="color:coral;">coral</option>
<option onclick="sel.replaceSelection(\'[color=purple]\', \'[/color]\')" style="color:purple;">purple</option>
<option onclick="sel.replaceSelection(\'[color=indigo]\', \'[/color]\')" style="color:indigo;">indigo</option>
<option onclick="sel.replaceSelection(\'[color=burlywood]\', \'[/color]\')" style="color:burlywood;">burlywood</option>
<option onclick="sel.replaceSelection(\'[color=sandybrown]\', \'[/color]\')" style="color:sandybrown;">sandy brown</option>
<option onclick="sel.replaceSelection(\'[color=sienna]\', \'[/color]\')" style="color:sienna;">sienna</option>
<option onclick="sel.replaceSelection(\'[color=chocolate]\', \'[/color]\')" style="color:chocolate;">chocolate</option>
<option onclick="sel.replaceSelection(\'[color=teal]\', \'[/color]\')" style="color:teal;">teal</option>
<option onclick="sel.replaceSelection(\'[color=silver]\', \'[/color]\')" style="color:silver;">silver</option></select>
</select>
<select size="1">
<option selected>MARK</option>
<option onclick="sel.replaceSelection(\'[mark=skyblue]\', \'[/mark]\')" style="color:skyblue;">sky blue</option>
<option onclick="sel.replaceSelection(\'[mark=royalblue]\', \'[/mark]\')" style="color:royalblue;">royal blue</option>
<option onclick="sel.replaceSelection(\'[mark=blue]\', \'[/mark]\')" style="color:blue;">blue</option>
<option onclick="sel.replaceSelection(\'[mark=darkblue]\', \'[/mark]\')" style="color:darkblue;">dark-blue</option>
<option onclick="sel.replaceSelection(\'[mark=orange]\', \'[/mark]\')" style="color:orange;">orange</option>
<option onclick="sel.replaceSelection(\'[mark=orangered]\', \'[/mark]\')" style="color:orangered;">orange-red</option>
<option onclick="sel.replaceSelection(\'[mark=crimson]\', \'[/mark]\')" style="color:crimson;">crimson</option>
<option onclick="sel.replaceSelection(\'[mark=red]\', \'[/mark]\')" style="color:red;">red</option>
<option onclick="sel.replaceSelection(\'[mark=firebrick]\', \'[/mark]\')" style="color:firebrick;">firebrick</option>
<option onclick="sel.replaceSelection(\'[mark=darkred]\', \'[/mark]\')" style="color:darkred;">dark red</option>
<option onclick="sel.replaceSelection(\'[mark=green]\', \'[/mark]\')" style="color:green;">green</option>
<option onclick="sel.replaceSelection(\'[mark=limegreen]\', \'[/mark]\')" style="color:limegreen;">limegreen</option>
<option onclick="sel.replaceSelection(\'[mark=seagreen]\', \'[/mark]\')" style="color:seagreen;">sea-green</option>
<option onclick="sel.replaceSelection(\'[mark=deeppink]\', \'[/mark]\')" style="color:deeppink;">deeppink</option>
<option onclick="sel.replaceSelection(\'[mark=tomato]\', \'[/mark]\')" style="color:tomato;">tomato</option>
<option onclick="sel.replaceSelection(\'[mark=coral]\', \'[/mark]\')" style="color:coral;">coral</option>
<option onclick="sel.replaceSelection(\'[mark=purple]\', \'[/mark]\')" style="color:purple;">purple</option>
<option onclick="sel.replaceSelection(\'[mark=indigo]\', \'[/mark]\')" style="color:indigo;">indigo</option>
<option onclick="sel.replaceSelection(\'[mark=burlywood]\', \'[/mark]\')" style="color:burlywood;">burlywood</option>
<option onclick="sel.replaceSelection(\'[mark=sandybrown]\', \'[/mark]\')" style="color:sandybrown;">sandy brown</option>
<option onclick="sel.replaceSelection(\'[mark=sienna]\', \'[/mark]\')" style="color:sienna;">sienna</option>
<option onclick="sel.replaceSelection(\'[mark=chocolate]\', \'[/mark]\')" style="color:chocolate;">chocolate</option>
<option onclick="sel.replaceSelection(\'[mark=teal]\', \'[/mark]\')" style="color:teal;">teal</option>
<option onclick="sel.replaceSelection(\'[mark=silver]\', \'[/mark]\')" style="color:silver;">silver</option></select>
</select>';
}

$a0001 = "**************************************************";
$a0002 = "***";
$a0003 = "http://www.unze.net/";
$a0004 = "created by unzes gb ";
$a0005 = "Copyright (c) 2001 - 2012 by Daniel Köhler";
$a0006 = "<!--";
$a0007 = "//-->";

function gbcodes2(){
print '<select size="1">
<option selected>SIZE</option>
<option onclick="sel.replaceSelection(\'[size=1]\', \'[/size]\')">1 (8pt)</option>
<option onclick="sel.replaceSelection(\'[size=2]\', \'[/size]\')">2 (10pt)</option>
<option onclick="sel.replaceSelection(\'[size=3]\', \'[/size]\')">3 (12pt)</option>
<option onclick="sel.replaceSelection(\'[size=4]\', \'[/size]\')">4 (14pt)</option>
<option onclick="sel.replaceSelection(\'[size=5]\', \'[/size]\')">5 (18pt)</option>
<option onclick="sel.replaceSelection(\'[size=6]\', \'[/size]\')">6 (24pt)</option>
<option onclick="sel.replaceSelection(\'[size=7]\', \'[/size]\')">7 (36pt)</option>
</select>
<select size="1">
<option selected>FONT</option>
<option onclick="sel.replaceSelection(\'[font=arial]\', \'[/font]\')">Arial</option>
<option onclick="sel.replaceSelection(\'[font=courier]\', \'[/font]\')">Courier</option>
<option onclick="sel.replaceSelection(\'[font=courier new]\', \'[/font]\')">Courier New</option>
<option onclick="sel.replaceSelection(\'[font=helvetica]\', \'[/font]\')">Helvetica</option>
<option onclick="sel.replaceSelection(\'[font=tahoma]\', \'[/font]\')">Tahoma</option>
<option onclick="sel.replaceSelection(\'[font=times new roman]\', \'[/font]\')">Times New Roman</option>
<option onclick="sel.replaceSelection(\'[font=verdana]\', \'[/font]\')">Verdana</option>
</select>
<select size="1">
<option selected>COLOR</option>
<option onclick="sel.replaceSelection(\'[color=skyblue]\', \'[/color]\')" style="color:skyblue;">sky blue</option>
<option onclick="sel.replaceSelection(\'[color=royalblue]\', \'[/color]\')" style="color:royalblue;">royal blue</option>
<option onclick="sel.replaceSelection(\'[color=blue]\', \'[/color]\')" style="color:blue;">blue</option>
<option onclick="sel.replaceSelection(\'[color=darkblue]\', \'[/color]\')" style="color:darkblue;">dark-blue</option>
<option onclick="sel.replaceSelection(\'[color=orange]\', \'[/color]\')" style="color:orange;">orange</option>
<option onclick="sel.replaceSelection(\'[color=orangered]\', \'[/color]\')" style="color:orangered;">orange-red</option>
<option onclick="sel.replaceSelection(\'[color=crimson]\', \'[/color]\')" style="color:crimson;">crimson</option>
<option onclick="sel.replaceSelection(\'[color=red]\', \'[/color]\')" style="color:red;">red</option>
<option onclick="sel.replaceSelection(\'[color=firebrick]\', \'[/color]\')" style="color:firebrick;">firebrick</option>
<option onclick="sel.replaceSelection(\'[color=darkred]\', \'[/color]\')" style="color:darkred;">dark red</option>
<option onclick="sel.replaceSelection(\'[color=green]\', \'[/color]\')" style="color:green;">green</option>
<option onclick="sel.replaceSelection(\'[color=limegreen]\', \'[/color]\')" style="color:limegreen;">limegreen</option>
<option onclick="sel.replaceSelection(\'[color=seagreen]\', \'[/color]\')" style="color:seagreen;">sea-green</option>
<option onclick="sel.replaceSelection(\'[color=deeppink]\', \'[/color]\')" style="color:deeppink;">deeppink</option>
<option onclick="sel.replaceSelection(\'[color=tomato]\', \'[/color]\')" style="color:tomato;">tomato</option>
<option onclick="sel.replaceSelection(\'[color=coral]\', \'[/color]\')" style="color:coral;">coral</option>
<option onclick="sel.replaceSelection(\'[color=purple]\', \'[/color]\')" style="color:purple;">purple</option>
<option onclick="sel.replaceSelection(\'[color=indigo]\', \'[/color]\')" style="color:indigo;">indigo</option>
<option onclick="sel.replaceSelection(\'[color=burlywood]\', \'[/color]\')" style="color:burlywood;">burlywood</option>
<option onclick="sel.replaceSelection(\'[color=sandybrown]\', \'[/color]\')" style="color:sandybrown;">sandy brown</option>
<option onclick="sel.replaceSelection(\'[color=sienna]\', \'[/color]\')" style="color:sienna;">sienna</option>
<option onclick="sel.replaceSelection(\'[color=chocolate]\', \'[/color]\')" style="color:chocolate;">chocolate</option>
<option onclick="sel.replaceSelection(\'[color=teal]\', \'[/color]\')" style="color:teal;">teal</option>
<option onclick="sel.replaceSelection(\'[color=silver]\', \'[/color]\')" style="color:silver;">silver</option></select>
</select>
<br><img src="images/leer.gif" heigth="2" width="2"><br>
<input type="button" title="fett" value=" B " onclick="sel.replaceSelection(\'[b]\', \'[/b]\');">
<input type="button" title="kursiv" value=" I " onclick="sel.replaceSelection(\'[i]\', \'[/i]\');">
<input type="button" title="'.$dq.'" value=" U " onclick="sel.replaceSelection(\'[u]\', \'[/u]\');">
<input type="button" title="Hyperlink" value="www" onclick="sel.replaceSelection(\'[url=http://]\', \'[/url]\');">
<input type="button" title="E-Mail Adresse" value=" @ " onclick="sel.replaceSelection(\'[email=@]\', \'[/email]\');">
<input type="button" title="Bild einfügen" value="IMG" onclick="sel.replaceSelection(\'[img]\', \'[/img]\');">';
}

function smilies(){
global $zeigesmil, $fabtabrand, $zmuber, $textin, $sart, $zmeintrag;
$showsmil = "";
$sfile = fopen("./include/smilies.inc.php","r");
while (!feof($sfile))
{
$sline = fgets($sfile,filesize("./include/smilies.inc.php"));
$sline = trim($sline);
$stext = explode("|",$sline);
     if($stext[1] == "1"){
     $showsmil = "<a href=\"javascript:void(0)\" onclick=\"sel.replaceSelection(' $stext[2] ')\"><img src=\"images/smilies/$stext[3]\" border=\"0\" alt=\"$stext[4]\"></a>\n".$showsmil;
     }
}
$showsmil = "\n".$showsmil;
print '<div align="center"><center><table border="0" cellpadding="2" cellspacing="1" width="70" bgcolor="'.$fabtabrand.'"><tr><td valign="top" align="center" bgcolor="'.$zmuber.'"><font color="'.$textin.'" size="1" face="'.$sart.'"><b>Smilies</b></font></td></tr><tr><td valign="top" align="center" bgcolor="'.$zmeintrag.'">'.$showsmil.'</td></tr></table></center></div>';
}

function copyright(){
  global $cpy;
$cpy = str_replace("[a]", "<br>", $cpy);
$cpy = str_replace("[b]", "<center>", $cpy);
$cpy = str_replace("[c]", "</center>", $cpy);
$cpy = str_replace("[d]", "</a>", $cpy);
$cpy = str_replace("[e]", "</font>", $cpy);
$cpy = str_replace("[f]", "<font face='", $cpy);
$cpy = str_replace("[g]", "' size='1'>", $cpy);
$cpy = str_replace("[h]", "powered by ", $cpy);
$cpy = str_replace("[i]", "<a href='http://www.unze.net/' target='_blank'>", $cpy);
$cpy = str_replace("[j]", "<font size='1'>", $cpy);
$cpy = str_replace("[k]", "unzes gb", $cpy);
$cpy = str_replace("[l]", "&copy; 2001 - 2012 by Daniel Köhler", $cpy);
}

function parsekommentar(){
global $kommentar, $dankm, $benachm, $htmlc, $wordlength, $kommfarb, $smilinsg, $replaceword, $gbc, $wds, $name, $homepage, $homepaget, $tbreite, $breitesmn;
if($wordlength == ""){ $wordlength="50"; }
$kommentar = str_replace("<i>", "[i]", $kommentar);
$kommentar = str_replace("</i>", "[/i]", $kommentar);
$kommentar = str_replace("<b>", "[b]", $kommentar);
$kommentar = str_replace("</b>", "[/b]", $kommentar);
$kommentar = str_replace("</font>", "[/font]", $kommentar);
$kommentar = str_replace("<br>", "[br]", $kommentar);
if($htmlc == "Aus"){ $kommentar = strip_tags($kommentar); }
if($htmlc == "Aus"){ $name = strip_tags($name); }
if($htmlc == "Aus"){ $url = strip_tags($url); }
if($htmlc == "Aus"){ $mail = strip_tags($mail); }
$kommentar = str_replace("[i]", "<i>", $kommentar);
$kommentar = str_replace("[/i]", "</i>", $kommentar);
$kommentar = str_replace("[b]", "<b>", $kommentar);
$kommentar = str_replace("[/b]", "</b>", $kommentar);
$kommentar = str_replace("[/font]", "</font>", $kommentar);
$kommentar = str_replace("[br]", "<br>", $kommentar);
$bword = explode(",",$wds);
$anz = count($bword);
for($i = 0; $i < $anz; $i++){ $badw1[] = $bword[$i]; }
for($i = 0; $i < $anz; $i++){ $badw2[] = strtolower($bword[$i]); }
for($i = 0; $i < $anz; $i++){ $badw3[] = strtoupper($bword[$i]); }
for($i = 0; $i < $anz; $i++){
$name = str_replace("$badw1[$i]", "$replaceword", $name);
$name = str_replace("$badw2[$i]", "$replaceword", $name);
$name = str_replace("$badw3[$i]", "$replaceword", $name);
$kommentar = str_replace("$badw1[$i]", "$replaceword", $kommentar);
$kommentar = str_replace("$badw2[$i]", "$replaceword", $kommentar);
$kommentar = str_replace("$badw3[$i]", "$replaceword", $kommentar);
}
$kommentar = str_replace("\n", "<br>", $kommentar);
//GB Codes
$kommentar = str_replace("\$Kommentar von ", "<font color=$kommfarb>Kommentar von ", $kommentar);
$kommentar = str_replace("\$Kommentar:", "<font color=$kommfarb>Kommentar:</font>", $kommentar);
if($gbc == "An"){
$kommentar = str_replace("[i]", "<i>", $kommentar);
$kommentar = str_replace("[/i]", "</i>", $kommentar);
$kommentar = str_replace("[b]", "<b>", $kommentar);
$kommentar = str_replace("[/b]", "</b>", $kommentar);
$kommentar = str_replace("[u]", "<u>", $kommentar);
$kommentar = str_replace("[/u]", "</u>", $kommentar);
$kommentar = str_replace("[img]", '<img src="', $kommentar);
$kommentar = str_replace("[/img]", '">', $kommentar);
$kommentar = str_replace("[center]", '<center>', $kommentar);
$kommentar = str_replace("[/center]", '</center>', $kommentar);
$kommentar = eregi_replace("\\[url\\]www\.([^\\[]*)\\[img\\]www\.([^\\[\\?\\&]*)\\[/img\\]\\[/url\\]","<a href=\"http://www.\\1\" target=_blank><img src=\"http://www.\\2\" border=\"0\"></a>",$kommentar);
$kommentar = eregi_replace("\\[url\\]http://([^\\[]*)\\[img\\]http://([^\\[\\?\\&]*)\\[/img\\]\\[/url\\]","<a href=\"http://\\1\" target=_blank><img src=\"http://\\2\" border=\"0\"></a>",$kommentar);
$kommentar = eregi_replace("\\[url\\]www\.([^\\[]*)\\[/url\\]","<a href=\"http://www.\\1\" target=_blank>\\1</a>",$kommentar);
$kommentar = eregi_replace("\\[url\\]([^\\[]*)\\[/url\\]","<a href=\"\\1\" target=_blank>\\1</a>",$kommentar);
$kommentar = eregi_replace("\\[url=([^\\[]+)\\]([^\\[]+)\\[\\/url\\]","<a href=\"\\1\" target=\"_blank\">\\2</a>",$kommentar);
$kommentar = eregi_replace("\\[email\\]([^\\[]+)\\[/email\\]","<a href=\"mailto:\\1\">\\1</a>",$kommentar);
$kommentar = eregi_replace("\\[email=([^\\[]+)\\]([^\\[]+)\\[\\/email\\]","<a href=\"mailto:\\1\">\\2</a>",$kommentar);
$kommentar = eregi_replace("\\[url=http://\\]\\[/url\\]","<a href=\"$homepage\" target=_blank>$homepaget</a>",$kommentar);
$kommentar = eregi_replace("\\[url=https://\\]\\[/url\\]","<a href=\"$homepage\" target=_blank>$homepaget</a>",$kommentar);
$kommentar = eregi_replace("\\[url=ftp://\\]\\[/url\\]","<a href=\"$homepage\" target=_blank>$homepaget</a>",$kommentar);
$kommentar = eregi_replace("\\[url=www\.\\]\\[/url\\]","<a href=\"$homepage\" target=_blank>$homepaget</a>",$kommentar);
$kommentar = eregi_replace("\\[url=\\]\\[/url\\]","<a href=\"$homepage\" target=_blank>$homepaget</a>",$kommentar);
$kommentar = eregi_replace("\\[url=([^\\[]+)\\]\\[/url\\]","<a href=\"\\1\" target=_blank>\\1</a>",$kommentar);
$kommentar = eregi_replace("\\[color=([^\\[]+)\\]",'<font color="\\1">',$kommentar);
$kommentar = eregi_replace("\\[size=([^\\[]+)\\]",'<font size="\\1">',$kommentar);
$kommentar = eregi_replace("\\[font=([^\\[]+)\\]",'<font face="\\1">',$kommentar);
$kommentar = eregi_replace("\\[mark=([^\\[]+)\\]",'<span style="background-color: \\1">',$kommentar);
$kommentar = str_replace("[/color]", '</font>', $kommentar);
$kommentar = str_replace("[/size]", '</font>', $kommentar);
$kommentar = str_replace("[/font]", '</font>', $kommentar);
$kommentar = str_replace("[/mark]", '</span>', $kommentar);
$kommentar = wordwrap("$kommentar", "$wordlength", "\n", 1);
}
}

?>