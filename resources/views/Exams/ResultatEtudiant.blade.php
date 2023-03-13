@extends('layouts.app')
@section('title')
    <title>Resultat</title>
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
    <link rel="stylesheet" href="/css/Resultat/Details.css">
    <style>
            .RadioButton {
		cursor: pointer;
		width: 30px;
		height: 30px;
	  }
    input[type=radio]:checked + label {
  background-color: black;
  color: white;
}
button {
 position: relative;
 display: inline-block;
 cursor: pointer;
 outline: none;
 border: 0;
 vertical-align: middle;
 text-decoration: none;
 background: transparent;
 padding: 0;
 font-size: inherit;
 font-family: inherit;
}

button.learn-more {
 width: 12rem;
 height: auto;
}

button.learn-more .circle {
 transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
 position: relative;
 display: block;
 margin: 0;
 width: 3rem;
 height: 3rem;
 background: #26b70d;
 border-radius: 1.625rem;
}

button.learn-more .circle .icon {
 transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
 position: absolute;
 top: 0;
 bottom: 0;
 margin: auto;
 background: #22b60b;
}

button.learn-more .circle .icon.arrow {
 transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
 left: 0.625rem;
 width: 1.125rem;
 height: 0.125rem;
 background: none;
}

button.learn-more .circle .icon.arrow::before {
 position: absolute;
 content: "";
 top: -0.29rem;
 right: 0.0625rem;
 width: 0.625rem;
 height: 0.625rem;
 border-top: 0.125rem solid #fff;
 border-right: 0.125rem solid #fff;
 transform: rotate(45deg);
}

button.learn-more .button-text {
 transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
 position: absolute;
 top: 0;
 left: 0;
 right: 0;
 bottom: 0;
 padding: 0.75rem 0;
 margin: 0 0 0 1.85rem;
 color: #282936;
 font-weight: 700;
 line-height: 1.6;
 text-align: center;
 text-transform: uppercase;
}

button:hover .circle {
 width: 100%;
}

button:hover .circle .icon.arrow {
 background: #ffffff;
 transform: translate(1rem, 0);
}

button:hover .button-text {
 color: #fff;
}
.container {
  width: 100%;
  display: flex;
}

.info, .card {
  display: inline-block;
  width: 90%;
  box-sizing: border-box;
  padding: 10px;
  text-align: center;
}
    </style>

</head>
<body>
  <div style="border: 1px solid black;text-align:left;box-shadow: 5px 10px;;width:50%;margin-bottom:2%;padding:1%;margin-left:25%">
    <h3>Matricule : <span style="color: rgb(0, 1, 1) ;font-weight:bold">{{ $Matricule }}</span></h3>
  <h3>Nom : <span style="color: rgb(0, 1, 1) ;font-weight:bold">{{ $Nom }}</h3>
  <h3>Prenom : <span style="color: rgb(0, 1, 1) ;font-weight:bold">{{ $Prenom }}</h3>
  <h3>Note Finale :  <span style="color: rgb(0, 1, 1) ;font-weight:bold">{{ $NoteFinale }}/{{ count($SolutionExam) }}</h3>
</div>
  <div class="container">
  <div class="infos">
  
<table style="width: 20%;margin-top:30%" class="table table-striped">
  <thead>
    <tr>
      <th>Question</th>
      <th>1</th>
      <th>2</th>
      <th>3</th>
      <th>4</th>
      <th>5</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach ($ReponseEtudiantSol as $ReponseEtudiantSol)
      <td style="font-weight:bold">N°
      </td>
      <td>
        </label>
        @if($ReponseEtudiantSol->A == 1)
        <label class="">
          <input class="RadioButton" type="checkbox" disabled checked value="1" {{ old('is_active') ? 'checked' : '' }}>
          <span><i class="fas fa-check"></i></span>
								  @else 
								  @if($ReponseEtudiantSol->A == 0)
                  <label class="">
                    <input class="RadioButton" disabled type="checkbox" value="1" {{ old('is_active') ? 'checked' : '' }}>
                    <span><i class="fas fa-check"></i></span>
								  @endif
								  @endif
      </td>
      <td>
        @if($ReponseEtudiantSol->B == 1)
        <label class="form-check-custom danger with-icon-side">
        <input class="RadioButton" type="checkbox" disabled checked value="1" {{ old('is_active') ? 'checked' : '' }}>
        <span><i class="fas fa-trash-alt"></i></span>
      </label>
        @else
          @if($ReponseEtudiantSol->B == 0)
          <label class="form-check-custom danger with-icon-side">
            <input class="RadioButton" disabled type="checkbox" value="1" {{ old('is_active') ? 'checked' : '' }}>
            <span><i class="fas fa-trash-alt"></i></span>
          </label>
            @endif
        @endif
      </td>
      <td>
      </label>
      @if($ReponseEtudiantSol->C == 1)
      <label class="">
        <input class="RadioButton" type="checkbox" disabled checked value="1" {{ old('is_active') ? 'checked' : '' }}>
        <span><i class="fas fa-check"></i></span>
                @else 
                @if($ReponseEtudiantSol->C == 0)
                <label class="">
                  <input class="RadioButton" disabled type="checkbox" value="1" {{ old('is_active') ? 'checked' : '' }}>
                  <span><i class="fas fa-check"></i></span>
                @endif
                @endif
    </td>
    <td>
    </label>
    @if($ReponseEtudiantSol->D == 1)
    <label class="">
      <input class="RadioButton" type="checkbox" disabled checked value="1" {{ old('is_active') ? 'checked' : '' }}>
      <span><i class="fas fa-check"></i></span>
              @else 
              @if($ReponseEtudiantSol->D == 0)
              <label class="">
                <input class="RadioButton" disabled type="checkbox" value="1" {{ old('is_active') ? 'checked' : '' }}>
                <span><i class="fas fa-check"></i></span>
              @endif
              @endif
  </td>
  <td>
  </label>
  @if($ReponseEtudiantSol->E == 1)
  <label class="">
    <input class="RadioButton" type="checkbox" disabled checked value="1" {{ old('is_active') ? 'checked' : '' }}>
    <span><i class="fas fa-check"></i></span>
            @else 
            @if($ReponseEtudiantSol->E == 0)
            <label class="">
              <input class="RadioButton" disabled type="checkbox" value="1" {{ old('is_active') ? 'checked' : '' }}>
              <span><i class="fas fa-check"></i></span>
            @endif
            @endif
