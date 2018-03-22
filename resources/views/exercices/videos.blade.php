@extends('layouts.app')

@section('choices')
<div class="row justify-content-center">
<div class="col-md-10">
    <div class="card">
    <div class="card-header">Choose a video </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            @foreach ($videos as $video)
            <div class="row">
                <div class="col-md-8">
                    <iframe width="420" height="315" src="{{$video->url}}" id="thumbnail">
                    </iframe>
                </div>
                <div class="col-md-3">
                @if (Auth::user()->teacher==1)
                    <form action="{{route('questions.show',$video->id)}}" method="GET">
                        <button type="submit" class="btn btn-block btn-primary" style="margin-top : 120px">Try this video</button>
                    </form>
                    <form action="{{route('questions.new')}}" method="POST">
                    {!! Form::token() !!}
                        <input type="hidden" name="id" value="{{$video->id}}" id="id">
                        <button type="submit" class="btn btn-block btn-warning" style="margin-top:10px;">Add question  &nbsp;<i class="fas fa-plus"></i>  </button>
                    </form>
                    <form action="{{route('videos.destroy',$video->id)}}" method="POST">
                    {!! Form::token() !!}
                    @method('DELETE') 
                        <button type="submit" class="btn btn-block btn-danger" style="margin-top:10px;">Delete this video &nbsp; <i class="fas fa-trash"></i></button>
                    </form>
                @else
                    <form action="{{route('questions.show',$video->id)}}" method="GET">
                        <button type="submit" class="btn btn-block btn-primary" style="margin-top : 155px">Try this video</button>
                    </form>
                @endif
                </div>
            </div>
           @endforeach

        </div>
    </div>
</div>
</div>

@endsection

<script>



</script>