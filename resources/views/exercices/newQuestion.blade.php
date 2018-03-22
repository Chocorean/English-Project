@extends('layouts.app')

@section('choices')
<div class="row justify-content-center">
<div class="col-md-10">
    <div class="card">
    <div class="card-header">Add a question to this video </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row justify-content-center">
                        <iframe width="420" height="315" src="{{$video->url}}" id="thumbnail">
                        </iframe>
                    </div>
                    <div class="row justify-content-center">
                        <form class="form-group col-md-10" method="POST" action="{{route('questions.store')}}">
                        {!! Form::token() !!}
                            <input type="hidden" id="video_id" name="video_id" value="{{$video->id}}">
                            <label class="col-md-3" for="question"> Question : </label>
                            <input class="col-md-6" type="text" name="question" id="question" value="{{old('question')}}">
                            @if ($errors->has('question'))
                    <span style="color:red;">
                        <strong>{{ $errors->first('question') }}</strong>
                    </span>
                
                @endif
                            <label class="col-md-3" for="answer">Answer : </label>
                            <input class="col-md-6" type="text" name="answer" id="answer" value="{{old('answer')}}">
                            @if ($errors->has('answer'))
                    <span style="color:red;">
                        <strong>{{ $errors->first('answer') }}</strong>
                    </span>
                
                @endif
                            <div class="col-md-9">
                                <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-primary" style="margin-top:10px;">
                                                Add this question &nbsp;<i class="fas fa-plus"></i>
                                        </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row justify-content-center">
                    <table style="width:100%; margin-top:10px; margin-bottom:10px">
                        <tr>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($questions as $question)
                        <tr>
                            <td>{{$question->question}}</td>
                            <td>{{$question->answer}}</td>
                            <td>
                            <form action="{{route('questions.destroy',$question->id)}}" method="POST">
                    {!! Form::token() !!}
                    @method('DELETE') 
                            <button type="submit" class="btn btn-block btn-danger">Delete question &nbsp;<i class="fas fa-trash"></i></button>
                            </form>
</td>
                        </tr>
                        @endforeach
                    </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

<script>



</script>