<?php

namespace App;

class RandomUser
{
    public static function fetchData()
    {
        $url = 'https://randomuser.me/api/';
        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}
