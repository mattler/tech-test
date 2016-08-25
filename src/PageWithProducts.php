<?php

namespace Laver;

class PageWithProducts extends Page
{
    /**
     * Loop through each of the product items on the page and gather results
     */
    public function getProducts()
    {
        $return = [];
        foreach ($this->domXpath->query('//div[@class="productInner"]') as $productItem) {
            $page     = $this->getProductPage($productItem);
            $return[] = [
                'title'       => $this->getProductTitle($productItem),
                'size'        => $page->getSize(),
                'unit_price'  => $this->getProductPrice($productItem),
                'description' => $page->getProductDescription()
            ];
        }

        return $return;
    }

    private function getProductTitle(\DOMNode $productItem)
    {
        return trim($productItem->getElementsByTagName('h3')[0]->textContent);
    }

    private function getProductPrice(\DOMNode $productItem)
    {
        $priceString = $this->domXpath->query('.//div[@class="pricing"]',
            $productItem)[0]->textContent;
        preg_match("/&pound(.*)\\/unit/", $priceString, $matches);

        return doubleval($matches[1]);
    }

    /**
     * Create a new Page object for the url that the product points to
     *
     * @param \DOMNode $productItem
     *
     * @return Page
     */
    private function getProductPage(\DOMNode $productItem)
    {
        $url = $this->getProductLink($productItem);

        return PageFactory::create($url);
    }

    private function getProductLink(\DOMNode $productItem)
    {
        return $this->domXpath->query('.//*[@class="productInfo"]/h3/a/@href',
            $productItem)[0]->textContent;
    }
}