<?php namespace Laver;

use GuzzleHttp\Client;

class PageFactory
{
    public static function create($url)
    {
        $client   = new Client();
        $response = $client->request('GET', $url);

        return new Page($response);
    }

}