<?php

namespace App\services;

use App\repositories\UserRepository;

class UserService {

    protected $userRepository;
    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }
    public function index() {
        return $this->userRepository->index();
    }

    public function users() {
        $user = $this->userRepository->users();
        return $user;
    }

    public function create() {
        return $this->userRepository->create();
    }

    public function update($id, array $data)
{
    if (isset($data['password']) && empty($data['password'])) {
        unset($data['password']);
    }

    // Se password existir, criptografa
    if (isset($data['password'])) {
        $data['password'] = bcrypt($data['password']);
    }

    return $this->userRepository->update($id, $data);
}
}