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
  background-color: #ffffff;
  display: flex;
  justify-content: center;
  height: 100vh;
}

.form {
  background-color: #15172b;
  border-radius: 20px;
  box-sizing: border-box;
  height: 500px;
  padding: 20px;
  width: 320px;
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
  background-color: #303245;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  font-size: 18px;
  height: 100%;
  outline: 0;
  padding: 4px 20px 0;
  width: 100%;
}

.cut {
  background-color: #15172b;
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
  top: 20px;
}

.input:focus ~ .placeholder,
.input:not(:placeholder-shown) ~ .placeholder {
  transform: translateY(-30px) translateX(10px) scale(0.75);
}

.input:not(:placeholder-shown) ~ .placeholder {
  color: #808097;
}

.input:focus ~ .placeholder {
  color: #dc2f55;
}

.submit {
  background-color: #08d;
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
  width: 100%;
}

.submit:active {
  background-color: #06b;
}
    </style>
</head>
<body>
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
        <button type="text" class="submit">submit</button>
      </div>
      <input hidden id="firstname" class="input" name="idqcm" value="{{ $id }}" type="text" placeholder=" " />
    </form>
</body>
</html>