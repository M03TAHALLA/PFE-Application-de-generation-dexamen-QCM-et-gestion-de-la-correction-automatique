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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
          border: 2px solid black ;
          display: inline;
          margin-left: -14%;
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
      .button3{
    border: 2px solid black ;
    height: 10px;
    text-decoration: none;
    background-color: green;
    color: white;
    transition: 0.5s;
    border-radius: 3px;
    padding: 3px;
    cursor: pointer;
}
.button3:hover{
    background-color: rgb(255, 255, 255);
    color: green;
    cursor: pointer;
}
.buttonPDF{
  border: 2px solid black ;
    height: 10px;
    text-decoration: none;
    background-color: rgb(255, 5, 5);
    color: white;
    transition: 0.5s;
    border-radius: 3px;
    padding: 3px;
    cursor: pointer;
    font-size: 15px;
    padding: 1%;
    border-radius: 30px;
}
.buttonPDF:hover{
    background-color: rgb(255, 255, 255);
    color: rgb(255, 0, 0);
    cursor: pointer;
}
</style>
</head>
<body>
  <div class="container">
    <a href="{{ route('Etud.Create',$id) }}" class="button2">+ Ajouter Etudiant</a><br><br><br>

    <a href="{{ route('Etud.PDF', $id) }}" class="buttonPDF"> <i class="fa fa-file-pdf-o" style="font-size:15px"></i>   Etudiant's PDF <i class="fa fa-download" style="font-size:15px"></i>
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
