<?php

namespace App\Controllers;

use App\Utils\View;

class PageController
{


    public static function getPage($title, $content)
    {
        return  View::render('page', [
            'title' => $title,
            'content' => $content
        ]);
    }
}
