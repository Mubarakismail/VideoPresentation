<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Videos\Store;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideosController extends BackEndController
{
    public function __construct(Video $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['category','user']; // TODO: Change the autogenerated stub
    }

    protected function append()
    {
        $array= [
            'categories'=>Category::get(),
            'skills'=>Skill::get(),
            'tags'=>Tag::get(),
            'selectedSkills'=>[],
            'selectedTags'=>[],
        ];

        if (\request()->route()->parameter('video')) {
            $array['selectedSkills'] = $this->model->find(\request()->route()->parameter('video'))
                ->skills()->pluck('skills.id')->toArray();
        }
        if (\request()->route()->parameter('video')) {
            $array['selectedTags'] = $this->model->find(\request()->route()->parameter('video'))
                ->Tags()->pluck('Tags.id')->toArray();
        }
        return $array;
    }

    public function store(Store $request){

        $file=$request->file('image');
        $fileName=time().Str::random(10).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'),$fileName);

        $requestArray=['user_id'=> auth()->user()->id,'image'=>$fileName]+$request->all();
        $row = $this->model->create($requestArray);

        $this->syncSkillsTags($row,$requestArray);

        return redirect()->route('videos.index');
    }
    public function update($id,Store $request){

        $requestArray=$request->all();

        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $fileName=time().Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads'),$fileName);
            $requestArray=['image'=>$fileName]+$requestArray;
        }

        $row=$this->model->findOrFail($id);
        $row->update($requestArray);
        $this->syncSkillsTags($row,$requestArray);

        return redirect()->route('videos.index');
    }

    public function syncSkillsTags($row,$requestArray){
        if(isset($requestArray['skills'])&&!empty($requestArray['skills'])) {
            $row->skills()->sync($requestArray['skills']);
        }
        if(isset($requestArray['tags'])&&!empty($requestArray['tags'])) {
            $row->tags()->sync($requestArray['tags']);
        }
    }

}
