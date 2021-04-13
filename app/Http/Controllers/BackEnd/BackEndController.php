<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class BackEndController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $model;
    public function __construct(Model $model)
    {
        $this->model=$model;
    }
    public function index()
    {
        $rows=$this->model;
        $rows=$this->filter($rows);
        $with=$this->with();
        if (!empty($with)) {
            $rows=$rows->with($with);
        }

        $rows=$rows->paginate(10);

        $modulName=$this->pluralModelName();
        $sModulName=$this->getModelName();
        $pageTitle='Control '.$modulName;
        $pageDes='Here you can Add/Edit/Create '.$modulName;

        return view('backend.'.$this->getClassNameFromModel().'.index'
            ,compact('rows','modulName','pageDes','pageTitle','sModulName'));
    }

    public function create()
    {
        $modulName=$this->getModelName();
        $pageTitle='Create '.$modulName;
        $pageDes='Here you can Create '.$modulName;
        $append=$this->append();

        return view('backend.'.$this->getClassNameFromModel().'.create',
            compact('modulName','pageDes','pageTitle'))->with($append);
    }

    public function destroy($id){
        $this->model->findOrFail($id)->delete();
        return redirect()->route($this->getClassNameFromModel().'.index');
    }

    public function edit($id){

        $modulName=$this->getModelName();
        $sModelName=$this->getModelName();
        $pageTitle='Edit '.$modulName;
        $pageDes='Here you can Edit '.$modulName;
        $append=$this->append();
        $row=$this->model->findOrFail($id);


        return view('backend.'.$this->getClassNameFromModel().'.edit',
            compact('row','modulName','pageDes','pageTitle','sModelName'))->with($append);
    }

    protected function filter($rows)
    {
        return $rows;
    }
    protected function with()
    {
        return [];
    }

    protected function getClassNameFromModel()
    {
        // str is Helpers Function to make name of variable جمع
        // strtolower is a normal function to make all characters in lower case
        return strtolower($this->pluralModelName());
    }

    protected function pluralModelName()
    {
        return Str::plural($this->getModelName());
    }
    protected function getModelName()
    {
        return class_basename($this->model);
    }

    protected function append(){
        return [];
    }
}
