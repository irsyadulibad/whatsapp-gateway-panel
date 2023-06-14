<?php

namespace App\Repository;

use App\Models\Message;
use Illuminate\Support\Facades\Http;

class MessageRepository
{
    private String $url, $session;

    public function __construct()
    {
        $this->url = config('app.apiurl');
    }

    public function get()
    {
        return Message::all();
    }

    public function send($data)
    {
        $res = Http::post($this->url . '/message', [
            'phone' => $data['target'],
            'message' => $data['text'],
        ]);

        if($res->successful()) {
            Message::create($data);
            return true;
        }

        return false;
    }
}
