<?php

namespace App\Repository;

use Illuminate\Support\Facades\Http;

class MessageRepository
{
    private String $url, $session;

    public function __construct(String $session)
    {
        $this->session = $session;
        $this->url = config('app.apiurl') . "/{$session}/messages";
    }

    public function get()
    {
        $res = Http::get($this->url);

        if ($res->status() == 200) return $res->object()?->data;
        return [];
    }

    public function send($data)
    {
        $res = Http::post($this->url . '/send', [
            'jid' => $data['target'] . '@s.whatsapp.net',
            'type' => 'number',
            'message' => [
                'text' => $data['text']
            ]
        ]);
    }
}
