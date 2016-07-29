@extends('layouts.master')

@section('title', 'Page Title')

@section('menu')
    @parent
@endsection

@section('content')
        <div class="row">
            <!-- <div class="label label-info" style="display:inline-block;width:100%;">{{$page}}</div> -->
            <p class="bg-info" style="text-align:center;">{{$page}}</p>
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
            {!! Form::model($block, ['action' => 'BlockController@store', 'files'=>true,
                'class' => '']) !!}

            <div class="form-group">
                {!! Form::label('topicid', 'Select Topic') !!}
                {{ Form::select('topicid', $topics,['class' => 'form-control input-lg']) }} Or 
                <a href="{{ url('/topic/create') }}" class="btn btn-xs btn-primary">Add New Topic</a>
            </div>

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', '', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('imagepath', 'Choose An Image') !!}
                {!! Form::file('imagepath', '', ['class' => 'form-control']) !!}
    		</div>

            <div class="form-group">
                {!! Form::label('Add Content') !!}
                {!! Form::textarea('text', null, 
                    array('required', 'rows' => 5,
                          'class'=>'form-control', 
                          'placeholder'=>'Your content')) !!}
            </div>

    		<button class="btn btn-success" type="submit">Add Block</button>

			{!! Form::close() !!}
        </div>
@endsection
        

