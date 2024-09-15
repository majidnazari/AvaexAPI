<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

use Log;

class PostService
{
    private $token="eyJhbGciOiJBMTI4S1ciLCJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwidHlwIjoiSldUIn0.517JqSggCaPf9al56YE2jIOpnu4_0NIN5sm8Z3PesdjM2J0VbkOK5g.3sFCo-WZPa8z9vu8fsiQOQ.d3ZhAbOSLK6dteMQasHz96i3HjYLQscDQ1ayuR7KQkSttFHE6489tUSjXp1E2_GCOT1u8xkisPAA36LdGD5TDcBSHAM-_crNxfyw6RM5A44CLS7VxIDO8Ghz2d8Oa4F7FgHEiH121SVMQMQHZ-dmq_isJt1KVhiLG8udfIq9dUB0j3tpM8UMjs_KbMW7phMs4l1FAEByJ2cVB-91KJ3gu2vziEjs4YVTHzKKJAVZ53kV7BlRiDBMPYzzdMroVo8vZyTgjJ24oO3giiW6L48ku9wL2G_W4VxCdib0VMvPd3v8X11b_VjSsJgaopSQMxNNq2V7bSJ7hIVc6puYdPzl6OgoZApBvOR8SmdvlxiY8OjWvfy8SLeyozCd0qzFI0Su.xWmwBMymDn4_731BnNoFDg";

    public function getToken($type, $username, $password)
    {
        $response = Http::post('provider_a_url/getToken', [
            'type' => $type,
            'username' => $username,
            'password' => $password,
        ]);

        $this->token = $response->json()['token'];
        return $this->token;
    }

    public function getProvinces()
    {
        $response = Http::withToken($this->token)->get('provider_a_url/provinces');
        return $response->json();
    }

    public function getCities()
    {
        $response = Http::withToken($this->token)->get('provider_a_url/cities');
        return $response->json();
    }

    public function getPrice($data)
    {

        $order=[
            "ShopID" =>  "83746",
            "ToCityID" => "91",
            "ServiceTypeID" => "1",
            //"PayTypeID": "1",
            "Weight" =>  "200",
            "ParcelValue" =>  "2000000",
            "PrePaidAmount" => "0",
            //"CollectNeed": "false",
            //"NonStandardPackage": "false",
            // "SMSService": "false",
            //"TwoReceiptant": "false",
            "BoxSizeID" =>  10,    
        ];

        Log::info("the data of parcel in post services are: " . json_encode($data));
        $response = Http::withToken($this->token)->post('https://ecommrestapi.post.ir/api/v1/Parcel/Price',  $order);
        return $response->json();
    }

    public function registerParcel($data)
    {
        $response = Http::withToken($this->token)->post('provider_a_url/parcel_new', $data);
        return $response->json();
    }
}
