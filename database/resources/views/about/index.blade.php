
@extends('app')

  @section('headerapp')

<section id="headerapp" style="background-image: url('{{ asset('/files/about/'.$about->picture.'')}}')">
	
	<h2> {{$about->title}} </h2>
</section>
  @endsection

@section('content')

{!! $about->about !!}
@endsection



@section('sidebar')

@endsection