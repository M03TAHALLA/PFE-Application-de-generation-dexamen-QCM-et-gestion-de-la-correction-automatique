
@extends('layouts.app')

@section('title')
    <title>HOME</title>
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
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
  <video autoplay loop muted plays-inline class="back">
    <source  src="/videos/BackHome.mp4" type=video/mp4>
</video>
  <h2>EasyQcm en <span style="color: red">3</span> Étapes</h2>
  <a class="button" href="{{ route('Qcmliste.create') }}">Créer Votre Qcm</a>
  <a class="button" href="{{ route('Qcmliste.index') }}">Affiche Votre Liste Num°: <span style="color: red;  font-weight: bold;">{{ $listeqcm }}</span></a>
    <div class="container">
        <div class="card">
          <div class="box">
            <div class="content">
              <h2>01</h2>
              <h3>Type Grille</h3>
              <img style="width: 70%;height:70%" src="/images/i1.jpg">
            </div>
          </div>
        </div>
      
        <div class="card">
          <div class="box">
            <div class="content">
              <h2>02</h2>
              <h3>Scanner Les Copier</h3>
              <p>Permet de Numériser Des Documents, Des Images Ou Des Photos Pour Les Convertir En Fichiers Informatiques</p>
            </div>
          </div>
        </div>
      
        <div class="card">
          <div class="box">
            <div class="content">
              <h2>03</h2>
              <h3>Recupérer Les Resultat</h3>
            </div>
          </div>
        </div>
      </div>
      <div>
      </div>
</body>
</html>    
@endsection