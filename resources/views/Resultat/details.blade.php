@extends('layouts.app')
@section('title')
    <title>Resultat</title>
@endsection
@section('home button')
<a   style="color: red; font-weight:bold; margin-left:100px" class="navbar-brand" href="{{ route('Qcmliste.index') }}">
  Liste Qcm
</a>
<style>
    @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700');

 h1, h2, h3, h4, h5, h6 {
	 margin: 0;
}

 .table {
	 width: 100%;
	 border: 1px solid #eee;
     display: inline-block;
}
 .table-header {
	 display: flex;
	 width: 100%;
	 background: #000;
	 padding: 18px 0;
}
 .table-row {
	 display: flex;
	 width: 100%;
	 padding: 15px 0;
}
 .table-row:nth-of-type(odd) {
	 background: #eee;
}
 .table-data, .header__item {
	 flex: 1 1 20%;
	 text-align: center;
}
 .header__item {
	 text-transform: uppercase;
}
 .filter__link {
	 color: white;
	 text-decoration: none;
	 position: relative;
	 display: inline-block;
	 padding-left: 10px;
	 padding-right: 10px;
}
 .filter__link::after {
	 content: '';
	 position: absolute;
	 right: 18px;
	 color: white;
	 font-size: 12px;
	 top: 50%;
	 transform: translateY(-50%);
}
 .filter__link.desc::after {
	 content: '(desc)';
}
 .filter__link.asc::after {
	 content: '(asc)';
}
 .container{
    display: inline;
 }
 .py-4 {
    padding-top: 1.5rem!important;
    padding-bottom: 1.5rem!important;
    display: flex;
}
</style>
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="table">
            <div class="table-header">
              
                <div class="header__item"><a id="wins" class="filter__link filter__link--number">Question</a></div>
                <div class="header__item"><a id="draws" class="filter__link filter__link--number">Reponse</a></div>
            </div>
            <div class="table-content">	

                @foreach($question as $question)
                	
                <div class="table-row">	
                    <div class="table-data">{{ $question->NumQuestion }}</div>
                    <div class="table-data">{{ $question->Reponse }}</div>

                </div>
                @endforeach
                </div>

            </div>	
        </div>
        <div class="table">
            <div class="table-header">
              
                <div class="header__item"><a id="wins" class="filter__link filter__link--number">Solution</a></div>
            </div>
            <div class="table-content">	

                @foreach($solution as $solution)
                	
                <div class="table-row">	
                    <div class="table-data">@if($solution->A ==1 )
                                                1
                                            @endif
                                            @if($solution->B ==1 )
                                                2
                                            @endif
                                            @if($solution->C ==1 )
                                                3
                                            @endif
                                            @if($solution->D ==1 )
                                                4
                                            @endif
                                            @if($solution->E ==1 )
                                                5
                                            @endif
                    </div>
                </div>
                @endforeach
                </div>
              

            </div>	
        </div>
</div>
</body>

</html>
@endsection