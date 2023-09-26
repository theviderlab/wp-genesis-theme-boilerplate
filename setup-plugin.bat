@echo off
setlocal enabledelayedexpansion

:: Get user input for the theme name
set /p themeCustomer=Enter the customer (for copyright): 
set /p themeName=Enter the theme name: 
set /p themeURI=Enter the theme URI: 
set /p themeDescription=Enter the theme description: 
set /p themeAuthor=Enter the theme author: 
set /p themeAuthorURI=Enter the theme author URI: 


:: Convert theme name to various formats
set kebabCase=!themeName: =-!
set snakeCase=!themeName: =_!
set pascalSnakeCase=!themeName: =_!
set upperSnakeCase=!snakeCase: =_!
set lowerSnakeCase=!snakeCase: =_!

for %%i in (a b c d e f g h i j k l m n o p q r s t u v w x y z) do (
    set lowerSnakeCase=!lowerSnakeCase:%%i=%%i!
    set kebabCase=!kebabCase:%%i=%%i!
)
for %%i in (A B C D E F G H I J K L M N O P Q R S T U V W X Y Z) do (
    set upperSnakeCase=!upperSnakeCase:%%i=%%i!
)

:: Rename files recursively
for /R %%f in (*theme-name*) do (
    set newName=%%~nf
    set newName=!newName:theme-name=%kebabCase%!
    ren "%%f" "!newName!%%~xf"
)

:: Replace content in files recursively
for /R %%f in (*.php, *.css, *.js) do (
    > "%%f.tmp" (
        for /f "usebackq delims=" %%l in ("%%f") do (
            set "line=%%l"
            if "!line!"=="<n>" (
                echo(
            ) else (
                set "line=!line:<themeCustomer>=%themeCustomer%!"
                set "line=!line:<kebabCase>=%kebabCase%!"
                set "line=!line:<lowerSnakeCase>=%lowerSnakeCase%!"
                set "line=!line:<pascalSnakeCase>=%pascalSnakeCase%!"
                set "line=!line:<upperSnakeCase>=%upperSnakeCase%!"
                set "line=!line:<themeName>=%themeName%!"
                set "line=!line:<themeURI>=%themeURI%!"
                set "line=!line:<themeDescription>=%themeDescription%!"
                set "line=!line:<themeAuthor>=%themeAuthor%!"
                set "line=!line:<themeAuthorURI>=%themeAuthorURI%!"
                echo(!line!
            )
        )
    )
    move /y "%%f.tmp" "%%f" >nul
)

echo All done!
pause

endlocal