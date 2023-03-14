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
  <script type="text/javascript">
    window.addEventListener('beforeunload',()=>{
        event.preventDefault();
        event.returnValue = "";
    })
    </script>

<link rel="stylesheet" href="/css/Exams/DemarerExam.css">
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
var duration = {{ $Heurs }} * 60 * 60 * 1000;

// Initialize the remaining time to the duration
var remainingTime = duration;

// Update the countdown every second
var countdown = setInterval(function() {
  // Decrement the remaining time by 1 second
  remainingTime -= 1000;

  // Calculate the hours, minutes and seconds remaining
  var hours = Math.floor(remainingTime / (1000 * 60 * 60));
  var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

  // Display the remaining time on the page
  var timerElement = document.getElementById("timer");
  timerElement.textContent = hours + "h " + minutes + "m " + seconds + "s ";

  // Stop the countdown when it is finished
  if (remainingTime <= 0) {
    clearInterval(countdown);
    timerElement.textContent = "EXPIRED";

    // Remove the remaining time from local storage
    localStorage.removeItem("remainingTime");

    // Disable and hide the button
    var buttonElement = document.querySelector(".learn-more");
    buttonElement.disabled = true;
    buttonElement.style.display = 'none';
    window.scrollTo(0, 0);
  }
}, 1000);
</script>


  </body>
</html>



@endsection