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
            <label class="bmd-label-floating">Meta Keywords</label>
            <input type="text" name="meta_keywords" value="{{isset($row)?$row->meta_keywords:''}}" class="form-control @error('meta_keywords') is-invalid @enderror">
            @error('meta_keywords')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Description</label>
            <textarea name="meta_des" class="form-control @error('meta_des') is-invalid @enderror" cols="30" rows="10">
                {{isset($row)?$row->meta_des:''}}
            </textarea>
            @error('meta_des')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
