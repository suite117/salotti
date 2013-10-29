@echo off
set base_dir=c:\wamp\www\git\salotti\locale\it_IT\LC_MESSAGES\

echo move...
move %base_dir%messages.po %base_dir%messages2.po
echo merge...
msgmerge messages.po %base_dir%messages2.po > %base_dir%messages.po
del %base_dir%messages2.po

