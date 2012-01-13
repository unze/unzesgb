// Revision: 1.1
// Name: popuphilfe.js

function hilfe(text){
  alert(text);
}
function newcolor(button,color){
  button.style.backgroundColor = color;
}
function newpic(button,picture){
  button.style.background = "url(../images/smilies/"+ picture +")";
}
function newalt(button,alttext){
  button.title = alttext;
}

startzahl	= "Bei dieser Zahl wird das Nummerieren gestartet, d.h. der erste Eintrag bekommt diese Nummer.";
nummerieren	= "Den Eintr�gen werden neue Nummern zugewiesen, sinnvoll, wenn man z.B. einzelne Eintr�ge gel�scht hat.";
guestbookname	= "Der Name des G�stebuchs, welcher als Titel benutzt wird";
bildurl		= "Falls der Titel des GBs als Bild angezeigt werden soll, hier die URL zum Bild angeben";
titletype	= "Titel des G�stebuches, falls Bild, die URL zum Bild angeben";
serveroffset	= "Zeitunterschied zum Server in Stunden";
timezone	= "Zeitzone, welche benutzt werden soll, Deutschland liegt in der MEZ (Mittel Europ�ische Zeitzone)";
welcometext	= "Dieser Text wird unter dem Titel als Begr��ung angezeigt";
notification	= "Wenn diese Option eingeschaltet ist, wird bei jedem neuen Eintrag eine Mail verschickt";
thank		= "Bei An bekommt der Besucher eine Mail mit Dankestext";
notimail	= "An diese Adresse wir die Benachrichtigungsmail geschickt, mehrere Adressen mit ; trennen";
url1		= "Die URL f�r den ersten Link, der direkt unter dem G�stebuch angezeigt wird (Im Textfeld dahinter steht der Zielframe, bei einer E-Mail Adresse leer lassen und 'mailto:' vor die Adresse schreiben)";
title1		= "Der Titel f�r den ersten Link, der direkt unter dem G�stebuch angezeigt wird";
url2		= "Die URL f�r den zweiten Link, der direkt unter dem G�stebuch angezeigt wird (Im Textfeld dahinter steht der Zielframe, bei einer E-Mail Adresse leer lassen und 'mailto:' vor die Adresse schreiben)";
title2		= "Der Titel f�r den zweiten Link, der direkt unter dem G�stebuch angezeigt wird";
maxentrys	= "Die Anzahl der Eintr�ge, die auf einer Seite angezeigt werden sollen";
indvhead	= "Dieser Text wird zwischen <head> und </head> gesetzt";
indvbody	= "Dieser Text wird direkt nach <body> eingesetzt";
adminlink	= "Bei Ja wird unter den Beitr�gen ein Link zur Administration angezeigt";
htmlcode	= "Wenn diese Option deaktiviert ist, werden alle HTML Tags aus den Eintr�gen entfernt";
gbcode		= "Wenn diese Option deaktiviert ist, werden die GB-Codes nicht umgewandelt";
floodsperre	= "Wenn diese Option aktiviert ist, kann man erst nach einer bestimmten Zeit wieder einen Eintrag erstellen";
floodtime	= "Hier kann man die Zeit der Flood-Sperre einstellen, Angabe in Minuten (12 Stunden = 720 Minuten)";
badwordlist	= "Diese W�rter werden durch das Replace-Word ersetzt, W�rter mit Kommata trennen";
replaceword	= "Durch dieses Wort werden die Badwords ersetzt";
commente	= "Auf diese Anzahl von Buchstaben wird das Kommentar beim Eintragen begrenzt (1000-2000)";
namee		= "Auf diese Anzahl von Buchstaben wird der Name beim Eintragen begrenzt (25-50)";
emaile		= "Auf diese Anzahl von Buchstaben wird die E-Mail Adresse beim Eintragen begrenzt (25-50)";
homepagee	= "Auf diese Anzahl von Buchstaben wird die Homepage URL beim Eintragen begrenzt (25-50)";
icquine		= "Auf diese Anzahl von Buchstaben wird die ICQ Nummer beim Eintragen begrenzt (10-50)";
worde		= "Auf diese Anzahl von Buchstaben werden die W�rter der Eintr�ge begrenzt (Um die Tabellenbreite nicht zu sprengen, 50-75)";
bgcolor		= "Hintergrundfarbe aller Seiten";
txtcit		= "Farbe aller Texte innerhalb von Tabellen";
txtcat		= "Farbe aller Texte au�erhalb von Tabellen";
commentcol	= "Dies ist die Farbe des Textes 'Kommentar von xxx:'";
linkcol		= "Farbe aller Links";
alinkcol	= "Farbe aller aktiven Links";
vlinkcol	= "Farbe aller besuchten Links";
hlinkcol	= "Farbe aller Links bei MouseOver";
fontface	= "Schriftart aller Texte (Arial, Courier, Helvetica, Tahoma, Verdana)";
fontsizeu	= "Gr��e aller �berschriften (4-6)";
fontsize	= "Gr��e aller Texte (2-3)";
bgpic		= "Hintergrundbild aller Seiten, falls keins: Feld leer lassen";
cssfface	= "Schriftart aller Formfelder (Arial, Courier, Helvetica, Tahoma, Verdana [Mehrere mit Kommata trennen])";
csscolor	= "Farbe aller Formfelder";
cssfcolor	= "Schriftfarbe aller Formfelder";
cssfsize	= "Schriftgr��e aller Formfelder (In pt, 8-10)";
tablewid	= "Breite der Tabelle auf der GB-Startseite, Angabe auch in Prozent m�glich";
cellwidl	= "Breite der Eintragsspalte links auf der GB-Startseite, Angabe auch in Prozent m�glich. Rechts wird automatisch ermittelt (100-250)";
cellpadding	= "Rand nach innen aller Tabellen (1-3)";
bordercolor	= "Farbe aller Tabellen- und Zellenr�nder";
cellbgcolor	= "Hintergrundfarbe der Zellen bei allen Tabellen, au�er auf der GB-Startseite";
cellucolor	= "Hintergrundfarbe aller Zellen mit �berschrift";
entrybgcol1	= "Hintergrundfarbe der Eintr�ge mit graden Zahlen auf der GB-Startseite";
entrybgcol2	= "Hintergrundfarbe der Eintr�ge mit ungraden Zahlen auf der GB-Startseite";
cellbgcolw	= "Hintergrundfarbe der Zellen mit den Seitenlinks";
includes	= "Wenn diese Option aktiviert ist, werden oberhalb und unterhalb des GBs die Dateien oben.inc.php und unten.inc.php eingebunden";
gzip		= "Wenn diese Option aktiviert ist, werden die HTML-Daten an den Surfer komprimiert gesendet";
offlinetext	= "Dieser Text wird angezeigt, wenn sich das G�stebuch im Offlinemodus befindet";
gbstat		= "Status des G�stebuchs";
username	= "Dies ist der Benutzername f�r die Administration und alle Funktionen im G�stebuch, bei Bedarf einfach �ndern";
password1	= "Dies ist das Passwort f�r die Administration und alle Funktionen im G�stebuch, bei Bedarf einfach �ndern";
password2	= "Zur Sicherheit das Passwort nochmal";
smilpic		= "Nur der Name des Smilies muss angegeben werden, der Smilie muss im 'Smilie'-Verzeichnis liegen";
smilers		= "Statt diesem Text erscheint der Smilie. Nur eine Zeichenkette";
smilbesch	= "Erscheint als alt-Text";
smilwich	= "Wenn diese Option aktiviert ist, wird der Smilie als wichtiger Smilie behandelt und auf der Eintragen Seite in der Smilietabelle angezeigt";
indvcss     = "Hier kann man sein eigenes CSS definieren, ohne die <style>-Tags!";
scrollcol   = "Hier kann man die Farbe der Scrollbar ver�ndern";




