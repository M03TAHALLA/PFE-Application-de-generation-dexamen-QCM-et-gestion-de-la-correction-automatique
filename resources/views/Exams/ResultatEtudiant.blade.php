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

</head>
<body>
  <h3>Note Finale :  {{ $NoteFinale }}/{{ count($SolutionExam) }}</h3>
<div class="card">
    <div class="table-concept">
      <input class="table-radio" type="radio" name="table_radio" id="table_radio_0" checked="checked"/>
      <div class="table-display">Question / Reponse (Etudiant :<span style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:#ff0000"></span>) 
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
  <script>
    var myButton1 = document.getElementById("table_pager_0");
    var myButton2 = document.getElementById("table_pager_1");
    var myButton3 = document.getElementById("table_pager_2");
    var myButton4 = document.getElementById("prev");

    myButton1.addEventListener("click", function() {
window.scrollTo({ top: 0, behavior: 'smooth' });
});
myButton2.addEventListener("click", function() {
window.scrollTo({ top: 0, behavior: 'smooth' });
});
myButton3.addEventListener("click", function() {
window.scrollTo({ top: 0, behavior: 'smooth' });
});

myButton4.addEventListener("click", function() {
window.scrollTo({ top: 0, behavior: 'smooth' });
});
</script>
  @endsection
