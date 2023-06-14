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
            'title' => 'Session',
            'subt' => 'Device Session',
            'authenticated' => $this->repo->authenticated(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if($this->repo->authenticated())
            return redirect()->route('sessions.index');

        return view('session.create', [
            'title' => 'Connect Session',
            'qrCode' => $this->repo->qrCode(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SessionRequest $request)
    {

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

    }
}
