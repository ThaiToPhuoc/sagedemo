<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleProject extends Controller
{
    public function project()
    {
        return (object)[
            'name' => get_field('name', get_the_ID()),
            'url' => get_field('url', get_the_ID()),
            'case_study' => get_field('case_study', get_the_ID()),
            'devilery_solution' => get_field('devilery_solution', get_the_ID()),
            'feedback' => get_field('feedback', get_the_ID()),
            'img' => $this->image(get_the_ID())
        ];
    }

    protected function image($id)
    {   
        $image = get_field('project_image',$id);

        //Khai bao bien
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];

        // //kich thuoc anh
        $size = 'large';
        $thumbnail = $image['sizes'][$size];
        $width = $image['sizes'][$size.'-width'];
        $height = $image['sizes'][$size.'-height'];

        return (object)[
            'url' => $url,
            'title' => $title,
            'alt' => $alt,
            'caption' => $caption,
            'thumb' => $thumbnail,
            'width' => $width,
            'height' => $height
        ];
    }
}
