<?php

class Libs
{
    private static $files = [
        "datatable" =>
            '<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />
            <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>',
        "sweetalert" =>
            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>',
        "googlefonts" =>
            '<link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">',
        "fontawesome" =>
            '<link rel="stylesheet" href="/fonts/css/all.css">',
    ];


    public static function getFiles($files)
    {
        $string = "";
        foreach ($files as $fileName) 
        {
            $string .= self::$files[$fileName];
        }
        echo  $string;
    }
}
