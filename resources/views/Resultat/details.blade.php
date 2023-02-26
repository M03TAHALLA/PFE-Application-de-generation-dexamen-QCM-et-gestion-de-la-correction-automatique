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
    <style>
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");

 .card {
	 background-color: #fff;
	 width: 100%;
	 max-width: 100%;
	 max-height: 100%;
	 display: flex;
	 flex-direction: column;
	 box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
}
 .table-concept {
	 width: 100%;
	 height: 100%;
	 max-height: 100%;
	 overflow: auto;
	 box-sizing: border-box;
}
 .table-concept .table-radio {
	 display: none;
}
 .table-concept .table-radio:checked + .table-display {
	 display: block;
}
 .table-concept .table-radio:checked + .table-display + table {
	 width: 100%;
	 display: table;
}
 .table-concept .table-radio:checked + .table-display + table + .pagination {
	 display: flex;
}
 .table-concept .table-radio:checked + .table-display + table + .pagination > label.active {
	 color: #fff;
	 background-color: #ff0000;
	 cursor: default;
}
 .table-concept .table-radio:checked + .table-display + table + .pagination > label.disabled {
	 color: #fff;
	 background-color: #b5b5b5;
	 cursor: default;
}
 .table-concept .table-display {
	 background-color: #f6f6f6;
	 text-align: center;
	 padding: 10px;
	 display: none;
	 position: sticky;
	 left: 0;
     font-weight:bold; 

}
 .table-concept table {
	 background-color: #fff;
	 font-size: 16px;
	 border-collapse: collapse;
	 display: none;
}
 .table-concept table tr:last-child td {
	 border-bottom: 0;
}
 .table-concept table tr th, .table-concept table tr td {
	 text-align: left;
	 padding: 15px;
	 box-sizing: border-box;
}
 .table-concept table tr th {
	 color: #fff;
	 font-weight: normal;
	 background-color: #8f8f8f;
	 border-bottom: solid 2px #d8d8d8;
	 position: sticky;
	 top: 0;
          text-align: center;
}
 .table-concept table tr td {
	 border: solid 1px #d8d8d8;
	 border-left: 0;
	 border-right: 0;
	 white-space: nowrap;
     text-align: center;
}
 .table-concept table tbody tr {
	 transition: background-color 150ms ease-out;
}
 .table-concept table tbody tr:nth-child(2n) {
	 background-color: #f5f5f5;
}
 .table-concept table tbody tr:hover {
	 background-color: #ebebeb;
}
 .table-concept .pagination {
	 background-color: #8f8f8f;
	 width: 100%;
	 display: none;
	 position: sticky;
	 bottom: 0;
	 left: 0;
}
 .table-concept .pagination > label {
	 background-color: #8f8f8f;
	 color: #fff;
	 padding: 10px;
	 cursor: pointer;
}
 .table-concept .pagination > label:hover {
	 background-color: #a9a9a9;
}
 .table-concept .pagination > label:active {
	 background-color: #767676;
     scale: top;
}
 .table-title {
	 color: #fff;
	 background-color: #2f2f2f;
	 padding: 15px;
}
 .table-title h2 {
	 margin: 0;
	 padding: 0;
}
 .button-container {
	 width: 100%;
	 box-sizing: border-box;
	 display: flex;
	 justify-content: flex-end;
}
 .button-container span {
	 color: #8f8f8f;
	 text-align: right;
	 min-height: 100%;
	 display: flex;
	 align-items: center;
	 justify-content: center;
	 margin-left: 10px;
	 margin-right: 10px;
}
 .button-container button {
	 font-family: inherit;
	 font-size: inherit;
	 color: #fff;
	 padding: 10px 15px;
	 border: 0;
	 margin: 0;
	 outline: 0;
	 border-radius: 0;
	 transition: background-color 225ms ease-out;
}
 .button-container button.primary {
	 background-color: #147eff;
}
 .button-container button.primary:hover {
	 background-color: #479aff;
}
 .button-container button.primary:active {
	 background-color: #0065e0;
}
 .button-container button.primary {
	 background-color: #147eff;
}
 .button-container button.primary:hover {
	 background-color: #479aff;
}
 .button-container button.primary:active {
	 background-color: #0065e0;
}
 .button-container button.danger {
	 background-color: #d11800;
}
 .button-container button.danger:hover {
	 background-color: #ff2205;
}
 .button-container button.danger:active {
	 background-color: #9e1200;
}
 .button-container button svg {
	 fill: #fff;
	 vertical-align: middle;
	 padding: 0;
	 margin: 0;
}
 
    </style>
</head>
<body>
<div class="card">
    <div class="table-concept">
      <input class="table-radio" type="radio" name="table_radio" id="table_radio_0" checked="checked"/>
      <div class="table-display">Question / Reponse (Etudiant :<span style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:#ff0000">{{ $Nom }}</span>) 
      </div>
      <table>
        <thead>
          <tr>
            <th>N° Question</th>
            <th>Reponse</th>
          </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            @foreach($ReponseArray as $caractere)
          <tr>
            <td><?php echo $i ?></td>
            <td>{{ $caractere }}</td>
          </tr>
        </tbody>
        <?php  $i++ ?>
        @endforeach 
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
                <?php $i = 1 ?>
                @foreach($solution as $solution)
                <tr>
                <td><?php echo $i ?></td>
                <td>@if($solution->A ==1 )
                    1
                @endif
                @if($solution->B ==1 )
                    2
                @endif
                @if($solution->C ==1 )
                    3
                @endif
                @if($solution->D ==1 )
                    4
                @endif
                @if($solution->E ==1 )
                    5
                @endif</td>
          </tr>
        </tbody>
        <?php  $i++ ?>
        @endforeach 
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
          <tr>
            <td></td>
            <td></td>
          </tr>
        </tbody>
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