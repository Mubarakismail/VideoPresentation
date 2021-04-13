<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Home extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function index()
    {
        return view('backend.home');
    }
}
