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
        	<div class="col-md-3 col-lg-3 col-sm-3 dleft ">
        		@foreach ($topics as $t)
	                <li class=""><a href='{{url("topic/$t->id")}}'> 
	                    <span class="">{{$t->topicname}}</span>
	                </a></li>
            	@endforeach
        	</div>
        	<div class="col-md-9 col-lg-9 col-sm-9 dright ">
        		@if ($id != 0)
				    @foreach ($blocks as $b)
	                    <p class="">
                            <h2>{{$b->title}}</h2>
                            {{$b->text}}
                        </p>
                        @if ($b->imagepath != '')
    	                    <a href='{{url("$b->imagepath")}}'>
    							<img src='{{asset($b->imagepath)}}' alt='picture' height='150px' float='left'>
    						</a> 
                        @endif
						<!-- <img src="{{ asset($b->imagepath) }}" height="150" /> -->
            		@endforeach
				@else
				    I don't have any records!
				@endif
        	</div>	
        </div>
@endsection
        

