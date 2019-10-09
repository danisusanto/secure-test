<?php
namespace App\Services;

use GuzzleHttp\Client;

class ImgurService {
    
    public function upload($request) {
        $client = new Client();
        $response = $client->request('POST', env('IMGUR_CLIENT_ENDPOINT'), [
                'headers' => [
                    'authorization' => 'Client-ID ' . env('IMGUR_CLIENT_ID'),
                    'content-type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'image' => base64_encode(file_get_contents($request->file('image')->path()))
                ],
        ]);
        $data = json_decode($response->getBody()->getContents(), TRUE);
        return $data['data']['link'];
    }
}
