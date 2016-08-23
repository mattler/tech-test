<?php namespace Laver;

use GuzzleHttp\Psr7\Response;

class Page
{
    /**
     * Page constructor.
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function getSize()
    {
        if ($this->response->hasHeader('Content-Length')) {
            return $this->response->getHeader('Content-Length')[0];
        }

        return null;
    }
}