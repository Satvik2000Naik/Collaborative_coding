<?php
    $language = strtolower($_POST['language']);
    $code = $_POST['code'];

    $random = substr(md5(mt_rand()), 0, 7);
    $filePath = "temp/" . $random . "." . $language;
    $programFile = fopen($filePath, "w");
    fwrite($programFile, $code);
    fclose($programFile);

    if($language == "php") {
        $output = shell_exec("C:\ProgramData\php-8.0.7\php.exe $filePath 2>&1");
        echo $output;
    }
    // if($language == "python") {
    //     $output = shell_exec("C:\Users\KOUSIK\AppData\Local\Programs\Python\Python39\python.exe $filePath 2>&1");
    //     echo $output;
    // }
    if($language == "node") {
        rename($filePath, $filePath.".js");
        $output = shell_exec("C:\ProgramData\Microsoft\Windows\Start Menu\Programs\Node.js $filePath.js 2>&1");
        echo $output;
    }
    if($language == "c") {
        $outputExe = $random . ".exe";
        shell_exec("C:\MinGW\bin\gcc.exe $filePath -o $outputExe");
        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }
    // if($language == "cpp") {
    //     $outputExe = $random . ".exe";
    //     shell_exec("g++ $filePath -o $outputExe");
    //     $output = shell_exec(__DIR__ . "//$outputExe");
    //     echo $output;
    // }