<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	<link rel="stylesheet" href="/css/Exams/LoginEtud.css">
</head>
<body>
    <h2>Espace Etudiants</h2>
    <img style="width: 6%;height:11%;color:white" src="/images/Etudiant.png">
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="{{ route('Exam.store') }}" method="POST" >
                @csrf
                <h1>Start Exam</h1>
                <input type="text" placeholder="Matricule" name="Matricule" required/>
			@if (session('message'))
				<p  style="color:red;font-size:10px;margin: 0px;margin-right: 60px;">{{ session('message') }}</p>
			@endif
                <input type="text" placeholder="Nom" value="{{ old('Nom') }}" name="Nom" required/>
                <input type="text" placeholder="Prenom" value="{{ old('Prenom') }}" name="Prenom" required/>
                <input type="text" placeholder="Code_Exam" value="{{ old('Code_Exam') }}" name="Code_Exam" required/>
		@if (session('message2'))
			<p style="color:red;font-size:10px;margin: 0px;margin-right: 60px;">{{ session('message2') }}</p>
		@endif
                <button style="cursor: pointer;" type="submit">DEMARER</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Bonjour! Etudiant</h1>
                    <p>Entrer Votre Details Personnelle Avec Code Examen's Donner Par Votre Enseignant </p>
                </div>
            </div>
        </div>
    </div>
	
</body>
</html>