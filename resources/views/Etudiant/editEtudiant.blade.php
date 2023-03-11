<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Etudiant</title>

    <link rel="stylesheet" href="/css/Etudiants/editEtudiant.css">

</head>
<body>
  <video autoplay loop muted id="video-background"><source src="/videos/backgroundCreateEtudiant.mp4"></video>
    <form action="{{ route('etudiant.update',$etudiant->id)}}"   method="POST">
        @csrf
        @method('PUT')
    <div class="form">
        <div class="title">Etudiant <span>{{ $etudiant->Nom }}</span>_<span>{{ $etudiant->Prenom }}</span></div>
        <div class="subtitle">Modifier Votre Etudiant's</div>
        <div class="input-container ic1">
            <input id="firstname" class="input" name="Matricule" value="{{ $etudiant->Matricule }}" type="text" placeholder=" " />
            <div class="error">
              @error ('Matricule')
                  {{ $message }}
              @enderror
          </div>
            <div class="cut"></div>
            <label for="Matricule" class="placeholder">Matricule  </label>
          </div>
        <div class="input-container ic2">
          <input id="firstname" class="input" name="Nom" value="{{ $etudiant->Nom }}" type="text" placeholder=" " />
          <div class="error">
            @error ('Nom')
                {{ $message }}
            @enderror
        </div>
          <div class="cut"></div>
          <label for="Nom" class="placeholder">Nom </label>
        </div>
        <div class="input-container ic3">
          <input id="lastname" class="input" name="Prenom" value="{{ $etudiant->Prenom }}" type="text" placeholder=" " />
          <div class="error">
            @error ('Prenom')
                {{ $message }}
            @enderror
        </div>
          <div class="cut"></div>
          <label for="Prenom" class="placeholder">Prenom</label>
        </div>
        <div class="input-container ic3">
          <input id="lastname" class="input" name="Email" value="{{ $etudiant->Email }}" type="email" placeholder=" " />
          <div class="error">
            @error ('Email')
                {{ $message }}
            @enderror
        </div>
          <div class="cut"></div>
          <label for="Prenom" class="placeholder">Prenom</label>
        </div>
        <button type="text" class="submit">submit</button>
      </div>
      <input hidden id="firstname" class="input" name="idqcm" value="{{ $etudiant->idEtud }}" type="text" placeholder=" " />
    </form>
</body>
</html>