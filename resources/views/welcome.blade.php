@extends('layouts.app')
@section('title')
<title>WELCOME</title>
    
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/welcome.css">
</head>
<body>
    <div class="bg">
        <video autoplay loop muted plays-inline class="back">
            <source  src="/videos/BackWelcome.mp4" type=video/mp4>
        </video>
        <div class="content">
    <h1>Easy<span>QCM<span></h1>
        <p><span>Welcome</span> to  <span>EasyQCM</span> (Quiz Application) ! We are excited that you have chosen to participate in our quizzes and tests. Our goal is to provide you with a fun and engaging way to test your knowledge and improve your skills. We have a wide variety of quizzes in different subjects and difficulty levels</p>
            <a class="button" href="{{ route('home') }}">Let Started</a>
</div>
    </div>
</body>
</html>    
@endsection