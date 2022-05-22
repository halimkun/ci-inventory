<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->user = new \App\Models\UserModel();
    }

    public function index()
    {
        return view('user', [
            'user'    => $this->user->findAll(),
            'segment' => $this->request->uri->getSegments(),
        ]);
    }
}
