<?php

use Laver\Parser;

require 'vendor/autoload.php';

$url      = 'http://hiring-tests.s3-website-eu-west-1.amazonaws.com/2015_Developer_Scrape/5_products.html';

try {
    $response = (new Parser(\Laver\PageFactory::create($url, true)))->run();
    echo json_encode($response, JSON_PRETTY_PRINT) . PHP_EOL;
} catch (Exception $e) {
    echo "There has been an error." . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
}
