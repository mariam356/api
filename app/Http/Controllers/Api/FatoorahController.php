<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Service\FatoorahServices;
use Illuminate\Http\Request;


class FatoorahController extends Controller
{

    private $fatoorahServices;

    public function __construct(FatoorahServices $fatoorahServices)
    {
        $this->fatoorahServices = $fatoorahServices;
    }

    public function payOrder()
    {

        

        $data = [
            "CustomerName" => 'jgkjg',
            "NotificationOption" => "LNK",
            "InvoiceValue" => 100,
            "CustomerEmail" =>'mariam@gmail.com',
            "CallBackUrl"=>env('success_url'),
            "ErrorUrl"=>env('error_url'),
            "Language"=>'en',
            "DisplayCurrencyIso"=>'RAY'
        ];

       return $this->fatoorahServices->sendPayment($data);

    }
}
