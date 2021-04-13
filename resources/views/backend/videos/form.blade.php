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
    @csrf
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Youtube Url</label>
            <input type="text" name="youtube" value="{{isset($row)?$row->youtube:''}}" class="form-control @error('youtube') is-invalid @enderror">
        </div>
        @error('youtube')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Image url</label>
            <input type="text" name="image" value="{{isset($row)?$row->image:''}}" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    @csrf
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Status</label>
            <select name="published" class="form-control @error('published') is-invalid @enderror">
                <option value="1" {{isset($row)&&$row->published==1?'selected':''}}>published</option>
                <option value="0" {{isset($row)&&$row->published==0?'selected':''}}>hidden</option>
            </select>
        </div>
        @error('published')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Category</label>
            <select name="cat_id" class="form-control @error('cat_id') is-invalid @enderror">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" >{{$category->name}}</option>
                @endforeach
            </select>
            @error('cat_id')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @php $input="skills[]" @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Skills</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror" multiple style="height: 100px">
                @foreach($skills as $skill)
                    <option value="{{$skill->id}}" {{in_array($skill->id,$selectedSkills)?'selected':''}}>
                        {{$skill->name}}
                    </option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php $input="tags[]" @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Tags</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror" multiple style="height: 100px">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" {{in_array($tag->id,$selectedTags)?'selected':''}}>
                        {{$tag->name}}
                    </option>
                @endforeach
            </select>
            @error($input)
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
            <textarea rows="2" cols="5" name="meta_des" class="form-control @error('meta_des') is-invalid @enderror">{{isset($row)?$row->meta_des:''}}</textarea>
            @error('meta_des')
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
            <label class="bmd-label-floating">Description Of Page</label>
            <textarea rows="2" cols="5" name="des" class="form-control @error('des') is-invalid @enderror">{{isset($row)?$row->des:''}}</textarea>
            @error('des')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
