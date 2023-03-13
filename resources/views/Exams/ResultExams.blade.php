@extends('layouts.app')
@section('title')
    <title>Etudiant</title>
@endsection
@section('home button')
<a   style="color: red; font-weight:bold; margin-left:100px" class="navbar-brand" href="{{ route('Qcmliste.index') }}">
  Liste Qcm
</a>
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css"> 
    
<style>
     .button3{
border: 2px solid black ;
height: 10px;
text-decoration: none;
background-color: green;
color: white;
transition: 0.5s;
border-radius: 3px;
padding: 3px;
cursor: pointer;
}
.button3:hover{
background-color: rgb(255, 255, 255);
color: green;
cursor: pointer;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h1 style="margin-bottom: 3%"> Resultat Etudiant </h1>
    <a href="{{ route('sendNotes',$CodeExam) }}" style="color:white;background-color:rgb(255, 175, 36);margin-left:35%;margin-bottom:10%;padding:10px;transition: background-color 1s ease, color 0.3s ease;"  onmouseover="this.style.backgroundColor='rgb(255, 255, 255)'; this.style.color='rgb(255, 175, 36)';"onmouseout="this.style.backgroundColor='rgb(255, 175, 36)'; this.style.color='white';" class="button3"><i class="fa fa-envelope" style="font-size:20px"></i> Envoyer Les Notes Finale a Votre Etudiants (<span style="color: red;font-weight:bold">{{ count($Etudiants) }}</span>)</a>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Code Exam</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date Debut Exam</th>
                <th>Note Final</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0 ?>
            @foreach($Etudiants as $Etudiants)
            <tr>
                <td>{{ $Etudiants->Matricule }}</td>
                <td>{{ $Etudiants->Code_Exam }}</td>
                <td>{{ $Etudiants->Nom }}</td>
                <td>{{ $Etudiants->Prenom }}</td>
                <td>{{ $Etudiants->created_at }}</td>
                <td>{{ $notesFinale[$i] }}/{{ $NombreQuestion }}</td>
                <td> <a href="{{route('ResultatEtudiant',$Etudiants->Matricule) }}" class="button3">Suiver </a></td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>    
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>

   <script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
   </script>

</body>
</html>

@endsection