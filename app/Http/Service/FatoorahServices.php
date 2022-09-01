<?php

namespace App\Http\Service;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class FatoorahServices
{

    private $request_client;
    private $base_url;
    private $headers;


    public function __construct(Client $request_client)
    {
        $this->request_client = $request_client;
        $this->base_url = env('fatoorah_base_url');
        $this->headers =[
            'Content_Type'=>'application/json',
            'authorization'=>'Bearer'.env('fatoorah_token')

        ];

    }

    private function bulidRequest($url , $method ,$data =[])
    {
        $request = new Request($method ,$this->base_url.$url, $this->headers);

        // if (!$data)
        // return false;
        $response = $this->request_client->send($request,[
            'json' => $data
        ]);

        if($response->getStatusCode() != 200)
        {
            // return false;
        }

        $response = json_decode($response->getBody(),true);
        return $response;

    }

    public function sendPayment($data)
    {
        // $requestDate = $this->parsePaymentData();
      return  $response =$this->bulidRequest('/v2/SendPayment','POST',$data);
        // if($response)
        // {
        //     $this->saveTransactionPayment($patient_id,$response['Data']['InvoiceId']);
        // }

        // return $response;
    }

}
