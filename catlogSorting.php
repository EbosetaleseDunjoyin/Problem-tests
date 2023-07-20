<?php

//Sorter Interface for extensiblity
interface ProductSorterInterface
{
    public function sort(array $products): array;
}

// Price Sorter
class PriceSorter implements ProductSorterInterface
{
    public function sort(array $products): array
    {
        usort($products, function ($a, $b) {
            return $a['price'] <=> $b['price'];
        });
        return $products;
    }
}

// Sale Per View Sorter
class SalesPerViewSorter implements ProductSorterInterface
{
    public function sort(array $products): array
    {
        usort($products, function ($a, $b) {
            $aRatio = $a['sales_count'] / $a['views_count'];
            $bRatio = $b['sales_count'] / $b['views_count'];
            return $aRatio <=> $bRatio;
        });
        return $products;
    }
}
 class Catalog{

    private $products = [];
    public function __construct(array $products) {
        $this->products = $products;
    }

    public function getProducts(ProductSorterInterface $sorter): array{
        return $sorter->sort($this->products);
    }

    // public function customOperation(callable $operation, ...$args)
    // {
    //     return call_user_func_array($operation, $args);
    // }
 }



$products = [
    [
        'id' => 1,
        'name' => 'Alabaster Table',
        'price' => 12.99,
        'created' => '2019-01-04',
        'sales_count' => 32,
        'views_count' => 730,
    ],
    [
        'id' => 2,
        'name' => 'Zebra Table',
        'price' => 44.49,
        'created' => '2012-01-04',
        'sales_count' => 301,
        'views_count' => 3279,
    ],
    [
        'id' => 3,
        'name' => 'Coffee Table',
        'price' => 10.00,
        'created' => '2014-05-28',
        'sales_count' => 1048,
        'views_count' => 20123,
    ]
];


$catalog = new Catalog($products);

$productPriceSorter = new PriceSorter();
$productsSortedByPrice = $catalog->getProducts($productPriceSorter);
print_r($productsSortedByPrice);

$productSalesPerViewSorter = new SalesPerViewSorter();
$productsSortedBySalesPerView = $catalog->getProducts($productSalesPerViewSorter);
// print_r($productsSortedBySalesPerView);