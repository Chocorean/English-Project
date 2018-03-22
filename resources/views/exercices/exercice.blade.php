@extends('layouts.app')

@section('choices')
<div class="row justify-content-center">
<div class="col-md-10">
    <div class="card">
    <div class="card-header">Answer the questions </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row justify-content-center">
                <iframe width="420" height="315" src="{{$video->url}}" id="thumbnail">
                </iframe>
            </div>
            <div class="row justif-content-center">
            @foreach ($questions as $question)
            <form class="form-group col-md-12" method="POST" action="{{route('check')}}">
        {!! Form::token() !!}
                <input type="hidden" value="{{$question->id}}" name="id" id="id">
               
             <label class="col-md-9" for="{{'answer_'.$question->id}}"> {{$question->question}} </label>
                <input class="col-md-9" type="text" name="{{'answer_'.$question->id}}" id="{{'answer_'.$question->id}}" value="{{old('answer_'.$question->id)}}">
                         <button style="padding-top=0px;" type="submit" class="btn btn-success col-md-2" style="margin-top:10px;">
                                   Check
                        </button>
                        <br/>
                        @if ($errors->has('answer_'.$question->id))
                    <span style="color:red;">
                        <strong>{{ $errors->first('answer_'.$question->id) }}</strong>
                    </span>
                
                @endif
                @if ($errors->has('correct_answer_'.$question->id))
                    <span style="color:green;">
                        <strong>{{ $errors->first('correct_answer_'.$question->id) }}</strong>
                    </span>
                @endif


<!--    <label class="col-md-9" for="answer"> {{$question->question}} </label>
                <input class="col-md-9" type="text" name="answer" id="answer" value="{{old('answer')}}">
                @if ($errors->has('answer'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('answer') }}</strong>
                    </span>
                
                @endif
                @if ($errors->has('correct_answer'))
                    <span style="color:green;">
                        <strong>Good job</strong>
                    </span>
                @endif
                         <button style="padding-top=0px;" type="submit" class="btn btn-success col-md-2" style="margin-top:10px;">
                                   Check
                        </button>-->
             </form>
            @endforeach
    </div>
        </div>
    </div>
</div>
</div>

@endsection

<script>



</script>