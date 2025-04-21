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
}