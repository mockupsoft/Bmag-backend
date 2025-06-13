<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class NetGsmRpository
{
    private Client $client;
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|mixed
     */
    private mixed $username;
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|mixed
     */
    private mixed $password;
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|mixed
     */
    private mixed $header;

    public function __construct()
    {
        $this->client = new Client();
        $this->username = config('services.netgsm.username');
        $this->password = config('services.netgsm.password');
        $this->header = config('services.netgsm.header');
    }

    public function sendSms($user, $message)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
        <mainbody>
            <header>
                <company dil="TR">Netgsm</company>
                <usercode>'.$this->username.'</usercode>
                <password>'.$this->password.'</password>
                <type>1:n</type>
                <msgheader>'.$this->header.'</msgheader>
            </header>
            <body>
                <msg><![CDATA['.$message.']]></msg>
                <no>'.$user->phone_number.'</no>
            </body>
        </mainbody>';

        try {
            $response = $this->client->request('POST', 'https://api.netgsm.com.tr/sms/send/xml', [
                'headers' => [
                    'Content-Type' => 'text/xml',
                ],
                'body' => $xml,
                'timeout' => 60,
                'verify' => false,
            ]);

            $responseStatusCode = explode(" ", $response->getBody()->getContents())[0];
            if ($responseStatusCode == "00") {
                return true;
            }
            return false;
        } catch (GuzzleException $e) {
            \Log::error($e->getMessage());
            return false;
        }
    }
}
