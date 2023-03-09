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
	<style>

	</style>
  </head>
  <body>
    <p style="font-size: 20px;text-align:center;font-weight:bold;border:4px solid black;background:rgb(255, 0, 0);color:rgb(0, 0, 0)"><img src="/images/timerExam.png" style="width: 50px;height:50px;margin-bottom:1%;background:red" alt=""> Temps : <span style="color: rgb(255, 255, 255);font-size:50px" id="timer"></span>.</p>
    <h1 style="text-align: center">Examen </h1>
	<table>
		<tr>
		  <td>Colonne 1</td>
		  <td>Colonne 2</td>
		  <td>Colonne 3</td>
		  <td>Colonne 4</td>
		</tr>
		<tr>
		  <td><input type="radio" name="option1" value="1"> Option 1</td>
		  <td><input type="radio" name="option2" value="1"> Option 2</td>
		  <td><input type="radio" name="option3" value="1"> Option 3</td>
		  <td><input type="radio" name="option4" value="1"> Option 4</td>
		</tr>
		<tr>
		  <td><input type="radio" name="option1" value="2"> Option 1</td>
		  <td><input type="radio" name="option2" value="2"> Option 2</td>
		  <td><input type="radio" name="option3" value="2"> Option 3</td>
		  <td><input type="radio" name="option4" value="2"> Option 4</td>
		</tr>
	  </table>
	  
    <script>
      // Définir la durée du compte à rebours en millisecondes (2 heures)
      var duration =  60 * 1000;

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