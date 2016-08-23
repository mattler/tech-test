<?php

use Laver\Parser;

class ParserTest extends PHPUnit_Framework_TestCase
{
    public function test_parser_returns_array()
    {
        $result = (new Parser('http://test.com'))->run();
        $this->assertInternalType('array', $result);

        $this->assertArrayHasKey('results', $result);
        $this->assertArrayHasKey('total', $result);
    }
}
