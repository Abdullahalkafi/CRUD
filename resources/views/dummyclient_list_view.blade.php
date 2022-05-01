@extends('layouts.admin')

@section('content')

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $dummyclient_list_view->cu_company }}'s Info</strong></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr><td><strong>Customer Name:</strong>&nbsp;&nbsp;&nbsp; {{ $dummyclient_list_view->cu_company }}</td></tr>
                            <tr><td><strong>Contact person:</strong>&nbsp;&nbsp;&nbsp; {{ $dummyclient_list_view->cu_name }}</td></tr>
                            <tr><td><strong>Company Number:</strong>&nbsp;&nbsp;&nbsp; {{ $dummyclient_list_view->cu_contactno }}</td></tr>
                            <tr><td><strong>Email:</strong>&nbsp;&nbsp;&nbsp; {{ $dummyclient_list_view->cu_email}}</td></tr>
                            <tr><td><strong>Company Short Name:</strong>&nbsp;&nbsp;&nbsp; {{ $dummyclient_list_view->cu_short_name}}</td></tr>
                            <tr><td><strong>Customer Address:</strong>&nbsp;&nbsp;&nbsp; {{ $dummyclient_list_view->cu_address}}</td></tr>
                            <tr><td><strong>IP:</strong>&nbsp;&nbsp;&nbsp; {{ $dummyclient_list_view->cu_ip }}</td></tr>
                            <tr><td><strong>KAM:</strong>&nbsp;&nbsp;&nbsp; {{ $dummyclient_list_view->kam_id}}</td></tr>
                            <tr><td><strong>Connection Date:</strong>&nbsp;&nbsp;&nbsp; {{ $dummyclient_list_view->connect_dt}}</td></tr>
                            <tr><td><strong>Bandwidth:</strong>&nbsp;&nbsp;&nbsp; {{ $dummyclient_list_view->cu_bandwith}}</td></tr>
                            <tr><td><strong>Youtube:</strong>&nbsp;&nbsp;&nbsp; {{ $dummyclient_list_view->cu_youtube}}</td></tr>
                            <tr><td><strong>Facebook:</strong>&nbsp;&nbsp;&nbsp; {{ $dummyclient_list_view->cu_facebook}}</td></tr>
                            <tr><td><strong>Data:</strong>&nbsp;&nbsp;&nbsp; {{ $dummyclient_list_view->cu_data}}</td></tr>
                            <tr><td><strong>Bdix:</strong>&nbsp;&nbsp;&nbsp; {{ $dummyclient_list_view->cu_bdix}}</td></tr>
                          </tr>
                        </tbody>
                    </table>

                    
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4"><img src="" alt=""></div>
            </div>
        </div>
      </div>
@endsection