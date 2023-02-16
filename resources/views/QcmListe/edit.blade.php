@extends('layouts.app')
@section('title')
    <title>Create Qcm</title>
@endsection
@section('home button')
<a   style="color: red; font-weight:bold" class="navbar-brand" href="{{ route('Qcmliste.index') }}">
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
    <link rel="stylesheet" href="/css/Qcmlistecss/create.css">
</head>
<div class="form-body">
  <div class="row">
      <div class="form-holder">
          <div class="form-content">
              <div class="form-items">
                  <h3>Register Today</h3>
                  <p>Fill in the data below.</p>
                  <form action="{{ route('Qcmliste.update',['Qcmliste'=>$listeqcm->id]) }}" method="POST" class="requires-validation">
                  @csrf
                    @method('PUT')
                      <div class="col-md-12">
                         <input class="form-control" type="number" value="{{ $listeqcm->idqcm }}" name="Idqcm" placeholder="Id Qcm" required>
                         <div class="valid-feedback">Id Qcm field is valid!</div>
                         <div class="invalid-feedback">Id Qcm field cannot be Empty!</div>
                      </div>
                      <div class="col-md-12">
                        <input class="form-control" type="number" name="Numquestion" value="{{ $listeqcm->NbrQuestion }}" placeholder="Nombre Question" required>
                        <div class="valid-feedback">Nombre Question field is valid!</div>
                        <div class="invalid-feedback">Nombre Question field cannot be Empty!</div>
                     </div>
                     <div class="col-md-12">
                      <input class="form-control" type="text" name="Matiere" value="{{ $listeqcm->matiere }}" id="Matiere" placeholder="Matiere" required>
                       <div class="valid-feedback">Matiere field is valid!</div>
                       <div class="invalid-feedback">Matiere field cannot be Empty!</div>
                   </div>
                    <div class="col-md-12">
                      <input class="form-control" type="text" name="libelle" value="{{ $listeqcm->libelle }}" id="libelle" placeholder="Libelle" required>
                       <div class="valid-feedback">Libelle field is valid!</div>
                       <div class="invalid-feedback">Libelle field cannot be Empty!</div>
                   </div>
                   
                     <div class="col-md-12">
                          <select id="image-select" class="form-select mt-3"  onchange="updateSelectedImage()" name="nbrReponse" required>
                                <option selected disabled value=""></option>
                                <option data-image="/images/S2.jpg" value="2" {{ $listeqcm->NbrReponse == '2' ? 'selected' : ''}}>2</option>
                                <option data-image="/images/S3.jpg" value="3"  {{ $listeqcm->NbrReponse == '3' ? 'selected' : ''}}>3</option>
                                <option data-image="/images/S4.jpg" value="4"  {{ $listeqcm->NbrReponse == '4' ? 'selected' : ''}}>4</option>
                                <option data-image="/images/S5.jpg" value="5"  {{ $listeqcm->NbrReponse == '5' ? 'selected' : ''}}>5</option>
                         </select>
                          <div class="valid-feedback">You selected a Nombre Reponse!</div>
                          <div class="invalid-feedback">Please select a Nombre Reponse!</div>
                     </div>
                   <div class="col-md-12">
                    <h3>Nombre des Case Matricule De Etudiant</h3>
                   <div id="radio" class="col-md-12">
                    <label for="image1">N°1</label>
                    <input id="kk" type="radio" name="NumEtud" value="1" id="image1" onchange="changeImage()"
                    {{ $listeqcm->NbrChiffreEtudiant == '1' ? 'checked' : ''}}>
                    <label for="image2">N°2</label>
                    <input type="radio" name="NumEtud" value="2" id="image2" onchange="changeImage()"
                    {{ $listeqcm->NbrChiffreEtudiant == '2' ? 'checked' : ''}}>
                    <label for="image3">N°3</label>
                    <input type="radio" name="NumEtud" value="3" id="image3" onchange="changeImage()"
                    {{ $listeqcm->NbrChiffreEtudiant == '3' ? 'checked' : ''}}>
                    <label for="image4">N°4</label>
                    <input type="radio" name="NumEtud" value="4" id="image4" onchange="changeImage()"
                    {{ $listeqcm->NbrChiffreEtudiant == '4' ? 'checked' : ''}}>
                    <label for="image5">N°5</label>
                    <input type="radio" name="NumEtud" value="5" id="image5" onchange="changeImage()"
                    {{ $listeqcm->NbrChiffreEtudiant == '5' ? 'checked' : ''}}>
                    <label for="image6">N°6</label>
                    <input type="radio" name="NumEtud" value="6" id="image6" onchange="changeImage()"
                    {{ $listeqcm->NbrChiffreEtudiant == '6' ? 'checked' : ''}}>
                    <label for="image7">N°7</label>
                    <input type="radio" name="NumEtud" value="7" id="image7" onchange="changeImage()"
                    {{ $listeqcm->NbrChiffreEtudiant == '7' ? 'checked' : ''}}>
                    <label for="image8">N°8</label>
                    <input type="radio" name="NumEtud" value="8" id="image8" onchange="changeImage()"
                    {{ $listeqcm->NbrChiffreEtudiant == '8' ? 'checked' : ''}}>
                    <label for="image9">N°9</label>
                    <input type="radio" name="NumEtud" value="9" id="image9" onchange="changeImage()"
                    {{ $listeqcm->NbrChiffreEtudiant == '9' ? 'checked' : ''}}>
                    <label for="image10">N°10</label>
                    <input type="radio" name="NumEtud" value="10" id="image10" onchange="changeImage()"
                    {{ $listeqcm->NbrChiffreEtudiant == '10' ? 'checked' : ''}}>
                    <div class="valid-feedback">You selected a Nombre des Case Matricule De Etudiant!</div>
                    <div class="invalid-feedback">Please select a Nombre des Case Matricule De Etudiant!</div>
               </div>
                    <div class="valid-feedback">You selected a Nombre des Case Matricule De Etudiant!</div>
                    <div class="invalid-feedback">Please select a Nombre des Case Matricule De Etudiant!</div>
               </div>
               <h3>Ligne Remonde : </h3>
               <div id="remonde" class="col-md-12">
                <label for="image1">Pas de ligne de remord</label>
                <input  type="radio" name="ligneRemonde" value="1" id="image11" onchange="changeImage2()"  {{ $listeqcm->ligneRemonde == '1' ? 'checked' : ''}}><br>
                <label for="image2">Avec une ligne de remord</label>
                <input type="radio" name="ligneRemonde" value="0" id="image12" onchange="changeImage2()"  {{ $listeqcm->ligneRemonde == '0' ? 'checked' : ''}}>
               </div>
               <h3>Notation : </h3>
               <div id="remonde" class="col-md-12">
                <label for="image1">Exactement une seule réponse par question</label>
                <input id="hideListButton"  type="radio" name="Notation" value="1" id="image11"  onchange="changeImage2()"  {{ $listeqcm->Notation == '1' ? 'checked' : ''}} >
                <label for="image2">Plusieurs réponses possibles par question</label>
                <input id="showListButton" type="radio" name="Notation" value="0" id="image12" onchange="changeImage2()" {{ $listeqcm->Notation == '0' ? 'checked' : ''}}>
               </div>
               <div id="listContainer" style="display: none;">
                <h3>Plus Notation : </h3>
                <label   for="image2">Réponse partiellement juste acceptée</label>
                <input id="showListButton2" type="radio" name="PlusNotation" value="1" {{ $listeqcm->PlusNotation == '1' ? 'checked' : ''}}>
                <label  for="image2">Chaque case a le même poids</label>
                <input id="hideListButton2" type="radio" name="PlusNotation" value="2" {{ $listeqcm->PlusNotation == '2' ? 'checked' : ''}}><br>
                <label   for="image2">Autre barême (diploma) :  </label>
                <input  id="showListButton3" type="radio" name="PlusNotation" value="3" {{ $listeqcm->PlusNotation == '3' ? 'checked' : ''}}>
            </div>
                 <div class="col-md-12 mt-3">
                  <label class="mb-3 mr-1">Point Si Vrai: </label>
                  <input type="number"  name="Point" id="male" autocomplete="off" value="{{$listeqcm->Point}}" required>
                  <div id="listContainer2" style="display: none;">
                    <label class="mb-3 mr-1">Point Si Faux: </label>
                  <input type="number"  name="PointF" id="male" autocomplete="off" value="{{$listeqcm->PointF}}" required><br>
                  <label class="mb-3 mr-1">Point Si Pas Reponse: </label>
                  <input type="number"  name="PointN" id="male" autocomplete="off" value="{{$listeqcm->PointN}}" required>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label">I confirm that all data are correct</label>
                   <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                  </div>
                      <div class="form-button mt-3">
                          <button id="submit" type="submit" class="btn btn-primary">Modifier</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="image-container">
  <h2 style="color: white">Head Grille : </h2>
  <img src="/images/headGrille.jpg">
  <textarea  id="text" type="text" class="image-text">{{ $listeqcm->libelle }}</textarea>
  <input value="{{ $listeqcm->matiere }}" id="text2" type="text" class="image-text">
  <h2 style="color: white">Nombre Reponse : </h2>
  <img id="selected-image" src="/images/S{{ $listeqcm->NbrReponse }}.jpg">
  <img id="selected-image3" src="/images/ligneRemonde/{{ $listeqcm->ligneRemonde }}.jpg">

  <h2 style="color: white">Nombre Matricule :</h2>
  <img id="selected-image2" src="/images/{{ $listeqcm->NbrChiffreEtudiant }}.jpg">
</div>
<script src="/css/Qcmlistecss/create.js">
</script>
@endsection
