<?php

if (! function_exists('getConstants')) {
    function getConstants()
    {
        return [

         'relation_types' => [
                [
                    'id' => 1,
                    'name' => 'Blog',
                    'slug' => 'blog',
                ],
                [
                    'id' => 2,
                    'name' => 'News',
                    'slug' => 'news',
                ],
                [
                    'id' => 3,
                    'name' => 'Reels',
                    'slug' => 'reels',
                ],
                [
                    'id' => 4,
                    'name' => 'Video',
                    'slug' => 'video',
                ],
            ],


        ];
    }
}
