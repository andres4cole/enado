@extends('admin')


@section('content')



 <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> contacts </h3>
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
                      <th>Email</th>
                      <th>title</th>                    
                      <th>date </th>
                      <th>Status</th>
                      <th>View</th>
					  <th>reply</th>
                      <th>delete</th>
                      


                    </tr>
                    @foreach($contacts as $contact)
                    <tr>
                      <td>{{ $contact->id }}</td>
                      <td>{{ $contact->email }}</td>
                      <td><h4> {{ $contact->subject }} </h4>
                      <p>{{ substr($contact->message, 0, 200) }} </p></td>
                      <td>{{ $contact->created_at->format('M d Y')}}</td>
                      @if($contact->status == 'read')
                      <td><span class="label label-danger">{{ $contact->status}}</span></td>
                      @elseif($contact->status == 'unread')
                       <td><span class="label label-primary">{{ $contact->status }}</span></td>
                      @elseif($contact->status == 'reply')
                       <td><span class="label label-success">{{ $contact->status}}</span></td>
                      @endif
                      <td><a href="{{ url('admin/contact/v/'.$contact->id.'') }}">view<a/></td>
					  <td><a href="{{ url('admin/contact/'.$contact->id.'/reply') }}"><i class="fa fa-edit"></i></a></td>

                     <td>
					  <form role="form" method="post" action="{{ url('admin/contact/'.$contact->id.'/delete')}}" id="form">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="id" value="{{ $contact->id }}">
                      <button class="fa fa-trash-o"></button>
					  </form>
                      </td>
                      
                    </tr>

                    @endforeach

             
                  </table>
                  <div class="box-footer box-solid">
                   {!! $contacts->render() !!}
               </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>  


@endsection



@section('sidebar')




@endsection