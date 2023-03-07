<?php

namespace App\Http\Controllers;

use App\Repository\MessageRepository;
use App\Repository\SessionRepository;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('message.index', [
            'title' => 'Messages',
            'sess' => (new SessionRepository)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $ses)
    {
        return view('message.show', [
            'title' => 'Message List',
            'messages' => (new MessageRepository($ses))->get(),
            'session' => $ses,
        ]);
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

    public function compose()
    {
        return view('message.compose');
    }

    public function send(Request $request, $session)
    {
        $request->validate([
            'message' => 'required',
            'target' => 'required|numeric'
        ]);

        $send = (new MessageRepository($session))->send([
            'target' => $request->target,
            'text' => $request->message,
        ]);

        if ($send) return redirect()->route('message.index')->with('Pesan berhasil dikirimkan');
        return redirect()->back()->with('Pesan gagal dikirimkan');
    }
}
