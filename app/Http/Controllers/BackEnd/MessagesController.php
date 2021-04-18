<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Messages\Store;
use App\Mail\ReplayContent;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends BackEndController
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }
    public  function replay($id,Store $request)
    {
        $message=$this->model->findOrFail($id);
        Mail::send(new ReplayContent($message,$request->messageReplay));
        return redirect()->route('messages.edit',['message'=> $message->id]);
    }
}
