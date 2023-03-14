<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/Etudiants/create.css">

    <title>Create Etudiant</title>
</head>
<body>
  <video autoplay loop muted id="video-background"><source src="/videos/backgroundCreateEtudiant.mp4"></video>
    <form action="{{ route('etudiant.store') }}" method="POST">
        @csrf
    <div class="form">
        <div class="title">Etudiant's infos</div>
        <div class="subtitle">Create Votre Etudiant's</div>
        <div class="input-container ic1">
            <input id="firstname" class="input" name="Matricule" type="text" placeholder=" " />
            <div class="cut"></div>
            <label for="Matricule" class="placeholder">Matricule  </label>
          </div>
          @if (session('message'))
				<p  style="color:rgb(89, 255, 0);font-size:14px;margin: 0px;margin-right: 60px;font-weight:bold">{{ session('message') }}</p>
			@endif
        <div class="input-container ic2">
          <input id="firstname" class="input" name="Nom" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="Nom" class="placeholder">Nom </label>
        </div>
        <div class="input-container ic3">
          <input id="lastname" class="input" name="Prenom" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="Prenom" class="placeholder">Prenom</label>
        </div>
        <div class="input-container ic3">
          <input id="lastname" class="input" name="Email" type="email" placeholder=" " />
          <div class="cut"></div>
          <label for="Email" class="placeholder">Email</label>
        </div>
        <button type="text" class="submit">submit</button>
      </div>
      <input hidden id="firstname" class="input" name="idqcm" value="{{ $id }}" type="text" placeholder=" " />
    </form>
</body>
</html>