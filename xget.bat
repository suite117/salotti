@echo off

echo Generating file list..

dir c:\wamp\www\git\salotti\*.php /L /B /S > %TEMP%\listfile.txt

echo Generating .POT file...

xgettext -k_e -k__ --from-code utf-8  -o messages.po -L PHP --no-wrap -D c:\wamp\www\git\salotti -f %TEMP%\listfile.txt

echo Done.

del %TEMP%\listfile.txt