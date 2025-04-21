<?php

namespace App\repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{

    protected $model;

    public function __construct(
        User $model
    ) {
        $this->model = $model;
    }

    public function index()
    {
        dd("repository");
        // return $this->model->all();
    }

    public function users()
    {
        return User::all();
    }

    public function create()
    {
        return User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'number_empresas' => 0,
        ]);
    }

    public function update($id, array $data)
{
    $user = $this->model->findOrFail($id);
    $user->update($data);
    return $user;
}
}