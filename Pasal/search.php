<?php
session_start();
require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder;

$client = ClientBuilder::create()->setHosts(['localhost:9200'])->build();

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $results = searchProducts($client, $query);

    if (count($results) > 0) {
        foreach ($results as $result) {
            echo '<div class="product">';
            echo '<img src="' . htmlspecialchars($result['_source']['image']) . '" alt="' . htmlspecialchars($result['_source']['name']) . '">';
            echo '<h3>' . htmlspecialchars($result['_source']['brand']) . '</h3>';
            echo '<p>' . htmlspecialchars($result['_source']['name']) . '</p>';
            echo '<p class="price">' . htmlspecialchars($result['_source']['price']) . '</p>';
            echo '<p class="old-price">' . htmlspecialchars($result['_source']['old_price']) . ' <span class="discount">' . htmlspecialchars($result['_source']['discount']) . '</span></p>';
            echo '<form method="post" action="add_to_cart.php">';
            echo '<input type="hidden" name="product" value="' . htmlspecialchars(json_encode($result['_source'])) . '">';
            echo '<button type="submit" class="add-to-cart">Add to cart</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo '<p>No products found.</p>';
    }
}
