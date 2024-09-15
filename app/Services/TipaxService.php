<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

use Log;

class TipaxService
{
    private $token="eyJhbGciOiJBMTI4S1ciLCJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwidHlwIjoiSldUIiwiY3R5IjoiSldUIn0.byCR74gB81vq93V4bSL0pXddfeXlW_1L8DOPa_eZ8TF-thwhUckvyg.Fv51BQ5s7zBc_M0dOwwCiw.y8OX-POrxWLy4RCRgHYBYAcPVYv_o_wvFGU9HSS1-wCNI3ovre2QiX1dd_vVeOQrtaq5ivmuwL2XtDSGe2-QHykA-yw1lJc1ftDK417W2WkMCNrjG7QVxjj7uhgZveQ9m4J9dE__VG69FsdRC-2XJU-1FHOOyCwmXy5nsL8d1wfHKMXQP4gCgh4WGXF0JcYua2SmjWhcxsDhEulc6parhWoRgCM-hQ45sf-npqDil1Ioj9DuZkZXvP25etJzxhJ5pZIM92W7fyvQkO0z1hwtIqAMFloJ-8OBBGmJwSdN-5yK_69ER5UpWreWJnBlpAv_z-QzJB08RhZdFhBt-jELS_pYNT-F3D9xG04nKFuRmkoJ7CAjZq7lfpoyGBVVs8iArYJNuablDmFXtRo1ofP7QJT8PDk18TmbS5W-zNDnM5IMcZdW_0hJbUzclS999HWx_2OpLG34cVCMZXcbbd4jkDWMYRSA_zkOp7HtNG_QUymyOXYwXpMILC_0_kGeLkDbydpMfMiu6FQg2twYChCVcWzpFfSlqsxBUd_GuaA309SmmgjKnTf-Mof2W3k_1bvv0QcnH4-OYgHIETY5seZMc-Vi_psuI3mtEHKHiCwsS1xjCsSLhpZW2AQRdowN4ejov92CKNk8k-InwsMoj3-Bv64eRvpvRdHpowgw0SFDJmpYiJvEDcSkzPbd_I7pztAfjFw3BoH0nIp-95oOKSs6UK_97wMqc3u9arvoN-6XaLokoH1Jcbv7T4NDP99LemHpuiLX_shlZA7PTZF_w6WtfnLW7b7aH12yJiQwJD-Cb5xZ8jnLoMGdrjDWD0vP0Hf1rvvnD6959di2vVunw9Wa0byaLXxHDdx75KN3K_g4s4RgLc3NFJbNGHOHJ8REdpTjahmEvD91siqWxHfPuvorUTx4j0_BRpFMdZ9dP8d9fbrTCryvDrB2hoA6K7Csa9bWf4_K2BmAVIlEM7u7oepijRw-gA7GKnvMnwO-BLYz7cZQRk5085oD9RV1Pw-1FlBsJ-9uF6sMsIobHLRzMqtRFFe9Nx70PhOg6tclFld_rWrvjRWMe5DScd2Ie2ZhQhHqd9PMizf1EizuJV_OnucdwCdV6KSc6Owae_xbIbt6FsmIlvKhv8V4MH-4RCJHq_Qs15S9ut-brLUM6tNJ0Kt_hiqvOKSFWfNbt_XzJjBfekOzjPOo_BE7zaRrJEADew648pyPKfq_4qrer4P5MikaHRKFY9k3bF2kANaiUB5vF88jXLTGVT2pElRasFzU-wh8Jund88lTrCg_b0GuN4Hv-DEYKtrU_TSQLzfwIHws8K9lzEsvXTqY8unl-x_kaKjqC17yXDLXJJjQMinrK-PGtD5B8oB4xFOz5M657PcNTyCIZ1vi4jrS7V_c6WusuxjW_rsGBVPMK-chIWfUeSdNkX51TfegDsnKzKmvqFXApO3w_kHoDtSoI93wPrw92mgcav9m5vgL4ikBpBHUPqUjPe5vlFLX15Nl2rrTCT6N2oUsdL4TrBfKJP5AqTUdm6FSKw9Qj2rkp5QibJ7KC1OKZDEZJENcA6ThQ-oJt-G_ZmndeG7cwUPcxeC7DwY8LU5fLOiEdmRQ48-o78I4skX7bHb5yma-bhBciZG33GoCd8NOq8k07k98170WWZbhOCVSEYbzUSfOoBT-iqGgdxbZl6OJ8UPnkQIlDMyKhCotBki83CvLyKP_OFmUhaO2zdz1FAITQPRY1Nhob0sfig-P6MEMJNOEuXeUTQKSHpYTVSm2y3ahv4Q9n5wBbTVqnZnN1vMxbw73IvN9eiwBRY__1yUkx2qsLcnLZsPYiErMuOpE7Qfu0hIPdsGNlX-9PW1tFZKPk7z_KE4zYKE-Z7cTeNEcg_aP6-4WMVDHodF99aCDe4UNzgRkW1ASF_mZxtAms6vx50oz0RVHFMP01uZyeOf4pDwevo14paZWBRF_cEgMhFT8YNz0m2wt0lr4n95w3QpPYwZXkcLiJVRMbEbuzBDO9wHvdghmIqF0VJAVf5HUeV47Dzs8aqh7CN_Ak-44akf-_iHi3fgBVS8EvXM518eHjk3eiixHIzNSwm1SCOU.yUDd5H9Wt_51Rco5yTJNJA";

    public function getToken($username, $password, $apiKey)
    {
        $response = Http::post('provider_b_url/getToken', [
            'username' => $username,
            'password' => $password,
            'apiKey' => $apiKey,
        ]);

        $this->token = $response->json()['token'];
        return $this->token;
    }

    public function getPrice($data)
    {
        Log::info("the data of parcel in tipax services are=> " . json_encode($data));

        $response = Http::withToken($this->token)->post('provider_b_url/pricing', $data);
        return $response->json();
    }

    public function createOrder($data)
    {
        $order=[            
                    "packageInputs" =>  
                    [
                    
                        [
                            "origin"=> [
                                "cityId"=> 1359
                            ],
                            "destination"=> [
                            "cityId"=> 1262
                            ],
                            "weight"=> 30,
                            "packageValue"=> 10000000,
                            "length"=> 10,
                            "width"=> 10,
                            "height"=> 10,
                            "packingId"=> 0,
                            "packageContentId"=> 3,
                            "parcelBookId"=> 0,
                            "isUnusual"=> false,
                            "packType"=> 20,
                            "paymentType"=> 50,
                            "pickupType"=> 20,
                            "distributionType"=> 10,
                            "serviceId"=> 1
                        ],
                        [
                            "origin"=> [
                                "cityId"=> 1359
                            ],
                            "destination"=> [
                            "cityId"=> 1262
                            ],
                            "weight"=> 20,
                            "packageValue"=> 20000000,
                            "length"=> 20,
                            "width"=> 20,
                            "height"=> 20,
                            "packingId"=> 0,
                            "packageContentId"=> 3,
                            "parcelBookId"=> 0,
                            "isUnusual"=> false,
                            "packType"=> 20,
                            "paymentType"=> 50,
                            "pickupType"=> 20,
                            "distributionType"=> 10,
                            "serviceId"=> 1
                        ],
                
                    ]
                ];
             
        
        $response = Http::withToken($this->token)->post('https://omtestapi.tipax.ir/api/OM/v3/Pricing', $order);
        return $response->json();
    }
}
