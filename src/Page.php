<?php

namespace Laver;

use DOMDocument;
use DOMXPath;
use GuzzleHttp\Psr7\Response;

class Page
{
    /**
     * @var Response
     */
    protected $response;

    /**
     * @var DOMXPath
     */
    protected $domXpath;

    /**
     * Page constructor.
     *
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;

        $domDocument = new DOMDocument();

        // suppress libxml errors due to incompatibility with html5
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

    public function getProductDescription()
    {
        $description = $this->domXpath->query('//div[@class="productText"]');
        if ($description->length) {
            return trim($description[0]->textContent);
        }

        return '';
    }
}