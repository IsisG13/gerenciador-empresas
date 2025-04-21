<?php

namespace App\repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository {

    protected $model;

    public function __construct(
        User $model
    ) {
        $this->model = $model;
    }

    public function index() {
        dd("repository");
        // return $this->model->all();
    }
}