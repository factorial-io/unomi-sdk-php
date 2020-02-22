<?php

namespace Dropsolid\UnomiSdkPhp\Http\Guzzle;

use Dropsolid\UnomiSdkPhp\Http\Guzzle\Middleware\RefreshTokenMiddleware;
use GuzzleHttp\HandlerStack;
use Http\Adapter\Guzzle6\Client;
use Dropsolid\UnomiSdkPhp\Http\ApiClient\ApiClient;
use GuzzleHttp\Client as GuzzleHttpClient;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;

/**
 * Class GuzzleApiClientFactory
 *
 * @package Uno\UnomiSdkPhp\Http\Guzzle
 */
class GuzzleApiClientFactory
{
    /**
     * @param array $config
     * @return ApiClient
     */
    public static function createBasicAuth(
        array $config = []
    ) {
        if (!isset($config['handler'])) {
            if (!isset($config['callback'])) {
                $config['callback'] = null;
            }
        }
        if (!isset($config['options'])) {
            $config['options'] = [];
        }

        $httpClient = new GuzzleHttpClient($config);
        $psrClient = new Client($httpClient);

        return new ApiClient(null, $psrClient, null,  $config);
    }

    /**
   * @param AbstractProvider $provider
   * @param AccessToken|array $accessToken
   * @param array $config
   * @return ApiClient
   */
  public static function createOAuth(
    AbstractProvider $provider,
    AccessToken $accessToken,
    array $config = []
  ) {
    if (!isset($config['handler'])) {
      if (!isset($config['callback'])) {
        $config['callback'] = null;
      }
      $handler = self::initialiseHandlerStack(
        $provider,
        $accessToken,
        $config['callback']
      );

      $config['handler'] = $handler;
    }
    if (!isset($config['options'])) {
      $config['options'] = [];
    }

    $httpClient = new GuzzleHttpClient($config);
    $psrClient = new Client($httpClient);

    return new ApiClient($provider, $psrClient, $accessToken, $config);
  }

  /**
   * @param AbstractProvider $provider
   * @param AccessToken $accessToken
   * @param callable $refreshTokenCallback
   * @return HandlerStack
   */
  protected static function initialiseHandlerStack(
    AbstractProvider $provider,
    AccessToken $accessToken,
    callable $refreshTokenCallback = null
  ) {
    $handlerStack = HandlerStack::create();
    $refreshMiddleware = new RefreshTokenMiddleware(
      $provider,
      $accessToken,
      $refreshTokenCallback
    );
    $handlerStack->push($refreshMiddleware);

    return $handlerStack;
  }
}
