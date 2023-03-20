<?php

namespace App\Repository;

use App\Models\Message;
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

        if ($res->status() == 200) {
            $data = $res->object()?->data;

            $data = array_map(function ($msg) {
                if (!isset($msg->message)) return null;
                if (!isset($msg->message->conversation)) return null;

                return (object) [
                    'number' => explode('@', $msg->remoteJid)[0],
                    'text' => $msg->message->conversation,
                ];
            }, $data);

            return array_filter($data, fn ($msg) => !is_null($msg));
        };

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

        if ($res->status() == 200) {
            $text = $res->object()->message->extendedTextMessage->text;

            Message::create([
                'text' => $text,
                'target' => $data['target'],
                'session' => $this->session,
            ]);

            return $text;
        }

        return false;
    }
}
