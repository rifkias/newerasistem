<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\Psr7;
use GuzzleHttp\Client as Client;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Exception\ClientErrorResponseException;
use GuzzleHttp\Exception\RequestException;
use Config;

class BannerAPI extends Model
{
    protected $url = 'http://newerasistem.test/nesapi/banner/listBanner';
    // protected $key = config('NES_API_KEY');
    protected $key = 'bea1a55011f773734e8364fad3f7d5caf4565a71a584c9871cb2f2e6d9029ec8';
    public function __construct()
    {
        $this->client           = new Client();
    }
    public function getAllData()
    {
        try {
            $response = $this->client->request('POST', $this->url, [
                'form_params' => [
                    'apikey'               => $this->key,
                ]
            ]);

            $results   = json_decode($response->getBody(),TRUE);
            return $results;

        }catch (ClientException $e) {
            $responseError  = $e->getResponse();
            $content        = json_encode($responseError->getBody());
            return ["status" => 400 , "datas" => null , "errors" => $content];
        }catch (RequestException $e) {
            if ($e->hasResponse()) {
                $exception      = (string) $e->getResponse()->getBody();
                $content        = $exception;
                return ["status" => 400 , "datas" => null , "errors" => json_decode($exception)];

            }else{
                $exception      = $e->getMessage();
                $content        = json_encode($exception);
                return ["status" => 400 , "datas" => null , "errors" => $content];

            }
        }catch (BadResponseException $e) {
            $exception      = $e->getResponse()->getBody()->getContents();
            $content        = $exception;
            return ["status" => 400 , "datas" => null , "errors" => json_decode($exception,TRUE)];
        }
    }
    //
}
