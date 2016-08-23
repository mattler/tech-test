<?php

use Laver\Page;
use GuzzleHttp\Psr7\Response;

class PageTest extends PHPUnit_Framework_TestCase
{
    public function test_page_has_size()
    {
        $response = new Response(200, ['Content-Length' => 1066], 'Hi');
        $page     = new Page($response);
        $this->assertEquals(1066, $page->getSize());
    }

    public function test_page_has_description()
    {
        $description = "Buy Ripe & ready online from Sainsbury's, the same great quality, freshness and choice you'd find in store. Choose from 1 hour delivery slots and collect Nectar points.";
        $response = new Response(200, ['Content-Length' => 1066], file_get_contents(__DIR__ . '/page_to_parse.html'));
        $page = new Page($response);
        $this->assertEquals($description, $page->getDescription());

    }
}
