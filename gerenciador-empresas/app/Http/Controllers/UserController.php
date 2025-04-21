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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255'.$id,
            'password' => 'sometimes|string|min:8',
        ]);

        $updatedUser = $this->userService->update($id, $validatedData);

        return response()->json([
            'message' => 'User editado com sucesso',
            'user' => $updatedUser
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
