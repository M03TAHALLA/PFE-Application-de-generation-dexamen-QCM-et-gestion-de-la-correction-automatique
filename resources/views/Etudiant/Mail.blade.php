
@component('mail::message')
<p style="color: black">    Cher  {{ $Nom }} {{ $Prenom }}</p>

<p style="color: black"> J'espère que vous allez bien. Je vous écris pour vous fournir le code d'accès pour l'examen Sur  EasyQCM. Ce code est<span style="color: red"> nécessaire </span> entrer dans le site Web EasyQCM et commencer l'examen.</p>

<span style="color: black"> Votre code d'accès est : </span><span style="color: red;font-weight:bold">{{ $CodeExam }}</span>  

<p style="color: black"> Veuillez noter que ce code est valide uniquement pour l'examen spécifique que vous allez passer. Assurez-vous de saisir correctement le code lors de la connexion au site Web EasyQCM.</p>

<p style="color: black"> Si vous avez des questions ou des préoccupations, n'hésitez pas à me contacter par e-mail ou par téléphone.</p>

<span style="color: black"> Email :</span><span style="color: red"> {{ $EmailEnseignant }}</span>

<p style="color: black"> Cordialement,</p>
</p>

@component('mail::button',['url'=>'http://127.0.0.1:8000/'])

Accéder au EasyQCM
    
@endcomponent
@endcomponent

