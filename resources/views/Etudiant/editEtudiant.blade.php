<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Etudiant</title>

    <style>
body {
  align-items: center;
  background-color: #e49710;
  display: flex;
  justify-content: center;
  height: 100vh;
}

.form {
  background-color: #000000;
  border-radius: 20px;
  box-sizing: border-box;
  height: 500px;
  padding: 20px;
  width: 800px;
  background-color: transparent;
  opacity: 80%;
}

.title {
  color: #eee;
  font-family: sans-serif;
  font-size: 36px;
  font-weight: 600;
  margin-top: 30px;
}

.subtitle {
  color: #eee;
  font-family: sans-serif;
  font-size: 16px;
  font-weight: 600;
  margin-top: 10px;
}

.input-container {
  height: 50px;
  position: relative;
  width: 100%;
}

.ic1 {
  margin-top: 40px;
}

.ic2 {
  margin-top: 30px;
}
.ic3 {
  margin-top: 20px;
}

.input {
  background-color: #bfc0c8;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #000000;
  font-size: 18px;
  height: 100%;
  outline: 0;
  padding: 4px 20px 0;
  width: 100%;
  font-weight: bold;

}

.cut {
  background-color:transparent;
  border-radius: 10px;
  height: 20px;
  left: 20px;
  position: absolute;
  top: -20px;
  transform: translateY(0);
  transition: transform 200ms;
  width: 76px;
}

.cut-short {
  width: 50px;
}

.input:focus ~ .cut,
.input:not(:placeholder-shown) ~ .cut {
  transform: translateY(8px);
}

.placeholder {
  color: #65657b;
  font-family: sans-serif;
  left: 20px;
  line-height: 14px;
  pointer-events: none;
  position: absolute;
  transform-origin: 0 50%;
  transition: transform 200ms, color 200ms;
  top: 15px;

}

.input:focus ~ .placeholder,
.input:not(:placeholder-shown) ~ .placeholder {
  transform: translateY(-30px) translateX(10px) scale(0.75);
}

.input:not(:placeholder-shown) ~ .placeholder {
  color: #ffffff;
  font-weight: bold;
  margin-bottom: 20px;
  font-size: 20px
}

.input:focus ~ .placeholder {
  color: #ffffff;
  font-weight: bold;
  margin-bottom: 20px;
  font-size: 20px;
}

.submit {
  background-color: rgb(148, 45, 1);
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  cursor: pointer;
  font-size: 18px;
  height: 50px;
  margin-top: 38px;
  // outline: 0;
  text-align: center;
  transition:0.5s;
  width: 100%;
}

.submit:active {
  background-color: #06b;
}

.submit:hover {
  background-color: rgb(232, 112, 32);
}
span{
  color: red
}
.error{
    margin-left: 20%;
    font-size: .8rem;
    color: red;
  }
  #video-background {
  display: flex;
  position:absolute;
    right: 0;
    bottom: 20;
    z-index: -1;
    width:100%;
  object-position: center center;
}
    </style>
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
        <button type="text" class="submit">submit</button>
      </div>
      <input hidden id="firstname" class="input" name="idqcm" value="{{ $etudiant->idEtud }}" type="text" placeholder=" " />
    </form>
</body>
</html>