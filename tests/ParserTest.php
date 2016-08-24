<?php

use Laver\Parser;

class ParserTest extends PHPUnit_Framework_TestCase
{
    public function test_parser_returns_array()
    {
        $page = new \Laver\Page(new \GuzzleHttp\Psr7\Response(200, ['Content-Length' => 10], 'Hi'));
        $result = (new Parser($page))->run();
        $this->assertInternalType('array', $result);

        $this->assertArrayHasKey('results', $result);
        $this->assertArrayHasKey('total', $result);
    }
}
