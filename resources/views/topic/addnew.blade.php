@extends('layouts.master')

@section('title', 'Page Title')

@section('menu')
    @parent
@endsection

@section('content')
        <div class="row">
            <div class="label label-info"  style="display:inline-block;width:100%;">{{$page}}</div>
        </div>
        
        <div class="row">
        @if (count(session('errors')) > 0)
            <div class="alert alert-danger">
              @foreach (session('errors')->all() as $error)
                {{ $error }}<br>
              @endforeach
            </div>
        @endif

        @if (session('message'))
            <div class="alert alert-success">
              {{ session('message') }}
            </div>
        @endif
        </div>

        
        <div class="row">
            {!! Form::model($topic, ['action' => 'TopicController@store']) !!}
            <div class="form-group">
      			{!! Form::label('topicname', 'Title') !!}
      			{!! Form::text('topicname', '', ['class' => 'form-control']) !!}
    		</div>

    		<button class="btn btn-success" type="submit">Add Topic</button>

			{!! Form::close() !!}
        </div>
@endsection
        

