<div class="card" style="width: 20rem;">
    <a href="{{route('frontend.video',['id'=>$video->id])}}" title="{{$video->name}}">
        <img class="card-img-top" src="{{asset('uploads/'.$video->image)}}" alt="Card image cap" style="height: 250px;">
    </a>
    <div class="card-body">
        <a href="{{route('frontend.video',['id'=>$video->id])}}" title="{{$video->name}}">
            <h4 class="card-title">{{$video->name}}</h4>
        </a>
        <p class="card-text">{{$video->des}}</p>
        <small>{{$video->created_at}}</small>
    </div>
</div>
