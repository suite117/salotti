@echo off
set base_dir=c:\wamp\www\git\salotti\locale\it_IT\LC_MESSAGES\

echo move...
del %base_dir%messages.po.old
move %base_dir%messages.po %base_dir%messages.po.old
echo merge...
msgmerge %base_dir%messages.po.old mess.po > %base_dir%messages.po


