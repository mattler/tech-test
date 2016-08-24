<?php

namespace Laver;

class Parser
{
    /**
     * @var Page
     */
    private $page;

    /**
     * Parser constructor.
     *
     * @param Page $page
     *
     * @internal param $url
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function run()
    {
        return [
            "results" => [],
            "total" => 0
        ];
    }
}