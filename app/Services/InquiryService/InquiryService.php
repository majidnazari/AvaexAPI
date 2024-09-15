<?php

namespace App\Services\InquiryService;

use Illuminate\Support\Facades\Cache;
use App\Models\provider;
use App\Models\User;
use Carbon\Carbon;
use App\Services\AuthStrategies\AuthStrategyInterface;
use App\Services\AuthStrategies\PostAuth;
use App\Services\AuthStrategies\TipaxAuth;
use Illuminate\Support\Facades\Http;
use Log;

class InquiryService
{

    protected $apis;
    public function __construct()
    {
        $this->apis = Provider::where('status','Active')->get();

        Log::info("the apis are:" .json_encode($this->apis));
    }
    public function inquiry(User $user=null)
    {
        $responses = [];

        $order=[
            "user_id_creator" => 1,
            "user_id_agent" => 1,
            "provider_service_id" => 1,
            "sender_address_id" => 1,
            "recipient_address_id" => 1,
            "register_date" => Carbon::now()->format("Y-m-d H:i:s"),
            "order_kind" => "One_sender_one_recipient",
            "financial_status" => 1,
            "is_COD" => 0,
            "COD" => 0,
            "payment_type" => "Befor",
            "payment_way" => "online",
            "order_status" => 1,
            "description" => 1,
            "parcel" => [
                [
                    "package_type" => "Bag",
                    "weight" => 100,
                    "width" => 10,
                    "length" => 20,
                    "height" => 20,
                    "parcel_value" => 1000000,
                    "is_breakable" => true,
                    "is_liquids" => true,
                    "description" => "some explain 1",  
                ],  
                [
                    "package_type" => "Bag",
                    "weight" => 200,
                    "width" => 20,
                    "length" => 20,
                    "height" => 20,
                    "parcel_value" => 1000000,
                    "is_breakable" => true,
                    "is_liquids" => true,
                    "description" => "some explain 2",  
                ], 
            ]
        ];

        $orderDetails=[
            
           [
             "order_id" => 1,
            "parcel_id" => 1,
            "registered_number" => 1,
            "tracking_code" => 1,
            "refrence_code" => 1,
            "lading_code" => 1,
            "barcode" => "One_sender_one_recipient",
            "insurance_provider_cost" => 1,
            "tax_provider_cost" => 0,
            "fee_provider_cost" => 0,
            "unusual_provider_cost" => "Befor",
            "extra_provider_cost" => "online",
            "insurance_service_cost" => 1,
            "fee_service_cost" => 1,

            "tax_service_cost" => 1,
            "collecting_service_cost" => 1,
            "inplace_service_cost" => 1,
            "fee_service_VIP" => 1,

            "SMS_service_cost" => 1,
            "print_service_cost" => 1,
            "extra_service_cost" => 1,
            "manager_commission" => 1,
            "description" => 1,

           ], 
           [
            "order_id" => 1,
           "parcel_id" => 1,
           "registered_number" => 1,
           "tracking_code" => 1,
           "refrence_code" => 1,
           "lading_code" => 1,
           "barcode" => "One_sender_one_recipient",
           "insurance_provider_cost" => 1,
           "tax_provider_cost" => 0,
           "fee_provider_cost" => 0,
           "unusual_provider_cost" => "Befor",
           "extra_provider_cost" => "online",
           "insurance_service_cost" => 1,
           "fee_service_cost" => 1,

           "tax_service_cost" => 1,
           "collecting_service_cost" => 1,
           "inplace_service_cost" => 1,
           "fee_service_VIP" => 1,

           "SMS_service_cost" => 1,
           "print_service_cost" => 1,
           "extra_service_cost" => 1,
           "manager_commission" => 1,
           "description" => 1,

          ],

        ];

        $parcels=[
            
          [
            "package_type" => "Bag",
            "weight" => 100,
            "width" => 10,
            "length" => 20,
            "height" => 20,
            "parcel_value" => 1000000,
            "is_breakable" => true,
            "is_liquids" => true,
            "description" => "some explain 1",  
          ],  
          [
            "package_type" => "Bag",
            "weight" => 200,
            "width" => 20,
            "length" => 20,
            "height" => 20,
            "parcel_value" => 1000000,
            "is_breakable" => true,
            "is_liquids" => true,
            "description" => "some explain 2",  
        ],                

        ];

        $parcelDetails=[           
            "parcel_id" => 1,
            "name" => "بسته لوازم تحریر",
            "count" => 10,
            "description" => "لطفا در جابه جایی دقت شود"                      

        ];


        foreach ($this->apis as $key => $apiUrl) {
            $service = app($apiUrl->name."Service"); // Retrieve the service from the container
            $response = $service->getPrice($order); // Call getPricing method
        
            Log::info("Response from " . $apiUrl->name . ": " . json_encode($response));
        }

        return $responses;
    }    
    
}