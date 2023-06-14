<?php

namespace App\Repository;

use Illuminate\Support\Facades\Http;

class SessionRepository
{
    private String $url;

    public function __construct()
    {
        $this->url = config('app.apiurl');
    }

    public function authenticated()
    {
        $res = Http::get($this->url . '/checkauth');

        if($res->successful()) return $res->object()->auth;
        return false;
    }

    public function qrCode()
    {
        $res = Http::get($this->url . '/qrcode');
        if($res->successful()) return $res->object()->qr;
        return null;
    }
}
