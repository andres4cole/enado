@extends('admin')


@section('content')


	<div class="col-sm-6">
						<div class="portfolio-item">
							<div class="portfolio-image">
	<a href="{{ url('admin/portfolio/v/'.$portfolio->id.'') }} "> <img src="{{ asset('/files/portfolio/'.$portfolio->image.'') }}" alt="{{ $portfolio->name}}"></a>

							</div>
						</div>
					</div>
					<!-- End Image Column -->
					<!-- Project Info Column -->
					
					<div class="portfolio-item-description col-sm-6">
						<div class="panel">
							<div class="box-header box-solid">
						<h3>Portfolio Description</h3>
					</div>
					<div class="box-body">
						<p>
						{{ $portfolio->description}}
						</p>


							<br><strong>Client:</strong> {{$portfolio->client}}.</br>
							<span><strong>budget:</strong> {{$portfolio->budget}}</span>
							<br><strong>Cost:</strong> {{$portfolio->cost}}</br>
							<span><strong> Start Date:</strong> {{$portfolio->created_at->format('M d, Y')}} </span> 
							<br><strong>End Date:</strong> {{$portfolio->end_time }}</br>
							<span><strong>Technologies:</strong> {{$portfolio->technologies}}</span>
						</div>
						<div class="box-footer box-solid">
							<li class="btn btn-default"><a href="{{$portfolio->website}}">Visit Website</a></li>
					        <li class="read-more btn-line"><a href=" {{ url('admin/portfolio/'.$portfolio->id.'/edit')  }} " class="btn btn-default">Edit</a></li>
					  <li><form role="form" method="post" action="{{ url('admin/portfolio/'.$portfolio->id.'/delete')}}" id="form">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="id" value="{{ $portfolio->id }}">
                      <button class="fa fa-trash-o"></button>
					  </form>
					</li>
						 </div>
				        </div>
			          </div>
					<!-- End Project Info Column -->
				</div>
			</div>
						

@endsection



@section('sidebar')




@endsection