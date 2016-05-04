@extends('admin')


@section('content')


<div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> news </h3>
                  <a href="{{ url('admin/news/create') }}"><strong class="btn btn-primary fa fa-plus">  create</strong></a>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" />
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding solid">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>image</th>
                      <th>title</th>                    
                      <th>date </th>
                      <th>Status</th>
                      <th>View</th>
					  <th>Edit</th>
                      <th>delete</th>
                      


                    </tr>
                    @foreach($news as $new)
                    <tr>
                      <td>{{ $new->id }}</td>
                      <td><img src="{{asset('files/news/'.$new->picture.'')}}" class="img-td" alt="" /></td>
                      <td><h4> {{ $new->title }} </h4> on <h5> {{-- $new->categories->name --}}</h5>
                            <p>{{ substr($new->news, 0, 200) }} </p></td>
                      <td>{{ $new->created_at->format('M d Y')}}</td>
                      <td><span class="label label-success">{{ $new->status}}</span></td>
                      <td><a href="{{ url('admin/news/v/'.$new->id.'') }}">view<a/></td>
					  <td><a href="{{ url('admin/news/'.$new->id.'/edit') }}"><i class="fa fa-edit"></i></a></td>

                     <td>
					  <form role="form" method="post" action="{{ url('admin/news/'.$new->id.'/delete')}}" id="form">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="id" value="{{ $new->id }}">
                      <button class="fa fa-trash-o"></button>
					  </form>
                      </td>
                      
                    </tr>

                    @endforeach

             
                  </table>
                  <div class="box-footer box-solid">
                   {!! $news->render() !!}
               </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>  


@endsection



@section('sidebar')




@endsection