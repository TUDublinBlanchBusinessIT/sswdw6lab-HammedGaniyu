@echo off
setlocal

set "phpini=C:\php-8.4.2-Win32-vs17-x64\php.ini"
set "backup=%phpini%.bak"

if not exist "%phpini%" (
    echo ERROR: File not found: %phpini%
    exit /b 1
)

echo Backing up "%phpini%" to "%backup%" ...
copy /y "%phpini%" "%backup%" >nul

echo Searching for ";extension=mysqli" in php.ini ...

rem Use PowerShell to make a precise in-place edit
powershell -NoProfile -Command ^
    "(Get-Content '%phpini%') | ForEach-Object {if ($_ -match '^\s*;extension\s*=\s*mysqli\s*$') {'extension=mysqli'} else {$_}} | Set-Content '%phpini%' -Encoding UTF8"

echo Done. If the line existed, it has been uncommented.
pause
