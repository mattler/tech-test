<?php

namespace Laver;

use GuzzleHttp\Client;

class PageFactory
{
    public static function create($url, $withProducts = false)
    {
        $client   = new Client();
        $response = $client->request('GET', $url);

        if ($withProducts) {
            return new PageWithProducts($response);
        }

        return new Page($response);
    }

}