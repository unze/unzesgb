<?php
// Revision: 1.1
// Name: chmod.php

/*
Chmod-Script für unzes gb ab 3.1.0
by Manuel Schiller
modified by unze
*/

include "./include/config.inc.php";

//////////////////////////
//Dateien aus Ordner "inc"
//////////////////////////
$prozess_Inc[0] = "";
$prozess_Inc[1] = "config.inc.php";
$prozess_Inc[2] = "config1.inc.php";
$prozess_Inc[3] = "config2.inc.php";
$prozess_Inc[4] = "config3.inc.php";
$prozess_Inc[5] = "english.inc.php";
$prozess_Inc[6] = "german.inc.php";
$prozess_Inc[7] = "index.php";
$prozess_Inc[8] = "mailtmpl.inc.php";
$prozess_Inc[9] = "oben.inc.php";
$prozess_Inc[10] = "online.inc.php";
$prozess_Inc[11] = "smilies.inc.php";
$prozess_Inc[12] = "unten.inc.php";
$prozess_Inc[13] = "userdaten.inc.php";
$prozess_Inc[14] = "eintraege.dat";

//////////////////////////
//Dateien aus Basisordner
//////////////////////////
//$prozess_Bas[0] = "";

//////////////////////////
//Sonstiges / Funktionen
//////////////////////////
$vers = "v1.2.0"; // Nicht ändern!
$chmod = "0777";
$prozesse = count($prozess_Inc)+count($prozess_Bas);

///////////////////////////
// Html ausgeben
///////////////////////////

Print '<html>

<head>
<title>Chmod-Script '.$vers.'</title>
<style type="text/css">
body, p, br, a, div, tr, td, th, table {scrollbar-base-color: #46A0E3; color: #124399; font-family: Tahoma; font-size: 10pt;}
A:link {text-decoration: underline; color: #124399;}
A:visited {text-decoration: underline; color: #124399;}
A:active {text-decoration: underline; color: #124399;}
A:hover {text-decoration: none; color: #124399;}
input, select, textarea {background-color: #D6DFF7; color: #215DC6; font-size: 8pt; font-family: Tahoma; border-right: #46A0E3 1px; border-left: #46A0E3 1px; border-top: #46A0E3 1px; border-bottom: #46A0E3 1px; border-style: solid;}
</style>
</head>

<body>
<p align="center"><font size="5" color="#215DC6">Chmod-Script '.$vers.'</font></p>
<p align="center">&nbsp;</p>
<center>
  <table border="0" cellpadding="2" cellspacing="1" bgcolor="#46A0E3" width="550">
    <tr>
      <td bgcolor="#D6DFF7">
      <p align="center"><b><font color="#215DC6">Chmod von insgesamt '.$prozesse.' unzes gb '.$version.' Dateien</font></b></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;
              <center>';
$bsys = "".php_uname();
$bsystem = explode(" ",$bsys);
if($bsystem[0] != "Windows"){
         if(function_exists("chmod")){
         print '        <table border="0" cellspacing="1" bgcolor="#FFFFFF" width="530">
                   <tr>
                     <td bgcolor="#D6DFF7" align="center" width="475"><font color="#215DC6">Prozess</font></td>
                     <td bgcolor="#D6DFF7" width="65" align="center"><font color="#215DC6">Status</font></td>
                   </tr>
                   <tr>';
                  for($i = 0; $i <= Count($prozess_Bas) - 1; $i++)
                  {
                          echo "<td bgcolor=\"#FFFFFF\" width=\"500\">CHMOD $chmod von Datei: $prozess_Bas[$i]</td><td bgcolor=\"#FFFFFF\" width=\"80\"><center><font size=\"2\" face=\"Tahoma\">";
                    if(chmod("$prozess_Bas[$i]", "$chmod")
                      or die("Fehler")){
                            echo "Ausgeführt";
                    }else{
                            echo "Fehler";
                    }
                    echo "</font></center></td></tr>";
                  }
                  for($i = 0; $i <= Count($prozess_Inc) - 1; $i++)
                  {
                          echo "<td bgcolor=\"#FFFFFF\" width=\"500\">CHMOD $chmod von Datei: include/$prozess_Inc[$i]</td><td bgcolor=\"#FFFFFF\" width=\"80\"><center><font size=\"2\" face=\"Tahoma\">";
                    if(chmod("include/$prozess_Inc[$i]", "$chmod")
                      or die("Fehler")){
                            echo "Ausgeführt";
                    }else{
                            echo "Fehler";
                    }
                    echo "</font></center></td></tr>";
                  }
         print '</table>';
         }
         if(!function_exists("chmod")){ print '<br>Ihr System unterstützt kein PHP-Chmod!<br>Script gestoppt!<br><br>'; }
}
if($bsystem[0] == "Windows"){ print '<br>Unter Windows hat dieses Script keinen Effekt!<br>Script gestoppt!<br><br>'; }
        print'<br></center>
        </td>
    </tr>
  </table>
  <font size="1"><br><br>
  Chmod-Script '.$vers.' für unzes gb '.$version.'<br>
  &copy; by Manuel Schiller und Daniel Köhler<br><br></font>
  </center>
</body>

</html>';
?>