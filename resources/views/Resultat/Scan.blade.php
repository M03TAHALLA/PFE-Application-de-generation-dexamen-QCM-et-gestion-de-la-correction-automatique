@extends('layouts.app')
@section('title')
    <title>SCAN FAST</title>
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
    .drop-container {
  position: relative;
  display: flex;
  gap: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 200px;
  padding: 20px;
  border-radius: 10px;
  border: 5px dashed #000000;
  color: #ff0000;
  cursor: pointer;
  transition: background .2s ease-in-out, border .2s ease-in-out;
  margin-top: 10%;
  width: 50%;
  margin-left: 25%;
  opacity: 100%;
  font-weight: bold;
  background: #ffffff;
  opacity: 60%;
  transition: 1s;

}

.drop-container:hover {
  background: #fdfdfd;
  opacity: 80%;
  border-color: #111;
}

.drop-container:hover .drop-title {
  color: #ff0000;
}

.drop-title {
  color: #ff0000;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  transition: color .2s ease-in-out;
}
#video-background {
    display: flex;
    position:absolute;
      right: 0;
      bottom: 0;
      z-index: -1;
      width:100%;
    object-position: center center;
  }
  button {
  position: relative;
  font-size: 1.2em;
  padding: 0.7em 1.4em;
  background-color: #BF0426;
  text-decoration: none;
  border: none;
  border-radius: 0.5em;
  color: #DEDEDE;
  box-shadow: 0.5em 0.5em 0.5em rgba(0, 0, 0, 0.3);
  margin-left: 35%;
  margin-top: 2%;
  width: 30%;
}

button::before {
  position: absolute;
  content: '';
  height: 0;
  width: 0;
  top: 0;
  left: 0;
  background: linear-gradient(135deg, rgba(33,33,33,1) 0%, rgba(33,33,33,1) 50%, rgba(150,4,31,1) 50%, rgba(191,4,38,1) 60%);
  border-radius: 0 0 0.5em 0;
  box-shadow: 0.2em 0.2em 0.2em rgba(0, 0, 0, 0.3);
  transition: 0.3s;
}

button:hover::before {
  width: 1.6em;
  height: 1.6em;
}

button:active {
  box-shadow: 0.2em 0.2em 0.3em rgba(0, 0, 0, 0.3);
  transform: translate(0.1em, 0.1em);
}
    </style>
  </head>
  <body>
    <video autoplay loop muted id="video-background"><source src="/videos/ResulBack.mp4"></video>
      <form action="{{ route('Resultat.PDF') }}" method="GET">
   <label for="images" class="drop-container">
  <span class="drop-title">Drop files here</span>
  or
  <input type="file" name="upload" accept="application/pdf,application/vnd.ms-excel" />
  <input hidden type="number" name="id" value="{{ $id }}">
 
</label>
<button type="submit">
  <b>Scan Your QCM</b>
</button>
</form>
  </body>
  </html>
@endsection