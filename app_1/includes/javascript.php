<?php


class JsFiles
{
    private static  $files = ["profiles", "login", "logout", "table", "filter", "form", "dashboard", "charts"];

    public static function getFiles($files)
    {
        $string = "";
        foreach ($files as $fileName)
        {
            if(in_array($fileName, self::$files))
            {
                $string .=  "<script src='/js/$fileName.js'></script>";
            }
        }
        echo  $string;
    }
}

