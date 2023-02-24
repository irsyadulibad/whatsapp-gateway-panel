<?php

namespace App\Repository;

use Illuminate\Support\Facades\Http;

class SessionRepository
{
    private String $url;

    public function __construct()
    {
        $this->url = config('app.apiurl') . '/sessions/';
    }

    public function get()
    {
        $res = Http::get($this->url);

        if ($res->status() == 200) {
            return $res->object();
        }

        return [];
    }

    public function add(String $name, bool $readIncoming = false)
    {
        $res = Http::post($this->url . 'add', [
            'sessionId' => $name,
            'readIncomingMessages' => $readIncoming,
        ]);

        if ($res->status() == 200) {
            return [
                'status' => true,
                'qr' => $res->object()->qr,
            ];
        }

        return [
            'status' => false,
            'message' => $res->object()->error,
        ];
    }

    public function delete(String $name)
    {
        $res = Http::delete($this->url . $name);
        return $res->status() == 200;
    }
}
