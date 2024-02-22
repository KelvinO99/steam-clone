 @echo off
for %%i in (*) do (
 if not "%%~ni" == "ciao" (
  md "%%~ni" && move "%%~i" "%%~ni"
 )
)