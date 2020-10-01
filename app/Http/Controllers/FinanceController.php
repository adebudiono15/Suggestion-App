<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function finance(){
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dpsalim.com/fin/api/divisii",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 300,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Content-Type:application/json'
                ),
            ));
 
        $response = curl_exec($curl);
        $err = curl_error($curl);
 
        curl_close($curl);
 
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $sel = json_decode($response);
                }
                
        // dd($response);
        return view('admin.finance', compact('response'));
    }
}
