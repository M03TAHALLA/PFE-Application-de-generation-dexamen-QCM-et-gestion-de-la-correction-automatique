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
    @if(isset($success))
    <div class="alert alert-success" id="success-message">
        {{ $success }}
    </div>
    <script>
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            successMessage.classList.add('remove');
            setTimeout(function() {
                successMessage.remove();
            }, 1000); // remove after 1 second
        }, 3000); // remove after 3 seconds
    </script>
@endif
    <div class="bg">
        <video autoplay loop muted plays-inline class="back">
            <source  src="/videos/BackWelcome.mp4" type=video/mp4>
        </video>
        <div class="content">
    <h1>Easy<span>QCM<span></h1>
        <p style="width: 70%;text-align:center;margin-left:15%;font-size:20px"><span>Bienvenue</span> sur  <span>EasyQCM</span> , une plateforme de quiz en ligne qui permet aux <span>Enseignants</span> de créer et gérer des quiz, et aux <span>Etudiants</span> de répondre à des quiz et de suivre leur progression.</p>
            <a  class="button" style="width: 20%;margin-right:10%;"  href="{{ route('home') }}"> <img style="width: 30%;height:30%;color:white" src="/images/Enseignant.png">Enseignant</a>
            <a  class="button" style="width: 20%;"  href="{{ route('Exam.create') }}"> <img style="width: 30%;height:30%;color:white" src="/images/Etudiant.png">Etudiant</a>
        
</div>
    </div>
</body>
</html>    
@endsection