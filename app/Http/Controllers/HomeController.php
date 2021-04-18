<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontEnd\Messages\Store;
use App\Models\Category;
use App\Models\Message;
use App\Models\Page;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos=Video::orderBy('id','desc');
        if (\request()->has('search')&&\request()->get('search')!='')
        {
            $searchString='%'.\request()->get('search').'%';
            //dd($searchString);
            $videos=$videos->where('name','LIKE',$searchString);
        }
        $videos=$videos->paginate(30);
        return view('home',compact('videos'));
    }

    public function video($id){

        $video=Video::findOrFail($id);
        return view('frontend.video.index',compact('video'));
    }

    public function category($id){

        $cat=Category::findOrFail($id);
        $videos=Video::where('cat_id',$id)->orderBy('id','desc')->paginate(30);
        return view('frontend.category.index',compact('videos','cat'));
    }
    public function skills($id){

        $skill=Skill::findOrFail($id);
        $videos=$skill->videos()->orderBy('id','desc')->paginate(30);
        return view('frontend.skill.index',compact('videos','skill'));
    }
    public function message(Store $request)
    {
        //dd($request->all());
        Message::create($request->all());
        alert()->success('Your Message have been saved, will call U in 24 Hours', 'Done');
        return redirect()->route('frontend.landing');
    }
    public function welcome()
    {
        $videos=Video::orderBy('id','desc')->paginate(9);
        $videosCount=Video::count();
        $commentsCount=0;
        $tagsCount=Tag::count();
        return view('welcome',compact('videos','videosCount','commentsCount','tagsCount'));
    }
    public function page($id,$slug=null)
    {
        $page=Page::findOrFail($id);
        return view('frontend.page.index',compact('page'));
    }
}
