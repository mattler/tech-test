# Sainsbury's Page Parser

A console application that scrapes the Sainsbury’s grocery site - Ripe Fruits page and returns a JSON array of all the products on the page.

Example JSON:

    {
        "results":
            [
                {
                    "title":"Sainsbury's Avocado, Ripe & Ready x2",
                    "size": "90.6kb",
                    "unit_price": 1.80,
                    "description": "Great to eat now - refrigerate at home 1 of 5 a day 1 avocado counts as 1 of your 5..."
                }, 
                {
                    "title":"Sainsbury's Avocado, Ripe & Ready x4",
                    "size": "87kb",
                    "unit_price": 2.00,
                    "description": "Great to eat now - refrigerate at home 1 of 5 a day 1 avocado counts as 1 of your 5..."
                } 
            ],
        "total": 3.80
    }
    
## Installation

This programme uses [composer](https://getcomposer.org) for package management. 

Clone or download the repo and then call the following from the root of the project:

```bash
composer install
```

By default this will also include the development requirements, needed to run tests. 
If you do not wish to include them run the following instead:

```bash
composer install --no-dev
```
    
## Usage

To use program simply call the following from the root of the project:

```bash
php parser.php
```
    
## Tests

To run the included tests call the following from the root of the project:

```bash
./vendor/bin/phpunit
```