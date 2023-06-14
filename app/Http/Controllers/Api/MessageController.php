<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MessageRequest;
use App\Http\Resources\Api\MessageResource;
use App\Models\Message;
use App\Repository\MessageRepository;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->withPagination(
            Message::paginate(),
            MessageResource::class,
            'messages'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {
        $session = $request->session;
        $send = (new MessageRepository)
            ->send($request->validated());

        if ($send) {
            return $this->success(
                [
                    'target' => $request->target,
                    'text' => $send,
                ],
                "Success send the message"
            );
        }

        return $this->error(null, "Failed to send the message");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
