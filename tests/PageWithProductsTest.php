<?php

use GuzzleHttp\Psr7\Response;

class PageWithProductsTest extends PHPUnit_Framework_TestCase
{
    public function test_page_with_products_returns_array()
    {
        $response         = new Response(200, ['Content-Length' => 1066],
            file_get_contents(__DIR__ . '/page_to_parse.html'));
        $pageWithProducts = new \Laver\PageWithProducts($response);
        $products         = $pageWithProducts->getProducts();
        $this->assertCount(7, $products);

        $this->assertEquals('Sainsbury\'s Apricot Ripe & Ready x5', $products[0]['title']);
        $this->assertEquals(39185, $products[0]['size']);
        $this->assertEquals(3.50, $products[0]['unit_price']);
        $this->assertEquals('Apricots', $products[0]['description']);
    }
}
