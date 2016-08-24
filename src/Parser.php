<?php

namespace Laver;

class Parser
{
    /**
     * @var array
     */
    protected $results = [];

    /**
     * @var Page
     */
    private $page;

    /**
     * Parser constructor.
     *
     * @param PageWithProducts $page
     *
     * @internal param $url
     */
    public function __construct(PageWithProducts $page)
    {
        $this->page = $page;
    }

    public function setResults(array $results)
    {
        $this->results = $results;

        return $this;
    }

    public function getResults()
    {
        if (empty($this->results)) {
            $this->setResults($this->page->getProducts());
        }

        return $this->results;
    }

    public function getTotal()
    {
        return array_reduce($this->results, function ($carry, $item) {
            $carry += $item['unit_price'];
            return $carry;
        }, 0);
    }

    public function run()
    {
        return [
            "results" => $this->getResults(),
            "total"   => $this->getTotal()
        ];
    }
}