</td>
    </tr>
@endforeach
  </tbody>
</table>
</div>
<div style="margin-left: 10%" class="card">
    <div class="table-concept">
      <input class="table-radio" type="radio" name="table_radio" id="table_radio_0" checked="checked"/>
      <div class="table-display">Question / Reponse (Etudiant :<span style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:#ff0000">{{ $Nom }} {{ $Prenom }}</span>) 
      </div>
      <table>
        <thead>
          <tr>
            <th>N° Question</th>
            <th>Reponse</th>
          </tr>
        </thead>
        <tbody>
            <?php $j = 1 ?>
            @for ($i=0; $i<count($ReponseEtudiant) ; $i++)
          <tr>
            <td><?php echo $j ?></td>
            <td>{{$ReponseEtudiant[$i]}}</td>
          </tr>
        </tbody>
        <?php  $j++ ?>
        @endfor 
      </table>
      <div class="pagination">
        <label id="prev"  class="disabled" for="table_radio_-1">&laquo; Previous</label>
        <label class="active" for="table_radio_0" id="table_pager_0">Questions / Reponses </label>
        <label for="table_radio_1" id="table_pager_1">Solutions</label>
        <label for="table_radio_2" id="table_pager_2">Resultat</label>
        <label for="table_radio_1">Next &raquo;</label>
      </div>
      <input class="table-radio" type="radio" name="table_radio" id="table_radio_1"/>
      <div class="table-display"> Solution QCM 
      </div>
      <table>
        <thead>
          <tr>
            <th>N° Question</th>
            <th>Solution</th>
          </tr>
        </thead>
        <tbody>
          <tr>
                <?php $j = 1 ?>
                @for ($i=0; $i<count($SolutionExam) ; $i++)
                <tr>
                <td><?php echo $j ?></td>
                <td> {{ $SolutionExam[$i] }}</td>
          </tr>
        </tbody>
        <?php  $j++ ?>
        @endfor
      </table>
      <div class="pagination">
        <label id="prev"  for="table_radio_0">&laquo; Previous</label>
        <label for="table_radio_0" id="table_pager_0">Questions / Reponses </label>
        <label class="active" for="table_radio_1" id="table_pager_1">Solutions</label>
        <label for="table_radio_2" id="table_pager_2">Resultat</label>
        <label for="table_radio_2">Next &raquo;</label>
      </div>
      <input class="table-radio" type="radio" name="table_radio" id="table_radio_2"/>
      <div class="table-display">Resultat
      </div>
      <table>
        <thead>
          <tr>
            <th>N°Question</th>
            <th>Result</th>
          </tr>
        </thead>
        <tbody>
            <?php $j = 1 ?>
            @for ($i=0; $i<count($ResultatExam) ; $i++)
          <tr>
            <td><?php echo $j ?></td>
            <td>@if($ResultatExam[$i] == 'True')
                <span style="color: green">True &#9989;</span>
                @endif
                @if($ResultatExam[$i] == 'False')
                <span style="color: rgb(255, 0, 0)">False &#10060; </span>
                @endif
            </td>
          </tr>
        </tbody>
        <?php  $j++ ?>
        @endfor
        
      </table>
      <div class="pagination">
        <label id="prev" for="table_radio_1">&laquo; Previous</label>
        <label for="table_radio_0" id="table_pager_0">Questions / Reponses </label>
        <label for="table_radio_1" id="table_pager_1">Solutions</label>
        <label class="active" for="table_radio_2" id="table_pager_2">Resultat</label>
        <label for="table_radio_3">Next &raquo;</label>
      </div>
    </div>
  </div>
</div>
  @endsection
