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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');





.card {
    margin-left: 0%;
    height: 600px;
    width: 1180px;
    background-color: #fff;
    border-radius: 5px;
    overflow: hidden;
    position: relative;
    font-family: 'Poppins', sans-serif;
    border: 2px solid black;
}

.card .user {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex
}

.image-box {
    width: 50%;
    height: 100%;
    overflow: hidden
}

.image-box img {
    box-sizing: border-box;
    object-fit: cover;
    width: 100%;
    height: 100%
}

.user .form {
    width: 50%
}

.signup_form .image-box {
    position: absolute;
    right: 0;
    transition: all 1s;
    z-index: 1
}

.card.active .signup_form .image-box {
    right: 100%
}

.card.active .signup_form .form {
    left: 100%
}

.card .signup_form .form {
    position: absolute;
    background-color: #fff;
    padding: 20px 30px;
    left: 0;
    box-sizing: border-box;
    transition: all 1s;
    z-index: 1;
    height: 100%
}

.flag-text {
    position: relative
}

.flag-text select {
    height: 30px;
    width: 100px;
    background-color: #eff5fe;
    outline: 0;
    border: none;
    font-size: 12px;
    cursor: pointer
}

.text_signup {
    margin-top: 20px
}

.text_signup h4 {
    color: #7870a3
}

.text_signup h2 {
    color: #201665
}

.text_signup p {
    font-size: 12px;
    font-weight: 700
}

.text_signup p a {
    color: blue;
    text-decoration: none;
    cursor: pointer
}

.input-text-signup {
    position: relative;
    margin-top: 30px
}

input[type="text"] {
    width: 100%;
    height: 40px;
    border: none;
    outline: 0;
    border: 1px solid #cccadc;
    border-radius: 5px;
    padding-left: 5px;
    padding-right: 20px;
    box-sizing: border-box
}

input[type="password"] {
    width: 100%;
    height: 40px;
    border: none;
    outline: 0;
    border: 1px solid #cccadc;
    border-radius: 5px;
    padding-left: 5px;
    padding-right: 24px;
    box-sizing: border-box
}

.input-text-signup i {
    position: absolute;
    top: 15px;
    right: 8px;
    color: #6b6589;
    cursor: pointer;
    font-size: 13px
}

.fa-eye {
    position: absolute;
    top: 12px;
    right: 8px
}

.input-text-signup label {
    position: absolute;
    left: 5px;
    top: 12px;
    font-size: 12px;
    transition: all 0.5s;
    pointer-events: none
}

.input-text-signup input:focus~label,
.input-text-signup input:valid~label {
    top: -16px;
    font-weight: 700;
    color: #7187d2
}

.signup-button {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px
}

.signup-button button {
    width: 100%;
    height: 40px;
    border: none;
    outline: 0;
    border-radius: 5px;
    font-size: 12px;
    color: #fff;
    background-color: #3e66f7;
    cursor: pointer;
    transition: all 0.5s
}

.signup-button button:hover {
    background-color: blue
}

.policy {
    margin-top: 20px
}

.policy p {
    font-size: 12px;
    font-weight: 700
}

.policy p a {
    color: blue;
    text-decoration: none;
    cursor: pointer
}

.warning {
    border: 1px solid red !important
}

.signin_form .form {
    background-color: #fff;
    padding: 20px 30px;
    left: 0;
    box-sizing: border-box;
    transition: all 1s
}


@media(max-width:690px){
    .container{
        height:scroll;
    }
    .card{
        max-width:350px;
    }
    .image-box{
        display:none;
    }
    .user .form {
        width:100%;
         height:scroll;
    }        
        
    
}
.cbx {
 position: relative;
 top: 10px;
 width: 27px;
 height: 27px;
 border: 1px solid #c8ccd4;
 border-radius: 3px;
 vertical-align: middle;
 transition: background 0.1s ease;
 cursor: pointer;
 display: block;
 border:1px solid black;
}

.cbx:after {
 content: '';
 position: absolute;
 top: 2px;
 left: 8px;
 width: 8px;
 height: 12px;
 opacity: 0;
 transform: rotate(45deg) scale(0);
 border-right: 2px solid #fff;
 border-bottom: 2px solid #fff;
 transition: all 0.3s ease;
 transition-delay: 0.15s;
}

.lbl {
 margin-left: 5px;
 vertical-align: middle;
 cursor: pointer;
}

#cbx:checked ~ .cbx {
 border-color: transparent;
 background: #6871f1;
 animation: jelly 0.6s ease;
}

#cbx:checked ~ .cbx:after {
 opacity: 1;
 transform: rotate(45deg) scale(1);
}

.cntr {
 position: relative;
}

@keyframes jelly {
 from {
  transform: scale(1, 1);
 }

 30% {
  transform: scale(1.25, 0.75);
 }

 40% {
  transform: scale(0.75, 1.25);
 }

 50% {
  transform: scale(1.15, 0.85);
 }

 65% {
  transform: scale(0.95, 1.05);
 }

 75% {
  transform: scale(1.05, 0.95);
 }

 to {
  transform: scale(1, 1);
 }
}

.hidden-xs-up {
 display: none!important;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="user signup_form">
                <div class="form">
                    <div class="text_signup">
                        <h4>Create QCM</h4>
                    </div>
                    <div class="input-text-signup"><input class="form-control" type="text" name="Idqcm"  required><i class="fa fa-user"></i><label>ID QCM</label></div>
                    <div class="input-text-signup"><input class="form-control" type="text" name="Numquestion" required> <i class="fa fa-envelope-o"></i> <label>Nombre Question</label> </div>
                    <div class="input-text-signup">  <input class="form-control" type="text" name="Matiere"   required><i class="fa fa-eye-slash"></i><label>Matiere</label></div>
                    <div class="input-text-signup"><input class="form-control" type="text" name="libelle"  required><i class="fa fa-user"></i> <label>Ecole</label> </div>
                    <h1>Notation</h1>
                    <div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Exactement une seule réponse par question
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Plusieurs réponses possibles par question
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Default radio
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                          Default checked radio
                        </label>
                      </div>
                    </div>
                    <div class="signup-button"> <button>Create</button> </div>
                </div>
                <div class="image-box"> <img style="width: 100%;height:102%" src="/images/Exam.jpg"></div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection