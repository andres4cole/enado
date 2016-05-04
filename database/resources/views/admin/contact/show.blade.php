@extends('admin')


@section('content')


<div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Read Mail</h3>
                  <div class="box-tools pull-right">
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                    <h3> {{ $contact->subject }}</h3>
                    <h5>From:  {{ $contact->email }} <span class="mailbox-read-time pull-right"> {{ $contact->created_at->format('Y M D, h:i:s') }}</span></h5>
                  </div><!-- /.mailbox-read-info -->
                  <div class="mailbox-controls with-border text-center">
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Reply"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Forward"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button>
                  </div><!-- /.mailbox-controls -->
                  <div class="mailbox-read-message">
                  {{ $contact->message }}
                  </div><!-- /.mailbox-read-message -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                  
                </div><!-- /.box-footer -->
                <div class="box-footer">
                  <div class="pull-right">
                    <a href="{{ url('admin/contact/'.$contact->id.'/reply') }}" class="btn btn-default"><i class="fa fa-reply"> </i> Reply</a>
                    <button class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
                  </div>

                  <form role="form" method="post" action="{{ url('admin/contact/'.$contact->id.'/delete')}}" id="form">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="id" value="{{ $contact->id }}">
                  <button class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                   </form>
                  <button class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
        {{-- $contact-> --}}

@endsection



@section('sidebar')




@endsection