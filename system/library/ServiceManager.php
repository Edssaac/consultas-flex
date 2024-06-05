<?php

namespace Library;

class ServiceManager
{
    public static function request(string $endpoint, string $method = 'GET', array $fields = [], array $headers = []): array
    {
        $curl = curl_init();

        curl_setopt_array(
            $curl,
            [
                CURLOPT_URL => $endpoint,
                CURLOPT_RETURNTRANSFER => TRUE
            ]
        );

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        if (!empty($fields)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
        }

        if (!empty($headers)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

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
