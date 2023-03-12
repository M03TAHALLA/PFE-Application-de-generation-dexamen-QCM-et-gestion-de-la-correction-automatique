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
    <style>
      main {
	 display: flex;
	 flex-direction: column;
	 justify-content: center;
	 align-items: center;
	 padding: 50px;
	 font-family: 'Roboto', sans-serif;
}
 .card {
	 width: 24rem;
	 height: 31rem;
	 border-radius: 10px;
	 overflow: hidden;
	 cursor: pointer;
	 position: relative;
	 color: #f0f0f0;
	 box-shadow: 0 10px 30px 5px rgba(0, 0, 0, 0.2);
}
 .card img {
	 position: absolute;
	 object-fit: cover;
	 width: 100%;
	 height: 100%;
	 top: 0;
	 left: 0;
	 opacity: 0.9;
	 transition: opacity 0.2s ease-out;
}
 .card h2 {
	 position: absolute;
	 inset: auto auto 30px 30px;
	 margin: 0;
	 transition: inset 0.3s 0.3s ease-out;
	 font-family: 'Roboto Condensed', sans-serif;
	 font-weight: normal;
	 text-transform: uppercase;
}
 .card p, .card a {
	 position: absolute;
	 opacity: 0;
	 max-width: 80%;
	 transition: opacity 0.3s ease-out;
}
 .card p {
	 inset: auto auto 80px 30px;
}
 .card a {
	 inset: auto auto 40px 30px;
	 color: inherit;
	 text-decoration: none;
}
 .card:hover h2 {
	 inset: auto auto 220px 30px;
	 transition: inset 0.3s ease-out;
}
 .card:hover p, .card:hover a {
	 opacity: 1;
	 transition: opacity 0.5s 0.1s ease-in;
}
 .card:hover img {
	 transition: opacity 0.3s ease-in;
	 opacity: 1;
}
 .material-symbols-outlined {
	 vertical-align: middle;
}
 
    </style>
</head>
    <body>
<main>
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