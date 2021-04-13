<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Users\store;
use App\Http\Requests\BackEnd\Users\update;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends BackEndController
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function store(store $request){

        $requestArray=$request->all();
        $requestArray['password']=Hash::make($requestArray['password']);
        User::create($requestArray);
        return redirect()->route('users.index');
    }
    public function update($id,update $request){

        $row=$this->model->findOrFail($id);

        $requestArray=$request->all();
        if (isset($requestArray['password'])&&$requestArray['password']!=''){

            $requestArray['password']=Hash::make($requestArray['password']);

        } else{
            unset($requestArray['password']);
        }
        $row->update($requestArray);
        return redirect()->route('users.index');
    }
}
