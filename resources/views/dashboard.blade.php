@extends('layouts.app')

@section('choices')
<div class="col-md-12">
  <h2>Choose a level and start your training</h2>
  @if (Auth::user()->teacher==1)
    <h5><u>Tip :</u> as a teacher, you can add some exercices</h5>
  @endif
</div>
<hr/>
<div class="container">
  <div class="row justify-content-center">
    <div class="card">
      <div class="card-header">
        <div class="btn-group">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <form action="{{url('videos/1')}}" method="GET"><button type="submit" class="nav-link">Easy</button></form>
            </li><li>
              <form action="{{url('videos/2')}}" method="GET"><button type="submit" class="nav-link">Medium</button></form>
            </li><li>
              <form action="{{url('videos/3')}}" method="GET"><button type="submit" class="nav-link">Hard</button></form>
            </li>
            @if (Auth::user()->teacher==1)
              <li><form action="{{url('newExercice')}}" method="GET"><button type="submit" class="nav-link">Edit exercices &nbsp;<i class="fas fa-cogs"></i></button></form></li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
