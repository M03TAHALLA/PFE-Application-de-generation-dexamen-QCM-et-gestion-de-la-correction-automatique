@extends('layouts.app')

@section('title')
    <title>Examen</title>
@endsection
@section('home button')
<a   style="color: red; font-weight:bold" class="navbar-brand" href="{{ url('/') }}">
  Home
</a>
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Document</title>
	<link rel="stylesheet" href="/css/Exams/AffichageExam.css">
</head>
    <body>
<main>
  <h3>Mr.{{ $Nom }} {{ $Prenom }}</h3>
  <div class = "card">
    <img style="opacity: 40%" src="images/Exam.jpg" alt="">
    <div class="card-content">
      <h2 style="color:black;font-weight:bold">
        Examen
      </h2>
      <p style="color:black;font-weight:bold">Voici Votre Exam Donner Par Votre Enseignant</p>
	  <a style="color:rgb(255, 0, 0);font-weight:bold" href="{{ route('Exam.show',$Matricule) }}"class="button">Demarer Le Temps</a>
	  
        <span style="color:black;font-weight:bold" class="material-symbols-outlined">
        </span>
      </a>
    </div>
  </div>
  </div>
</main>
</body>
</html>
@endsection