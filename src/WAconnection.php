<?php

namespace WAIntegration;
class WAconnection
{
    protected $id;
    protected $token;
    protected $identifier;

    protected static $baseUrl = 'https://app.gowasl.com/api/channels';
    function __construct($data){
        $this->id = $data['id'];
        $this->token = $data['token'];
        $this->identifier = $data['identifier'];
    }

    public static function startRequest($requestSegment,$type = "GET",$data=[]){

        $url = self::$baseUrl.$requestSegment;
        $id  = self::getID();
        $token = self::getTOKEN();
        $identifier = "Bearer ".self::getIDENTIFIER();

        try {
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                "ID: {$id}",
                "TOKEN: {$token}",
                "Authorization: {$identifier}",
            ));

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $type,
                CURLOPT_POSTFIELDS => json_encode($data),
            ));

            $response = curl_exec($curl);
            curl_close($curl);

            $res = json_decode($response);

            return response()->json([
                'code'  => 200,
                'message' => $res->message,
                'data'  => $res->data,
            ]);
        }catch (\Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
            ],500);
        }
    }

    static function getID(){
        return config('wa_integration.id');
    }

    static function getTOKEN(){
        return config('wa_integration.token');
    }

    static function getIDENTIFIER(){
        return config('wa_integration.identifier');
    }
}
