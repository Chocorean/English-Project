@extends('layouts.app')

@section('choices')
<div class="row justify-content-center">
<div class="col-md-10">
    <div class="card">
    <div class="card-header">Add a video </div>

    <div class="row justify-content-center">
        <form class="form-group col-md-10" method="POST" action="{{route('videos.store')}}">
        {!! Form::token() !!}
            <label class="col-md-3" for="url"> Url : </label>
            <input class="col-md-6" type="text" name="url" id="url"  value="{{old('url')}}">
            @if ($errors->has('url'))
                    <span style="color:red;">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                
                @endif
            <label class="col-md-3" for="level">Level : </label>
            <select class="col-md-6" name="level">
                <option value=""></option>
                <option value="1">Easy</option>
                <option value="2">Medium</option>
                <option value="3">Hard</option>
            </select>
            @if ($errors->has('level'))
                    <span style="color:red;">
                        <strong>{{ $errors->first('level') }}</strong>
                    </span>
                
                @endif
            <label class="col-md-3" for="question"> Question : </label>
            <input class="col-md-6" type="text" name="question" id="question"  value="{{old('question')}}">
            @if ($errors->has('question'))
                    <span style="color:red;">
                        <strong>{{ $errors->first('question') }}</strong>
                    </span>
                
                @endif
            <label class="col-md-3" for="answer">Answer : </label>
            <input class="col-md-6" type="text" name="answer" id="answer"  value="{{old('answer')}}">
            @if ($errors->has('answer'))
                    <span style="color:red;">
                        <strong>{{ $errors->first('answer') }}</strong>
                    </span>
                
                @endif
            <div class="col-md-9">
                <div class="row justify-content-center">
                         <button type="submit" class="btn btn-primary" style="margin-top:10px;">
                                   Add this video &nbsp;<i class="fas fa-plus"></i>
                        </button>
                <div>
            </div>
        </form>
    </div>
</div>
</div>

@endsection

<script>



</script>