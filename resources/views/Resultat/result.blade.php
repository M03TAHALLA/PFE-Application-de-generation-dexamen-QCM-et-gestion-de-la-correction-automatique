@extends('layouts.app')
@section('title')
    <title>Resultat</title>
@endsection
@section('home button')
<a   style="color: red; font-weight:bold; margin-left:100px" class="navbar-brand" href="{{ route('Qcmliste.index') }}">
  Liste Qcm
</a>
<a href="{{ route('etudiant.show', $id) }}" style="color: red; font-weight:bold; margin-left:100px" class="navbar-brand"> Etudiant's
					
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
        <link rel="stylesheet" href="/css/Resultat/Resultat.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    </head>
    <body>
      <div class="loader-container">
        <div class="loader"></div>
    </div>
        <section class="articles">
          <?php 
          include 'C:/xampp/htdocs/QCMProject/public/depuis_qcm.php';
       ?>
          <?php foreach ($etudiant as $etud){?>
            <article>
              <div class="article-wrapper">
                <figure>
                  <img style="width: 70% ; height:70 ; margin-left:15%" src="images/EtudiantsIcone.png" alt="" />
                </figure>
                <div class="article-body">
                  <h2><?php echo $etud[1] ?></h2>
                <p>Date  : <?php echo $etud[0] ?></p>
                <p>Matricule : <?php echo $etud[3] ?></p>
                  <a href="{{ route('details',[$etud[3],$id]) }}" class="read-more">
                    Read more <span class="sr-only">about this is some title</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </a>
                </div>
              </div>
            </article>
         <?php } ?>
          </section>
        
    </body>
    </html>

@endsection