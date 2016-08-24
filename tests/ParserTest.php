<?php

use Laver\Parser;

class ParserTest extends PHPUnit_Framework_TestCase
{
    public function test_parser_returns_array()
    {
        $page = new \Laver\PageWithProducts(new \GuzzleHttp\Psr7\Response(200, ['Content-Length' => 10], 'Hi'));
        $result = (new Parser($page))->run();
        $this->assertInternalType('array', $result);

        $this->assertArrayHasKey('results', $result);
        $this->assertArrayHasKey('total', $result);
    }

    public function test_parser_returns_correct_total()
    {
        $page = new \Laver\PageWithProducts(new \GuzzleHttp\Psr7\Response(200, ['Content-Length' => 10], 'Hi'));
        $parser = new Parser($page);

        $this->assertSame(0, $parser->getTotal());

        $parser->setResults([['unit_price' => 1.20], ['unit_price' => 2.83]]);
        $this->assertSame(4.03, $parser->getTotal());

        $parser->setResults([['unit_price' => 7.23], ['unit_price' => 4.11], ['unit_price' => 11.47]]);
        $this->assertSame(22.81, $parser->getTotal());
    }
}
