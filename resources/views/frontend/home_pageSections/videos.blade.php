<div class="section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h2 class="title">Latest videos</h2>
                <h5 class="description">Keep learning, latest videos based on published day</h5>
            </div>
        </div>
        <br>
        <br>
        <div class="row text-left">
            @include('frontend.shared.video_row')
        </div>
        <br>
        <a href="{{route('home')}}" class="btn btn-danger btn-round">See Details</a>
    </div>
</div>
