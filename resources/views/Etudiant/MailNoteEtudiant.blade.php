@component('mail::message')

<span style="color: black">Cher</span> <span style="color: red;font-weight:bold">{{ $Nom }} {{ $Prenom }}</span>,

<span style="color: black">Matricule :</span> <span style="color: red;font-weight:bold">{{ $Matricules }}</span>

<span style="color: black">J'espère que vous allez bien. Je tenais à vous informer que j'ai terminé la correction de votre examen et que votre note finale est désormais disponible.</span>

<span style="color: black">Vous avez obtenu un score de</span><span style="color: red;font-weight:bold"> [{{ $Note }}]</span><span style="color: rgb(0, 0, 0)"> sur [{{ $NombreQuestion }} Question]. Je tiens à vous féliciter pour vos efforts et votre engagement tout au long du semestre.</span>

<span style="color: black">Je suis convaincu que vous continuerez à exceller dans vos études et à atteindre vos objectifs professionnels. N'hésitez pas à me contacter si vous avez des questions ou si vous avez besoin d'aide supplémentaire.</span>

Cordialement,

<span style="color: rgb(27, 43, 134);font-weight:bold">Mr.[{{ $name }}]</span> <br>

Email : <span style="color: rgb(27, 43, 134);font-weight:bold">{{ $EmailEnseignant }}</span><br>

 - Result <br>
Nom : <span style="color: rgb(201, 9, 9);font-weight:bold">{{ $Nom }} </span><br>
Prenom : <span style="color: rgb(201, 9, 9);font-weight:bold">{{ $Prenom }}</span><br>
Matricule : <span style="color: rgb(201, 9, 9);font-weight:bold">{{ $Matricules }}</span><br>
Note : <span style="color: rgb(201, 9, 9);font-weight:bold">{{$Note}}/{{ $NombreQuestion }}</span><br>

Merci 
@endcomponent