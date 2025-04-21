<?php

namespace App\services;

use App\repositories\UserRepository;

class UserService {

    protected $userRepository;
    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }
    public  function index() {
        return $this->userRepository->index();
    }
}