# multipdfdownloader

____README_____

V 0.1.0

This app was created mainly for students of the FH Dortmund, Germany.

Our library has some books available as PDF ebooks. However, sometimes, you have
to download every single chapter by itself, which annoys me. So I decided to 
make an app that downloads all the PDF files at once and puts them together into 
one file.

So far, the base functionality of downloading PDF files from an HTML pages direct
download links and merging them into one (using PDFtk Server) has been finished.
The file will be saved in the pdf folder in the server. The file name will 
either be an IBAN extracted from the links, or "please_name_this_file".


While it was made for the above mentioned purpose, it could be used for any site 
with .pdf download links. However, I do not take responsibility 
for how it is used.

Note that if you do want to use it for the intended purpose, you'll still have
to be in the FH Dortmund's network.


____REQUIREMENTS____

1) PDFtk server (enter the path to the pdftk.exe in the PDFTK_FILEPATH constant 
    in Config.php):
    https://www.pdflabs.com/tools/pdftk-server/