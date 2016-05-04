
@extends('app')

@section('headerapp')
<section id="headerapp" style="background-image: url('{{ asset('/frontend/images/wps.jpg')}}')">
    <h2 class="newsh">Press Release</h2>
</section>

@endsection

@section('content')

				<div class="col-md-8">
					<h2 class="newsh2">Latest News from Enadoo </h2>
					<div class="row">
					@foreach($news as $new)
						<div class="col-md-6 news">
							<img src="{{ asset('files/news/'.$new->picture.'') }}" title="name" />
							<h4><a href="{{ url('news/'.$new->id.'') }}"> {{ $new->title }} </a></h4>
							<span>{{ $new->created_at->format('d M Y')}} {{-- by <a href="#">Admin</a></span> --}}
							<p> {{ substr($new->news, 0, 190) }}.... </p>
							<a class="news-btn" href="{{ url('news/'.$new->id.'') }}">Read More</a>
						</div>
						@endforeach
						{!! $news->render() !!}
					</div>
				</div>

@endsection



@section('sidebar')

@include('include.proposal')
@endsection