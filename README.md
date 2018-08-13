# multipdfdownloader

____README_____

V 0.1.1


___English___
This app was created mainly for students of the FH Dortmund, Germany.

Our library has some books available as PDF ebooks. However, sometimes, you have
to download every single chapter by itself, which annoys me. So I decided to 
make an app that downloads all the PDF files at once and puts them together into 
one file.

So far, the base functionality of downloading PDF files from an HTML pages direct
download links and merging them into one (using PDFtk Server) has been finished.
The file will be saved in the pdf folder in the server. The file name will 
either be an ISBN extracted from the links, or "please_name_this_file".

If merging the files fails, the app is now going to attempt to create a zip 
archive instead.

The finished file can be downloaded to a client by clicking the "Download PDF" (or 
"Download ZIP") link after it has been created.

While it was made for the above mentioned purpose, it could be used for any site 
with .pdf download links. However, I do not take responsibility 
for how it is used.

Note that if you do want to use it for the intended purpose, you'll still have
to be in the FH Dortmund's network.



____REQUIREMENTS (Server)____

1) PDFtk server (enter the path to the pdftk.exe in the PDFTK_FILEPATH constant 
    in Config.php):
    https://www.pdflabs.com/tools/pdftk-server/
2) ZipArchive class (PHP)


___Deutsch___
Diese App wurde hauptsächlich für Studenten der FH Dortmund erstellt. 

Unsere Bücherei bietet einige PDF-Ebooks an, allerdings muss man teilweise jedes
Kapitel einzeln herunterladen, was mich genervt hat. Also habe ich beschlossen, 
ein Programm zu schreiben, das all diese PDF-Dateien herunterladen und zu einer 
Datei zusammenfassen kann.

Bis jetzt ist die Basisfunktion ,das Herunterladen von PDFs über direkte Downloadlinks
und deren Zusammenfügen, fertiggestellt. Die Datei wird im pdf-Verzeichnis des
Servers gespeichert. Der Dateiname ist entweder die ISBN, die aus den Downloadlinks
extrahiert wurde, oder "please_name_this_file".

Sollte das Zusammenfügen der Dateien fehlschlagen, wird das Programm versuchen,
stattdessen eine herunterladbare Zip-Datei zu erstellen.

Die fertiggestellte Datei kann über den "Download PDF"- (oder "Download ZIP"-) Link
auf den Client heruntergeladen werden.

Obwohl sie für den oben genannten Zweck erstellt wurde, könnte diese App dazu
genutzt werden, auch PDF-Dateien von direkten Downloadlinks beliebiger Seiten
herunterzuladen. Ich möchte allerdings klarstellen, dass ich keine Verantwortung 
dafür übernehme, wie das Programm verwendet wird.

Ich möchte betonen, dass man sich im Netzwerk der FH Dortmund befinden muss, um
die App für den vorgesehenen Zweck zu benutzen.


____ERFORDERT (Server-seitig)____
 1) PDFtk server (Geben Sie den Pfad zur pdftk.exe in der PDFTK_FILEPATH-Konstanten 
    in der Config.php-Datei ein):
    https://www.pdflabs.com/tools/pdftk-server/
2) ZipArchive class (PHP)