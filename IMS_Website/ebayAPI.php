<?php
require 'vendor/autoload.php';
use Symfony\Component\DomCrawler\Crawler;

// URL
$url = 'https://www.ebay.com/sh/lst/active';

// Get Data from URL
$client = new GuzzleHttp\Client();
$res = $client->request('GET', $url);
echo $res->getBody();

// Loop through the Data

// Search for Values that I want

// echo back out to screen / store data in database
