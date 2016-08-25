<?php

namespace Laver;

use GuzzleHttp\Client;

class PageFactory
{
    /**
     * @param string $url The endpoint to request
     * @param bool $withProducts Which type of Page class to create
     *
     * @return Page|PageWithProducts
     */
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