@extends('app')




        @section('content')
	
			
    <section id="error" class="container text-center">

    	<div class="cool-md-12">
        <h1>404, Page not found</h1>
        <p>The Page you are looking for doesn't exist or an other error occurred.</p>
        <p class="pull-center"><a  href="{{url('/')}}"  class="btn btn"  > GO BACK TO THE HOME</a></p>
    </div>
    </section><!--/#error  class="btn btn-default"-->

		
		@endsection


