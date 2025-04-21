<?php

namespace App\Http\Controllers;


use App\services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return $this->userService->index();
    }

    /**
     * Ver os usuarios
     */
    public function users()
    {
        $users = $this->userService->users();
        return response()->json($users);
    }

    /**
     * Criar usuarios
     */
    public function create()
    {
        return $this->userService->create();
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
