@extends('layouts.app')
@section('title')
    <title>Etudiant</title>
@endsection
@section('home button')
<a   style="color: red; font-weight:bold; margin-left:100px" class="navbar-brand" href="{{ route('Qcmliste.index') }}">
  Liste Qcm
</a>
<a   style="color: red; font-weight:bold; margin-left:100px" class="navbar-brand" href="{{ route('Scan.show',$id) }}">
  FastScan
</a>
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/Etudiants/Etudiant.css">
</head>
<body>
  <div class="container">
    <a href="{{ route('Etud.Create',$id) }}" class="button2">+ Ajouter Etudiant</a><br><br><br>

    <a href="{{ route('Etud.PDF', $id) }}"  class="buttonPDF"> <i class="fa fa-file-pdf-o" style="font-size:15px"></i>   Etudiant's PDF <i class="fa fa-download" style="font-size:15px"></i>
    </a>

    
   
    <h2>Etudiant's <small>De Votre Qcm</small></h2>
   
    <ul id="names" class="responsive-table">
      <thead>
      <li class="table-header collection-header">
       <tr><div class="col col-1">Matricule Etudinat</div></tr> 
       <tr><div class="col col-2">Nom </div></tr> 
       <tr><div class="col col-3">Prenom </div></tr> 
       <tr><div class="col col-4"></div></tr> 
      </li>
    </thead>
    <tbody>
      @foreach ( $etudiant as $etudiant )
      @if($etudiant->idEtud == $id)
      <li class="table-row collection-item">
        <div class="col col-1" data-label="Matricule" >{{ $etudiant->Matricule }}</div>
        <div class="col col-2" data-label="Nom" style="text-transform: uppercase;">{{$etudiant->Nom }}</div>
        <div class="col col-3" data-label="Prenom" style="text-transform: uppercase;">{{$etudiant->Prenom }}</div>
        <div class="col col-4" data-label="">
        <form action={{ route('etudiant.destroy',$etudiant->id) }}  method="post">
            @csrf
            @method('DELETE')
            <button class="button">Delete</button>
            <a href="{{ route('etudiant.edit',$etudiant->id) }}"   class="button2">Modifier</a>
            <a class="button3">Suiver</a>
        </form>
          </div>
      </li>
      @endif
      @endforeach
    </tbody>
    </ul>
  </div>
</body>
</html>
@endsection
