<?php
// Revision: 1.1
// Name: index.php

include "./global.php";
include "../include/config1.inc.php";
include "../include/config2.inc.php";
include "../include/config3.inc.php";
include "../include/userdaten.inc.php";
include "../include/mailtmpl.inc.php";
include "../include/functions.inc.php";
include "../include/online.inc.php";
include "../include/config.inc.php";
echo '<html>

<head>
<title>unzes gb '.$version.' Administrationslogin</title>
<LINK REL="stylesheet" href="style.css">
</head>
<body>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>';
if($logged == "2"){ print '<font color="red"><center>Erfolgreich ausgeloggt!</center></font>'; }
if($logged == "1"){ print '<font color="red"><center>Sie haben einen falschen Benutzernamen oder Passwort eingegeben,<br>achten Sie auf Groﬂ- und Kleinschriebung!</center></font>'; }
print '<form method="POST" action="admin.php?action=frame">
<div align="center">
  <center>
    <table border="0" cellpadding="2" cellspacing="1" width="333" bgcolor="#46A0E3">
       <tr>
         <td bgcolor="#D6DFF7" colspan="2" align="center"><b><color="#215DC6">unzes gb '.$version.' Administrationslogin</b></td>
       </tr>
       <tr>
         <td bgcolor="#FFFFFF">Benutzername</td>
         <td bgcolor="#FFFFFF"><input type="text" name="nemo" size="25"></td>
       </tr>
       <tr>
         <td bgcolor="#FFFFFF">Passwort</td>
         <td bgcolor="#FFFFFF"><input type="password" name="pwd" size="25"></td>
       </tr>
       <tr>
         <td bgcolor="#FFFFFF"><input type="reset" value="lˆschen" name="lˆschen"></td>
         <td bgcolor="#FFFFFF"><input type="submit" value=" weiter " name=" weiter "></td>
       </tr>
    </table>
  </center>
</div>
</form>';
cpyr();
print '<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
</body>

</html>';
?>