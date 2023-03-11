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
    <link rel="stylesheet" href="/css/Qcmlistecss/create.css">

</head>
<body>
 <form action="{{ route('Qcmliste.store') }}" method="POST" class="requires-validation">
    @csrf
    <div class="container">
        <div class="card">
            <div class="user signup_form">
                <div class="form">
                    <div class="text_signup">
                        <h4 style="font-weight:bold"><u>Create QCM</u></h4>
                    </div>
                    <div class="input-text-signup"><input class="form-control"  style="font-weight:bold"  type="text" name="Idqcm"  required><i class="fa fa-user"></i><label>ID QCM</label></div>
                    <div class="input-text-signup"><input class="form-control"  style="font-weight:bold" type="text" name="Numquestion" required> <i class="fa fa-envelope-o"></i> <label>Nombre Question</label> </div>
                    <div class="input-text-signup">  <input class="form-control"  style="font-weight:bold" type="text" name="Matiere"   required><i class="fa fa-eye-slash"></i><label>Matiere</label></div>
                    <div class="input-text-signup"><input class="form-control"  style="font-weight:bold" type="text" name="libelle"  required><i class="fa fa-user"></i> <label>Ecole</label> </div>
                    <div class="input-text-signup"><input class="form-control"  style="font-weight:bold;cursor:not-allowed"  type="text" name="CodeExam"  value="<?php echo rand(0, 15545223265474884); ?>" required><i class="fa fa-user"></i> <label>Code</label> </div>
                    <div class="input-text-signup"><input class="form-control"  style="font-weight:bold;width:30%;display: inline;" type="number" name="Heurs"  required><i class="fa fa-user"></i><label>Heurs Exam</label> heurs</div>

                    <br>
                    <br>
                    <h4>Notation</h4>
                    <input type="number" style="font-weight:bold"   name="Point" id="male" autocomplete="off" value="1" required>
                    <label style="font-weight:bold;color:green" class="mb-3 mr-1">Point Si Vrai: </label><br>
                    <input type="number" style="font-weight:bold"  name="PointF" id="male" autocomplete="off" value="0" required>
                    <label style="font-weight:bold;color:red" class="mb-3 mr-1">Point Si Faux: </label><br>
                    <input type="number" style="font-weight:bold"  name="PointN" id="male" autocomplete="off" value="0" required>
                    <label style="font-weight:bold" class="mb-3 mr-1">Point Si Pas Reponse: </label><br>
                    <br>
                    <br>
                    <div class="signup-button"> <button type="submit"  style="font-weight:bold;font-size:20px" >Create</button></div>
                </div> 
           <div class="image-box"> <img style="width: 100%;height:70%" src="/images/Exam.jpg"></div>

            </div>

        </div>
</form>
</body>
</html>
@endsection