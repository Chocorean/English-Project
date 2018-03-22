@extends('layouts.app')

@section('choices')
<div class="row justify-content-center">
<div class="col-md-10">
    <div class="card">
    <div class="card-header">What do you want to do ?  </div>

    <div class="row justify-content-center">
        <div class="col-md-3">
</div>
<div class="col-md-2">
    <form  action="{{route('videos.create')}}" method="GET">
        <button style="margin-top:10px;margin-bottom:10px;" class="btn btn-primary col-md-offset-2" type="submit">
        <i class="fas fa-video" style="width:6.5em;height:6em;margin-top:2px;margin-bottom:2px;"></i><br/>
        Add a video </button>
    </form>
</div>
    <div class="col-md-5">
    <form  action="{{route('videos.index')}}" method="GET">
        <button style="margin-top:10px;margin-bottom:10px;" class="btn btn-secondary" type="submit">
        <i class="fas fa-question" style="width:6.5em;height:6em;margin-top:2px;margin-bottom:2px;"></i><br/>
        Add a question </button>
</form>
</div>
    </div>
</div>
</div>

@endsection

<script>



</script>