<?php

require_once(getcwd() . "/../vendor/autoload.php");
require_once(getcwd() . "/authorize.php");

use Dropsolid\OAuth2\Client\Provider\DropsolidPlatform;
use Dropsolid\UnomiSdkPhp\Http\Guzzle\GuzzleApiClientFactory;

session_start();

/*$provider = new DropsolidPlatform(
    [
        'clientId' => 'your-client-id',
        'clientSecret' => 'your-client-secret',
        'redirectUri' => 'your-local-redirect-url',
    ]
);

$accessToken = authorize($provider);

$apiClient = GuzzleApiClientFactory::create(
    $provider,
    $accessToken,
    ['timeout' => 3.0, 'base_uri' => 'https://unomi.poc.qa.dropsolid-sites.com']
);*/

$apiClient = GuzzleApiClientFactory::createBasicAuth(
    [
        'timeout' => 3.0,
        'base_uri' => 'localhost',
        'auth' => ['username', 'password']
    ]
);

$unomi = Dropsolid\UnomiSdkPhp\Unomi::withDefaultSerializer($apiClient);

// Performing a segment.list request with offset
$offset = [
    'offset' => 0,
];

// Get all itemIds & conditions from all existing segments
$segments = $unomi->segments()->listSegments($offset);
foreach ($segments as $segmentMetadata) {
    $id = $segmentMetadata->getId();
    // Performing a segment.info request
    $segment = $unomi->segments()->getSegment($id);
    var_dump($segment->getItemId());
    var_dump($segment->getCondition());
}

