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
	</style>
  </head>
  <body>
    <p style="font-size: 20px;text-align:center;font-weight:bold;border:4px solid black;background:rgb(255, 0, 0);color:rgb(0, 0, 0)"><img src="/images/timerExam.png" style="width: 50px;height:50px;margin-bottom:1%;background:red" alt=""> Temps : <span style="color: rgb(255, 255, 255);font-size:50px" id="timer"></span>.</p>
    <h1 style="text-align: center">Examen </h1>
    <div style="max-width: 45% ;margin-left:50%" class="container pt-4 pb-4">
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
          @for($i=1;$i<10;$i++)
          <tr>
            <td style="font-weight:bold">N°{{ $i }}
            </td>
            <td>
              <label class="">
                <input class="RadioButton" type="radio" name="Reponse{{$i}}" >
                <span><i class="fas fa-check"></i></span>
              </label>
            </td>
            <td>
              <label class="form-check-custom danger with-icon-side">
                <input class="RadioButton" type="radio" name="Reponse{{$i}}"  >
                <span><i class="fas fa-trash-alt"></i></span>
              </label>
            </td>
            <td>
              <label class="form-check-custom danger with-icon-side">
                <input class="RadioButton" type="radio" name="Reponse{{$i}}"  >
                <span><i class="fas fa-trash-alt"></i></span>
              </label>
            </td>
            <td>
              <label class="form-check-custom danger with-icon-side">
                <input class="RadioButton" type="radio" name="Reponse{{$i}}"  >
                <span><i class="fas fa-trash-alt"></i></span>
              </label>
            </td>
            <td>
              <label class="form-check-custom danger with-icon-side">
                <input class="RadioButton" type="radio" name="Reponse{{$i}}"  >
                <span><i class="fas fa-trash-alt"></i></span>
              </label>
            </td>
          </tr>
          @endfor
        </tbody>
      </table>
    </div>
  </body>
</html>
    <script>
      // Définir la durée du compte à rebours en millisecondes (2 heures)
      var duration = 2 * 60 * 60 * 1000;

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