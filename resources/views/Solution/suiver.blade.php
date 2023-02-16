
@extends('layouts.app')
@section('title')
    <title>QCM</title>
@endsection
@section('home button')
<a   style="color: red; font-weight:bold" class="navbar-brand" href="{{ route('Qcmliste.index') }}">
  Liste Qcm
</a>
@endsection
@section('content')
<link rel="stylesheet" href="/css/Qcmlistecss/solution.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.2/xlsx.full.min.js"></script>
<script
			src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
			integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer">
</script>
<section class="dark">
	<div class="container py-4">
		<h1 class="h1 text-center" id="pageHeaderTitle">QCM :<span style="color: red"> {{ $listeqcm->libelle }}</span></h1>
		<article class="postcard dark red">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="/images/{{ $listeqcm->NbrChiffreEtudiant }}.jpg" alt="Image Title" />	
				<img class="postcard__img" src="/images/S{{ $listeqcm->NbrReponse }}.jpg" alt="Image Title" />	
			</a>
			<div class="postcard__text">
				<h1 class="postcard__title red"><a href="#">Matiere : <span style="color: red">{{ $listeqcm->matiere }}</span></a></h1>
				<div class="postcard__subtitle small">
					<time datetime="2020-05-25 12:00:00">
						<i class="fas fa-calendar-alt mr-2"></i>{{ $listeqcm->created_at }}
					</time>
				</div>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">Id Qcm : {{ $listeqcm->idqcm }}</div>
				<div class="postcard__preview-txt">Nombre Question  : {{ $listeqcm->NbrQuestion }}</div>
				<div class="postcard__preview-txt">Nombre De Reponse : {{ $listeqcm->NbrReponse }}</div>
				<div class="postcard__preview-txt">Nombre De  ChiffreEtudiant Dans La Matricule	 : {{ $listeqcm->NbrChiffreEtudiant	 }}</div>
				<div class="postcard__preview-txt">Créer Par 	 :<span style="color: red ; text-transform: capitalize;"> {{ auth()->user()->name	 }}</span></div>
				<ul class="postcard__tagbox">
					Les Notes
					<li class="tag__item"><i class="fas fa-tag mr-2"></i>Vrai :  <span style="color:green">{{ $listeqcm->Point }}pts</span></li>
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>Faux : <span style="color: red">{{ $listeqcm->PointF }}pts</span></li>
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>Son Reponse : <span style="color: rgb(105, 94, 94)">{{ $listeqcm->PointN }}pts</span></li>
				</ul>
			</div>
		</article>
	</div>
</section>
<section class="light">
	<div class="container py-2">
		<div class="h1 text-center text-dark" id="pageHeaderTitle">Solution </div>
		@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
<button type="button" id="export_button" style="color: rgb(255, 255, 255)" class="btn btn-success btn-sm">Export Les Reponse Format Excel </button>
@endif
<?php

$connect = new PDO("mysql:host=localhost;dbname=qcmdb", "root", "");
$query = "SELECT * FROM solutions WHERE qcmliste_id=$listeqcm->id ORDER BY id  ASC";
$result = $connect->query($query);
?>
<table hidden  id="employee_data" class="table table-striped table-bordered">
	<tr>
		<th>Qusetion</th>
		<th>Reponse </th>
	</tr>
	<?php
	$i = 1;
	foreach($result as $row)
	{
		echo '<tr>';
		echo '<td>' . $i . '</td>';
		if($row['A']==1){
			echo '<td>A ';if($row['B']==1){echo ' , B';}if($row['C']==1){echo ' , C';};if($row['D']==1){echo ' , D';};if($row['E']==1){echo ' , E';}echo'</td>';
			$i =$i+1;
			continue;
		}
		if($row['B']==1){
			echo '<td>B ';if($row['A']==1){echo ' , A';}if($row['C']==1){echo ' , C';};if($row['D']==1){echo ' , D';};if($row['E']==1){echo ' , E';}echo'</td>';
			$i =$i+1;
			continue;
		}
		if($row['C']==1){
			echo '<td>C';if($row['A']==1){echo ' , A';}if($row['B']==1){echo ' , B';};if($row['D']==1){echo ' , D';};if($row['E']==1){echo ' , E';}echo'</td>';
			$i =$i+1;
			continue;
		}
		if($row['D']==1){
			echo '<td>D';if($row['A']==1){echo ' , A';}if($row['B']==1){echo ' , B';};if($row['C']==1){echo ' , C';};if($row['E']==1){echo ' , E';}echo'</td>';
			$i =$i+1;
			continue;
		}
		if($row['E']==1){
			echo '<td>E';if($row['A']==1){echo ' , A';}if($row['B']==1){echo ' , B';};if($row['C']==1){echo ' , C';};if($row['D']==1){echo ' , D';}echo'</td>';
			$i =$i+1;
			continue;
		}
	   
		echo '</tr>';
	}
	?>
</table>
		<article class="postcard light blue">
			<div class="postcard__text t-dark">
				<div class="postcard__subtitle small">
				</div>
				<form action="{{ route('Solution.store') }}" method="POST">
					@csrf
				<table id="myTable">
					<input value="{{ $listeqcm->id }}" hidden name="idqcm">
					<input value="{{ $listeqcm->created_at }}" hidden name="created_at">
					<input value="{{  $listeqcm->NbrQuestion }}" hidden  name="NbrQuestion">
					<thead>
					  <tr class="thead">
						<th scope="col">N° Question</th>
						<th scope="col">A</th>
						<th scope="col">B</th>
						<th scope="col">C</th>
						<th scope="col">D</th>
						<th scope="col">E</th>
					  </tr>
					</thead>
					<tbody>
						@for($i=1;$i <= $listeqcm->NbrQuestion ; $i++)
						@if ($listeqcm->NbrReponse == 2 )	
							<tr>
							<td data-label="Name"><div class="content">{{ $i }}</div></td>
							<td  data-label="Name"><div class="content">
								<label class="checkBox">
								  <input id="ch1" name="A{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }}   type="checkbox">
								  <div class="transition"></div></label>
							</td>
							<td  data-label="Title"><label class="checkBox">
								<input id="ch1" name="B{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }} type="checkbox">
								<div class="transition"></div></label>
							</td>
						  </tr>
						  @endif
						@if ($listeqcm->NbrReponse == 3 )	
						<tr>
							<td data-label="Name"><div class="content">{{ $i }}</div></td>
							<td data-label="Name"><div class="content">
								<label class="checkBox">
								  <input id="ch1" name="A{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }}  type="checkbox">
								  <div class="transition"></div></label>
							</td>
							<td data-label="Title"><label class="checkBox">
								<input id="ch1" name="B{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }} type="checkbox">
								<div class="transition"></div></label>
							</td>
							<td data-label="Website"><label class="checkBox">
								<input id="ch1" name="C{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }} type="checkbox">
								<div class="transition"></div></label>
							</td>
						  </tr>
						  @endif
						@if ($listeqcm->NbrReponse == 4 )	
						<tr>
							<td data-label="Name"><div class="content">{{ $i }}</div></td>
							<td data-label="Name"><div class="content">
								<label class="checkBox">
								  <input id="ch1" name="A{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }}  type="checkbox">
								  <div class="transition"></div></label>
							</td>
							<td data-label="Title"><label class="checkBox">
								<input id="ch1" name="B{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }} type="checkbox">
								<div class="transition"></div></label>
							</td>
							<td data-label="Website"><label class="checkBox">
								<input id="ch1" name="C{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }} type="checkbox">
								<div class="transition"></div></label>
							</td>
							<td data-label="Role"><label class="checkBox">
								<input id="ch1" name="D{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }} type="checkbox">
								<div class="transition"></div></label>
							</td>
						  </tr>
						  @endif
						@if ($listeqcm->NbrReponse == 5 )	
						<tr>
							<td data-label="Name"><div class="content">{{ $i }}</div></td>
							<td data-label="Name"><div class="content">
								<label class="checkBox">
								  <input id="ch1" name="A{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }}  type="checkbox">
								  <div class="transition"></div></label>
							</td>
							<td data-label="Title"><label class="checkBox">
								<input id="ch1" name="B{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }} type="checkbox">
								<div class="transition"></div></label>
							</td>
							<td data-label="Website"><label class="checkBox">
								<input id="ch1" name="C{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }} type="checkbox">
								<div class="transition"></div></label>
							</td>
							<td data-label="Role"><label class="checkBox">
								<input id="ch1" name="D{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }} type="checkbox">
								<div class="transition"></div></label>
							</td>
							<td data-label="Role"><label class="checkBox">
								<input id="ch1" name="E{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }} type="checkbox">
								<div class="transition"></div></label>
							</td>
						  </tr>
						  @endif
						  @endfor
					</tbody>
				  </table>
				  <center>
				  <button style="margin-top: 5%"  type="submit">STORE</button>
				  <a href="{{ route('etudiant.show', $listeqcm->id) }}" style="border: solid 1px rgb(255, 255, 255) ; background-color :rgb(0, 0, 0); font-size:25px;color:white;margin-left:90%;border-radius: 0.3em;width:15%" class="button2"> Etudiant's</a>
				  <a href="{{ route('PDFetudiants',$listeqcm->id) }}" style="border: solid 1px rgb(255, 255, 255) ; background-color :rgb(0, 0, 0); font-size:25px;color:white;margin-left:90%;border-radius: 0.3em;width:15%" class="button2"> Etudiant's</a>
				</center>
			</div>
			<form>
		</article>
		<script src="/css/Qcmlistecss/suiver.js"></script>
	</div>
</section>
@endsection