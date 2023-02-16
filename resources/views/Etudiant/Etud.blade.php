@extends('layouts.app')
@section('title')
    <title>Etudiant</title>
@endsection
@section('home button')
<a   style="color: red; font-weight:bold; margin-left:100px" class="navbar-brand" href="{{ route('Qcmliste.index') }}">
  Liste Qcm
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
  <style>
          body {
        font-weight: bold;
      }
      .container {
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
        padding-left: 10px;
        padding-right: 10px;
      }
      h2 {
        font-size: 26px;
        margin: 20px 0;
        text-align: center;
      }
      h2 small {
        font-size: 0.5em;
      }
      .responsive-table li {
        border-radius: 3px;
        padding: 25px 30px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 25px;
      }
      .responsive-table .table-header {
        background-color: #95a5a6;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.03em;
      }
      .responsive-table .table-row {
        background-color: #fff;
        box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
      }
      .responsive-table .col-1 {
        flex-basis: 20%;
        text-align: center;
      }
      .responsive-table .col-2 {
        text-align: center;

      }
      .responsive-table .col-3 {
        flex-basis: 10%;
        text-align: center;

      }
      .responsive-table .col-4 {
        flex-basis: 20%;
      }
      @media all and (max-width: 767px) {
        .responsive-table .table-header {
          display: none;
        }
        .responsive-table li {
          display: block;
        }
        .responsive-table .col {
          flex-basis: 100%;
        }
        .responsive-table .col {
          display: flex;
          padding: 10px 0;
        }
        .responsive-table .col:before {
          color: #6c7a89;
          padding-right: 10px;
          content: attr(data-label);
          flex-basis: 50%;
          text-align: right;
        }
      
      }
      .button:hover{
          color: red;
          background-color: white;
      }
      .button2{
          border: 2px solid black ;
          height: 10px;
          text-decoration: none;
          background-color: rgb(0, 119, 255);
          color: white;
          transition: 0.5s;
          border-radius: 3px;
          padding: 3px;
          cursor: pointer;
      }
      .button2:hover{
          background-color: rgb(255, 255, 255);
          color: rgb(3, 104, 255);
      }
      .button{
          background-color: red;
          color: white;
          transition: 0.5s;
          border-radius: 3px;
          padding: 2px;
          cursor: pointer;
          font-weight: bold;
      }
      /* From uiverse.io by @satyamchaudharydev */
      /* removing default style of button */

      .form button {
        border: none;
        background: none;
        color: #000000;
        margin-bottom: 2%

      }
      /* styling of whole input container */
      .form {
        --timing: 0.3s;
        --width-of-input: 200px;
        --height-of-input: 40px;
        --border-height: 2px;
        --input-bg: #fff;
        --border-color: #ff0000;
        --border-radius: 30px;
        --after-border-radius: 1px;
        position: relative;
        width: var(--width-of-input);
        height: var(--height-of-input);
        display: flex;
        align-items: center;
        padding-inline: 0.8em;
        border-radius: var(--border-radius);
        transition: border-radius 0.5s ease;
        background: var(--input-bg,#fff);
        margin-left: 25%;
        width: 50%;
        margin-bottom: 5%;
      }
      /* styling of Input */
      .input {
        font-size: 0.9rem;
        background-color: transparent;
        width: 100%;
        height: 100%;
        padding-inline: 0.5em;
        padding-block: 0.7em;
        border: none;
      }
      /* styling of animated border */
      .form:before {
        content: "";
        position: absolute;
        background: var(--border-color);
        transform: scaleX(0);
        transform-origin: center;
        width: 100%;
        height: var(--border-height);
        left: 0;
        bottom: 0;
        border-radius: 1px;
        transition: transform var(--timing) ease;
      }
      /* Hover on Input */
      .form:focus-within {
        border-radius: var(--after-border-radius);
      }

      input:focus {
        outline: none;
      }
      /* here is code of animated border */
      .form:focus-within:before {
        transform: scale(1);
      }
      /* styling of close button */
      /* == you can click the close button to remove text == */
      .reset {
        border: none;
        background: none;
        opacity: 0;
        visibility: hidden;
      }
      /* close button shown when typing */
      input:not(:placeholder-shown) ~ .reset {
        opacity: 1;
        visibility: visible;
      }
      /* sizing svg icons */
      .form svg {
        width: 17px;
        margin-top: 3px;
      }
 
</style>
</head>
<body>
  <div class="container">
    <a href="{{ route('Etud.Create',$id) }}" class="button2">+ Ajouter Etudiant</a>
    <h2>Etudiant's <small>De Votre Qcm</small></h2>
    <form class="form">
      <button>
          <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search">
              <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
      </button>
      <input id="search" class="input" placeholder="Recherch By Matricule Etudiant" required="" type="text">
      <button class="reset" type="reset">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
      </button>
    </form>
    <ul class="responsive-table">
      <thead>
      <li class="table-header">
       <tr><div class="col col-1">Matricule Etudinat</div></tr> 
       <tr><div class="col col-2">Nom </div></tr> 
       <tr><div class="col col-3">Prenom </div></tr> 
       <tr><div class="col col-4"></div></tr> 
      </li>
    </thead>
    <tbody>
      @foreach ( $etudiant as $etudiant )
      @if($etudiant->idEtud == $id)
      <li class="table-row">
        <tr><div class="col col-1" data-label="Matricule">{{ $etudiant->Matricule }}</div></tr>
        <tr><div class="col col-2" data-label="Nom">{{$etudiant->Nom }}</div></tr>
        <tr><div class="col col-3" data-label="Prenom">{{$etudiant->Prenom }}</div></tr>
        <tr><div class="col col-4" data-label="">
        <form action={{ route('etudiant.destroy',$etudiant->id) }}  method="post">
            @csrf
            @method('DELETE')
            <button class="button">Delete</button>
            <a href="{{ route('etudiant.edit',$etudiant->id) }}"   class="button2">Modifier</a>
            <a class="button2">Suiver</a>
        </form>
          </div></tr>
      </li>
      @endif
      @endforeach
    </tbody>
    </ul>
  </div>
</body>
</html>
@endsection
