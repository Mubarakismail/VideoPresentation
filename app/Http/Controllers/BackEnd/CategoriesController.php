<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Categories\store;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoriesController extends BackEndController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function store(store $request){

        $this->model->create($request->all());
        return redirect()->route('categories.index');
    }
    public function update($id,store $request){

        $row=$this->model->findOrFail($id);
        $row->update($request->all());
        return redirect()->route('categories.index');
    }
}
