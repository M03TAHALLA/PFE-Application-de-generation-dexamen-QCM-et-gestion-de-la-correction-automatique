@extends('layouts.app')

@section('title')
    <title>Examen</title>
@endsection
@section('home button')
<a   style="color: red; font-weight:bold" class="navbar-brand" href="{{ url('/') }}">
  Home
</a>
@endsection
@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Examen </title>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


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
	</style>
  </head>
  <body>
    <p style="font-size: 20px;text-align:center;font-weight:bold;border:4px solid black;background:rgb(255, 0, 0);color:rgb(0, 0, 0)"><img src="/images/timerExam.png" style="width: 50px;height:50px;margin-bottom:1%;background:red" alt=""> Temps : <span style="color: rgb(255, 255, 255);font-size:50px" id="timer"></span>.</p>
    <h1 style="text-align: center">Examen </h1>
  <div style="border: 2px solid black;width:20%;display:inline-block;margin-left:5%;padding:1%">
    <h5>Matiere :<span style="font-weight:bold;color:red;margin-left:5.5%">{{ $matiere }}</span> </h5>
    <h5>Enseignant : <span style="font-weight:bold;color:red;margin-left:5.5%">{{ $Name }}</span> </h5>
    <h5>Time : <span style="font-weight:bold;color:red;margin-left:5.5%">{{ $Heurs }}h</span></h5>
    <h5>Nombre Question : <span style="font-weight:bold;color:red;margin-left:5.5%">{{ $nombreQuestion }}</span></h5>
  </div>
    <div style="max-width: 45% ;margin-left:50%" class="container pt-4 pb-4">
      <form action="{{ route('Reponse.store') }}" method="POST">
        @csrf
        <input type="text" hidden name="Matricule" value="{{ $Matricule }}">
        <input type="text" hidden  name="nombreQuestion" value="{{ $nombreQuestion }}">
      <table class="table table-striped">
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
          @for($i=1;$i<=$nombreQuestion;$i++)
          <tr>
            <td style="font-weight:bold">N°{{ $i }}
            </td>
            <td>
              <label class="">
                <input class="RadioButton" type="checkbox" value="1" {{ old('is_active') ? 'checked' : '' }} name="A{{$i}}">
                <span><i class="fas fa-check"></i></span>
              </label>
            </td>
            <td>
              <label class="form-check-custom danger with-icon-side">
                <input class="RadioButton" type="checkbox" value="1" {{ old('is_active') ? 'checked' : '' }} name="B{{$i}}">
                <span><i class="fas fa-trash-alt"></i></span>
              </label>
            </td>
            <td>
              <label class="form-check-custom danger with-icon-side">
                <input class="RadioButton" type="checkbox" value="1" {{ old('is_active') ? 'checked' : '' }} name="C{{$i}}">
                <span><i class="fas fa-trash-alt"></i></span>
              </label>
            </td>
            <td>
              <label class="form-check-custom danger with-icon-side">
                <input class="RadioButton" type="checkbox" value="1" {{ old('is_active') ? 'checked' : '' }} name="D{{$i}}">
                <span><i class="fas fa-trash-alt"></i></span>
              </label>
            </td>
            <td>
              <label class="form-check-custom danger with-icon-side">
                <input class="RadioButton" type="checkbox" value="1" {{ old('is_active') ? 'checked' : '' }} name="E{{$i}}">
                <span><i class="fas fa-trash-alt"></i></span>
              </label>
            </td>
          </tr>
          @endfor
        </tbody>
      </table>
      <button type="submit" class="learn-more">
        <span class="circle" aria-hidden="true">
        <span class="icon arrow"></span>
        </span>
        <span class="button-text">Repondre</span>
      </button>
    </div>
    <form>
  </body>
</html>
    <script>
      // Définir la durée du compte à rebours en millisecondes (2 heures)
      var duration = {{ $Heurs }} *60*60 * 1000;

      // Vérifier si la date de fin est déjà stockée dans le stockage local
      var countDownDate = localStorage.getItem("countDownDate");

      // Si la date de fin n'est pas stockée, calculer la date de fin à partir de maintenant
      if (!countDownDate) {
        countDownDate = new Date().getTime() + duration;
        localStorage.setItem("countDownDate", countDownDate);
      }

      // Mettre à jour le compte à rebours toutes les secondes
      var countdown = setInterval(function() {

        // Obtenir la date et l'heure actuelles
        var now = new Date().getTime();

        // Calculer la distance entre la date de fin et la date actuelle
        var distance = countDownDate - now;

        // Calculer les heures, minutes et secondes restantes
        var hours = Math.floor(distance / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Afficher le temps restant sur la page
        var timerElement = document.getElementById("timer");
        timerElement.textContent = hours + "h " + minutes + "m " + seconds + "s ";

        // Arrêter le compte à rebours une fois qu'il est terminé
        if (distance < 0) {
          clearInterval(countdown);
          timerElement.textContent = "EXPIRÉ";

          // Supprimer la date de fin du stockage local
          localStorage.removeItem("countDownDate");
          var buttonElement = document.querySelector(".learn-more");
      buttonElement.disabled = true;
      buttonElement.style.display='none';
      window.scrollTo(0, 0);
        }
      }, 1000);

      // Réinitialiser le compte à rebours lorsqu'on actualise la page
      window.addEventListener("beforeunload", function(event) {
        localStorage.removeItem("countDownDate");
      });
    </script>
  </body>
</html>



@endsection