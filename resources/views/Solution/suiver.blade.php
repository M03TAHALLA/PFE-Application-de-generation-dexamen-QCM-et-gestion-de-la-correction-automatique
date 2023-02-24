
@extends('layouts.app')
@section('title')
    <title>QCM</title>
@endsection
@section('home button')
<a   style="color: red; font-weight:bold" class="navbar-brand" href="{{ route('Qcmliste.index') }}">
  Liste Qcm
</a>

<a   style="color: red; font-weight:bold; margin-left:100px" class="navbar-brand" href="{{ route('Scan.show',$listeqcm->id) }}">
	FastScan
  </a>
@endsection
@section('content')
<link rel="stylesheet" href="/css/Qcmlistecss/solution.css">
<link rel="stylesheet" href="/css/Qcmlistecss/suiver.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.2/xlsx.full.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script
			src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
			integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer">
</script>

<section class="dark">
	<div class="container py-4">
		<h1 class="h1 text-center" id="pageHeaderTitle">QCM :<span style="color: red"> {{ $listeqcm->libelle }}</span></h1>
	<center>
		<article class="postcard dark red">
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
				<div class="postcard__preview-txt">Créer Par 	 :<span style="color: red ; text-transform: capitalize;"> {{ auth()->user()->name	 }}</span></div>
				<ul class="postcard__tagbox">
					Les Notes
					<li class="tag__item">Vrai :  <span style="color:green">{{ $listeqcm->Point }}pts</span></li>
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>Faux : <span style="color: red">{{ $listeqcm->PointF }}pts</span></li>
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>Son Reponse : <span style="color: rgb(105, 94, 94)">{{ $listeqcm->PointN }}pts</span></li>
				</ul>
			</div>
		</center>
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
<button style="background: green ; border- " id="export_button"><i class="fa fa-file-excel-o" style="font-size:20px"></i> Solution Excel</button>
@endif
<?php

$connect = new PDO("mysql:host=localhost;dbname=qcmdb", "root", "");
$query = "SELECT * FROM solutions WHERE qcmliste_id=$listeqcm->id ORDER BY id  ASC";
$result = $connect->query($query);
?>
<table hidden   id="employee_data" class="table table-striped table-bordered">
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
			echo '<td>1 ';if($row['B']==1){echo ' , 2';}if($row['C']==1){echo ' , 3';};if($row['D']==1){echo ' , 4';};if($row['E']==1){echo ' , 5';}echo'</td>';
			$i =$i+1;
			continue;
		}
		if($row['B']==1){
			echo '<td>2 ';if($row['A']==1){echo ' , 1';}if($row['C']==1){echo ' , 3';};if($row['D']==1){echo ' , 4';};if($row['E']==1){echo ' , 5';}echo'</td>';
			$i =$i+1;
			continue;
		}
		if($row['C']==1){
			echo '<td>3';if($row['A']==1){echo ' , 1';}if($row['B']==1){echo ' , 2';};if($row['D']==1){echo ' , 4';};if($row['E']==1){echo ' , 5';}echo'</td>';
			$i =$i+1;
			continue;
		}
		if($row['D']==1){
			echo '<td>4';if($row['A']==1){echo ' , 1';}if($row['B']==1){echo ' , 2';};if($row['C']==1){echo ' , 3';};if($row['E']==1){echo ' , 5';}echo'</td>';
			$i =$i+1;
			continue;
		}
		if($row['E']==1){
			echo '<td>5';if($row['A']==1){echo ' , 1';}if($row['B']==1){echo ' , 2';};if($row['C']==1){echo ' , 3';};if($row['D']==1){echo ' , 4';}echo'</td>';
			$i =$i+1;
			continue;
		}
	   if($row['A']==0 || $row['B']==0 || $row['C']==0 || $row['D']==0 || $row['E']==0){
		$i =$i+1;
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
						<th scope="col">1</th>
						<th scope="col">2</th>
						<th scope="col">3</th>
						<th scope="col">4</th>
						<th scope="col">5</th>
					  </tr>
					</thead>
					<tbody>
						@for($i=1;$i <= $listeqcm->NbrQuestion ; $i++)
						<tr>
							<td data-label="Qustion"><div class="content">{{ $i }}</div></td>
							<td data-label="1"><div class="content">
								<label class="checkBox">
								  <input id="ch1" name="A{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }}  type="checkbox">
								  <div class="transition"></div></label>
							</td>
							<td data-label="2"><label class="checkBox">
								<input id="ch1" name="B{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }} type="checkbox">
								<div class="transition"></div></label>
							</td>
							<td data-label="3"><label class="checkBox">
								<input id="ch1" name="C{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }} type="checkbox">
								<div class="transition"></div></label>
							</td>
							<td data-label="4"><label class="checkBox">
								<input id="ch1" name="D{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }} type="checkbox">
								<div class="transition"></div></label>
							</td>
							<td data-label="5"><label class="checkBox">
								<input id="ch1" name="E{{$i}}" value="1" {{ old('is_active') ? 'checked' : '' }} type="checkbox">
								<div class="transition"></div></label>
							</td>
						  </tr>
						  @endfor
					</tbody>
				  </table>
				  <center>
				  <button style="margin-top: 5%"  type="submit">STORE</button>
				  @if (session()->has('success'))
				  <a href="{{ route('etudiant.show', $listeqcm->id) }}" style="color: rgb(255, 255, 255);font-weight:bold"  class="cssbuttons-io-button"> Etudiant's
					
					<div class="icon">
					  <svg height="24" width="24"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path></svg>
					</div>
				  </a>
				  @endif
				</center>
			</div>
			<form>
				
		</article>
		<script src="/css/Qcmlistecss/suiver.js"></script>
	</div>
</section>
@endsection