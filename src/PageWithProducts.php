<?php namespace Laver;

class PageWithProducts extends Page
{
    public function getProducts()
    {
        $return = [];
        foreach ($this->domXpath->query('//div[@class="productInner"]') as $productItem) {
            $page = $this->getProductPage($productItem);
            $return[] = [
                'title' => $this->getProductTitle($productItem),
                'unit_price' => doubleval($this->getProductPrice($productItem)),
                'size'  => $page->getSize(),
                'description' => $page->getDescription()
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
        $priceString = $this->domXpath->query('.//div[@class="pricing"]', $productItem)[0]->textContent;
        preg_match("/&pound(.*)\\/unit/", $priceString, $matches);
        return $matches[1];
    }

    private function getProductPage(\DOMNode $productItem)
    {
        $url = $this->getProductLink($productItem);
        return PageFactory::create($url);
    }

    private function getProductLink(\DOMNode $productItem)
    {
        return $this->domXpath->query('.//*[@class="productInfo"]/h3/a/@href', $productItem)[0]->textContent;
    }
}