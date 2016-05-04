@extends('admin')


@section('content')

	<div class="col-md-9">
              <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $proposal->fullname }}</h3>
               <h5>{{ $proposal->company }} <span class="mailbox-read-time pull-right"> {{ $proposal->created_at->format('Y M D, h:i:s') }}</span></h5>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              {{ $proposal->proposal }}
              <br><strong>Description: </strong> {{$proposal->description }}.</br>
               <br><strong>website:</strong> {{$proposal->website }}.</br>
                <br><strong>Email:</strong> {{$proposal->email }}.</br>
                 <br><strong>Phone:</strong> {{ $proposal->phone }}.</br>
                  <br><strong>proposal type:</strong> {{$proposal->proposal_type }}.</br>
                   <br><strong>Budget:</strong> {{$proposal->budget }}.</br>
                    <br><strong>Time_frame:</strong> {{$proposal->time_frame }}.</br>
                     <br><strong>Google:</strong> {{$proposal->google}}.</br>
            </div><!-- /.box-body -->
            <div class="box-footer">

            	<ul class="mailbox-attachments clearfix">

            		   <li>
                      <span class="mailbox-attachment-icon"><a href="{{asset('files/proposal/'.$proposal->proposal_file.'')}}" alt="Attachment" /></a></span>
                      <div class="mailbox-attachment-info">
                        <a href="{{asset('files/proposal/'.$proposal->proposal_file.'')}}" class="mailbox-attachment-name"><i class="fa fa-zip"></i> proposal file </a>
                        <span class="mailbox-attachment-size">
                          2.67 MB
                          <a href="{{asset('files/proposal/'.$proposal->proposal_file.'')}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                      </div>
                    </li>
                    <li>
				
                    <li>

            	</ul>
            	</div> {{-- div box footer --}}
            	 <div class="box-footer">	
                  <div class="pull-right">
                    <a href="{{ url('admin/proposal/'.$proposal->id.'/edit') }}" class="btn btn-default"><i class="fa fa-edit"> </i>edit</a>

                     <form role="form" method="post" action="{{ url('admin/proposal/'.$proposal->id.'/delete')}}" id="form">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="id" value="{{ $proposal->id }}">
                      <button class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                     </form>

                 </div>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
      </div>


@endsection



@section('sidebar')


@endsection