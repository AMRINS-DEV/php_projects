<?php
class Assets {
    public static function css($files = [])
    {
        foreach($files as $file) {
            echo "<link rel='stylesheet' href='./css/$file.css'>";
        }
    }

    public static function js($files = [])
    {
        foreach($files as $file) {
            echo "<script src='./js/$file.js'></script>";
        }
    }

    public static function fonts()
    {
        echo "<link rel='stylesheet' href='./fonts/css/all.css'>";
    }
}