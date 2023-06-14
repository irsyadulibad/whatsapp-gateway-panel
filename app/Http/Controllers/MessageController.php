<?php

namespace App\Http\Controllers;

use App\Repository\MessageRepository;
use App\Repository\SessionRepository;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    private MessageRepository $repo;

    public function __construct()
    {
        $this->repo = new MessageRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('message.index', [
            'title' => 'Message List',
            'messages' => $this->repo->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('message.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'target' => 'required|numeric'
        ]);

        $send = $this->repo->send([
            'target' => $request->target,
            'text' => $request->message,
        ]);

        if ($send) return redirect()->route('messages.index')->with('Pesan berhasil dikirimkan');
        return redirect()->back()->with('Pesan gagal dikirimkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $ses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
