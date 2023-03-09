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
    <title>Document</title>
    <link rel="stylesheet" href="/css/Qcmlistecss/edit.css">

</head>
<body>
<form action="{{ route('Qcmliste.update',['Qcmliste'=>$listeqcm->id]) }}" method="POST" class="requires-validation">
    @csrf
    @method('PUT')
    <div class="container">
        <div class="card">
            <div class="user signup_form">
                <div class="form">
                    <div class="text_signup">
                        <h4  style="font-weight:bold;"> Modifier QCM </h4>
                    </div>
                    <div class="input-text-signup"><input class="form-control" type="text"  style="font-weight:bold" value="{{ $listeqcm->idqcm }}" name="Idqcm"  required><i class="fa fa-user"></i><label>ID QCM</label></div>
                    <div class="input-text-signup"><input class="form-control" type="text"  style="font-weight:bold" name="Numquestion" value="{{ $listeqcm->NbrQuestion }}" required> <i class="fa fa-envelope-o"></i> <label>Nombre Question</label> </div>
                    <div class="input-text-signup">  <input class="form-control" type="text"  style="font-weight:bold" name="Matiere" value="{{ $listeqcm->matiere }}"   required><i class="fa fa-eye-slash"></i><label>Matiere</label></div>
                    <div class="input-text-signup"><input class="form-control" type="text"  style="font-weight:bold" name="libelle" value="{{ $listeqcm->libelle }}"  required><i class="fa fa-user"></i> <label>Ecole</label> </div>
                    <div class="input-text-signup"><input class="form-control"  style="font-weight:bold;cursor:not-allowed"  type="text" disabled name="CodeExam" value="{{ $listeqcm->CodeExam }}"  required><i class="fa fa-user"></i> <label>Code</label> </div>
                    <div class="input-text-signup"><input class="form-control w-100"  style="font-weight:bold;"  type="time" name="Heurs" value="{{ $listeqcm->Heurs }}"  required></div>
                    <br>
                    <br>
                    <h4>Notation</h4>
                    <input type="number"  name="Point" id="male"  style="font-weight:bold" autocomplete="off" value="{{$listeqcm->Point}}" required>
                    <label style="font-weight:bold;color:green"   class="mb-3 mr-1">Point Si Vrai: </label><br>
                    <input type="number"  name="PointF" id="male"  style="font-weight:bold" autocomplete="off" value="{{$listeqcm->PointF}}" required>
                    <label style="font-weight:bold;color:red" class="mb-3 mr-1">Point Si Faux: </label><br>
                    <input type="number"  name="PointN" id="male"  style="font-weight:bold" autocomplete="off" value="{{$listeqcm->PointN}}" required>
                    <label style="font-weight:bold" class="mb-3 mr-1">Point Si Pas Reponse: </label><br>
                    <br>
                    <br>
                    <div class="signup-button"> <button  style="font-weight:bold" type="submit" >Modifier</button></div>
                </div> 
           <div class="image-box"> <img style="width: 100%;height:70%" src="/images/Exam.jpg"></div>

            </div>

        </div>
</form>
</body>
</html>
@endsection