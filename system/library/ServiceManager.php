<?php

namespace Library;

class ServiceManager
{
    public static function request(string $endpoint): array
    {
        $curl = curl_init();

        curl_setopt_array(
            $curl,
            [
                CURLOPT_URL => $endpoint,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_RETURNTRANSFER => TRUE
            ]
        );

        $response = curl_exec($curl);
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        $response = json_decode($response, true);

        return [
            'status' => $http_status,
            'data' => (is_array($response) ? $response : [])
        ];
    }
}
