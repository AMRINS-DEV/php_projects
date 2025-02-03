<?php

class CssFiles
{
    private static  $files = ["login", "table", "style", "cards", "form", "profiles"];

    public static function getFiles($files)
    {
        $string = "";
        foreach ($files as $fileName)
        {
            if(in_array($fileName, self::$files))
            {
                $string .=  "<link rel='stylesheet' href='/css/$fileName.css'>";
            }
        }
        echo  $string;
    }
}


