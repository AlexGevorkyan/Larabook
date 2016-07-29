<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Larabook</title>
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
        <!-- Latest compiled and minified JavaScript -->
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery-3.0.0.js')}}"></script>
        
        <!-- <link rel="shortcut icon" href="{{asset('images/ico/favicon.ico')}}"> -->
        
    </head><!--/head-->
    <body>
        @section('menu')
        <div class="mainmenu1 col-sm-12 col-md-12 col-lg-12">
            <ul class="nav nav-pills nav-justified">    
                <li role="presentation" 
                    {{$page == 'List Of Contents' ? 'class=active' : ''}}>
                    <a href="{{url('home')}}">
                    Read Topics</a></li>
                <li role="presentation" 
                    {{$page == 'Edit Content' ? 'class=active' : ''}}>
                    <a href="{{url('edit')}}">
                    Create Or Edit</a></li>
                <li role="presentation" 
                    {{$page == 'Add New Topic Title' ? 'class=active' : ''}} >
                    <a href="{{url('create')}}">
                    Add New Title</a></li>
                <li role="presentation" 
                    {{$page == 'Add New Block' ? 'class=active' : ''}} >
                    <a href="{{url('createblock')}}">
                    Add New Block</a></li>
            </ul>
        </div>
        @show

        <div class="container col-sm-12 col-md-12 col-lg-12">
            @yield('content')
        </div>
    </body>
</html>