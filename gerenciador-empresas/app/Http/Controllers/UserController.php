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
     * Edita o usuario
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255' . $id,
            'password' => 'sometimes|string|min:8',
        ]);

        $updatedUser = $this->userService->update($id, $validatedData);

        return response()->json([
            'message' => 'Uusario editado com sucesso',
            'user' => $updatedUser
        ]);
    }

    /**
     * Deleta um usuario
     */
    public function destroy(string $id)
    {
        $deleted = $this->userService->delete($id);
        if ($deleted) {
            return response()->json(['message' => 'Uusario deletado com sucesso.'], 200);
        }
        return response()->json(['message' => 'Usuario nao existe.'], 404);
    }
}
