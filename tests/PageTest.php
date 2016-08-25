<?php

use Laver\Page;
use GuzzleHttp\Psr7\Response;

class PageTest extends PHPUnit_Framework_TestCase
{
    public function test_page_has_size()
    {
        $response = new Response(200, ['Content-Length' => 1066], 'Hi');
        $page     = new Page($response);
        $this->assertEquals(round(1066 / 1024, 2) . 'kb', $page->getSize());
    }

    public function test_page_has_description()
    {
        $description = "Apricots";
        $response    = new Response(200, ['Content-Length' => 1066],
            file_get_contents(__DIR__ . '/product_to_parse.html'));
        $page        = new Page($response);
        $this->assertEquals($description, $page->getProductDescription());

    }
}
