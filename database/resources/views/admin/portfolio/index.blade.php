@extends('admin')


@section('content')


@foreach ($portfolios as $portfolio)
        <div class="col-md-4 col-sm-6">
						<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="{{ url('admin/portfolio/v/'.$portfolio->id.'') }} "> <img src="{{ asset('/files/portfolio/'.$portfolio->image.'') }}" alt="{{ $portfolio->name}}"></a>
							</div>
							<div class="portfolio-info">
								<ul>
									<li class="portfolio-project-name">{{ $portfolio->name}}</li>
									<li>{{ $portfolio->title }}</li>
									<li><strong>Client:</strong> {{ $portfolio->client }} </li>
									
									<li class="read-more btn-line"><a href="{{ url('admin/portfolio/v/'.$portfolio->id.'') }} " class="btn btn-default">Read more</a></li>
						           <li class="read-more btn-line"><a href=" {{ url('admin/portfolio/'.$portfolio->id.'/edit')  }} " class="btn btn-default">Edit</a></li>
                      

                      <li><form role="form" method="post" action="{{ url('admin/portfolio/'.$portfolio->id.'/delete')}}" id="form">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="id" value="{{ $portfolio->id }}">
                      <button class="fa fa-trash-o"></button>
					  </form>
					</li>

								</ul>
							</div>
						</div>
       					</div>
       					@endforeach

       						{{ $portfolios->render() }}


@endsection



@section('sidebar')




@endsection