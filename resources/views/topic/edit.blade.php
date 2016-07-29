@extends('layouts.master')

@section('title', 'Page Title')

@section('menu')
    @parent
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="label label-info">{{$page}}</div>
        </div>
        <div class="row">
            
        </div>
    </div>
@endsection
        

