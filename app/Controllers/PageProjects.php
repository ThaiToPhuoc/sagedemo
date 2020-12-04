<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PageProjects extends Controller
{

    public function project()
    {
        $args = [
            'posts_per_page' => -1,
            'offset' => 0,
            'orderby' => 'date',
            'order' => 'DESC',
                'post_type' => 'project'
            ];  

        $the_query = new \WP_Query($args);
        $project = [];

        if ($the_query->post_count > 0) 
        {
            $project= array_map(function($project){
                $image = get_field('project_image',$project);

                //Khai bao bien
                $url = $image['url'];
                $title = $image['title'];
                $alt = $image['alt'];
                $caption = $image['caption'];

                // //kich thuoc anh
                $size = 'medium';
                $thumbnail = $image['sizes'][$size];
                $width = $image['sizes'][$size.'-width'];
                $height = $image['sizes'][$size.'-height'];

                $name = get_field('name',$project);

                return (object)[
                    'url' => $url,
                    'title' => $title,
                    'alt' => $alt,
                    'caption' => $caption,
                    'thumb' => $thumbnail,
                    'width' => $width,
                    'height' => $height,
                    'name' => $name
                ];
            }, $the_query->posts);

            wp_reset_postdata();
        }

        return $project;
    }

    
}
