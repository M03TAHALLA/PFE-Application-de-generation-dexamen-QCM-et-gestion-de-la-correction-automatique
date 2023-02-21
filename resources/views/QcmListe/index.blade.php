@extends('layouts.app')
@section('title')
    <title>ListeQcm</title>
@endsection
@section('home button')
<a id="home"  style="color: red" class="navbar-brand" href="{{ url('/') }}">
  Home
</a>
<a id="nav"  class="navbar-brand" href="{{ route('Qcmliste.create') }}">
  Create New Qcm
</a>

@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/Qcmlistecss/index.css">

</head>
<body>
<div class="container">
    <h2>Liste Des <span style="color: red">QCM<span><small></small></h2>
    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">Id </div>
        <div class="col col-2">Date Création</div>
        <div class="col col-3">Matière</div>
        <div class="col col-3">Libelle</div>
        <div class="col col-4">Nombre Question</div>
      </li>
      @foreach($listeqcm as $listeqcm)
      @if($listeqcm->user_id== auth()->user()->id)
      <li style="cursor: pointer" class="table-row">
        <div class="col col-1" data-label="Id ">{{ $listeqcm->idqcm }}</div>
        <div class="col col-2" data-label="Date">{{ $listeqcm->created_at }}</div>
        <div class="col col-3" data-label="Matière">{{ $listeqcm->matiere }}</div>
        <div class="col col-3" data-label="Matière">{{ $listeqcm->libelle }}</div>
        <div class="col col-4" data-label="Nombre Question">{{ $listeqcm->NbrQuestion }}</div>
        <div class="col col-5">
          <form style="display: contents"  action={{ route('Qcmliste.destroy',$listeqcm->id) }} method="post">
            @csrf
            @method('DELETE')
            <button style="border: 2px solid black" class="button">Delete</button>
          </form>
            <a href="{{ route('Qcmliste.edit',$listeqcm->id) }}" class="button2">Modifier</a>
            <a href="{{ route('Solution.show',$listeqcm->id) }}" class="button3">Suiver</a>
      </li> 
      @endif    
      @endforeach
    </ul>
  </div> 
</body> 
@endsection