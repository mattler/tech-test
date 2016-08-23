<?php

namespace Laver;

class Parser
{
    private $url;

    /**
     * Parser constructor.
     *
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function run()
    {
        return [
            "results" => [],
            "total" => 0
        ];
    }
}