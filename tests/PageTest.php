<?php

use Laver\Page;
use GuzzleHttp\Psr7\Response;

class PageTest extends PHPUnit_Framework_TestCase
{
    public function test_page_has_size()
    {
        $response = new Response(200, ['Content-Length' => 1066]);
        $page     = new Page($response);
        $this->assertEquals(1066, $page->getSize());
    }
}
