<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use App\Repository\SessionRepository;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    private SessionRepository $repo;

    public function __construct()
    {
        $this->repo = new SessionRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('session.index', [
            'title' => 'Sessions',
            'subt' => 'Device Session',
            'sessions' => $this->repo->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('session.create', [
            'title' => 'Add Session'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SessionRequest $request)
    {
        $data = $this->repo->add(
            $request->name,
            $request->exists('read')
        );

        if (!$data['status']) return to_route('sessions.index');

        return view('session.qr', [
            'qr' => $data['qr']
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
    public function destroy(string $name)
    {
        $this->repo->delete($name);
        return back();
    }
}
