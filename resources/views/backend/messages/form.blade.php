<div class="row">
    @csrf
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Name</label>
            <input type="text" name="name" value="{{isset($row)?$row->name:''}}" class="form-control @error('name') is-invalid @enderror">
        </div>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email</label>
            <input type="email" name="email" value="{{isset($row)?$row->email:''}}" class="form-control @error('email') is-invalid @enderror">
        </div>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Message</label>
            <textarea name="message" class="form-control @error('message') is-invalid @enderror">{{isset($row)?$row->message:''}}</textarea>
            @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<hr>

<h4>Replay On Message</h4>

<form action="{{route('message.replay',['id'=>$row->id])}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Message</label>
                <textarea name="messageReplay" class="form-control @error('messageReplay') is-invalid @enderror">{{isset($row)?$row->messageReplay:''}}</textarea>
                @error('messageReplay')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right">Replay</button>
    <div class="clearfix"></div>
</form>
