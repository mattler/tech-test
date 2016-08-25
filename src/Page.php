<?php

namespace Laver;

use DOMDocument;
use DOMXPath;
use GuzzleHttp\Psr7\Response;

class Page
{
    /**
     * Page constructor.
     *
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;

        $domDocument = new DOMDocument();
        libxml_use_internal_errors(true);
        $domDocument->loadHTML($response->getBody());
        libxml_clear_errors();

        $this->domXpath = new DOMXPath($domDocument);
    }

    public function getSize()
    {
        if ($this->response->hasHeader('Content-Length')) {
            return $this->response->getHeader('Content-Length')[0];
        }

        return null;
    }

    public function getDescription()
    {
        $description = $this->domXpath->query('//div[@class="productText"]');
        if ($description->length) {
            return trim($description[0]->textContent);
        }

        return '';
    }
}