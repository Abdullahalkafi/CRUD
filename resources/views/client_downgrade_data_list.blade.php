@extends('layouts.admin')

@section('content')

    <div class="card">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert">×</button>
               {{ session('status') }}
            </div>
            @elseif(session('failed'))
            <div class="alert alert-danger" role="alert">
               <button type="button" class="close" data-dismiss="alert">×</button>
               {{ session('failed') }}
            </div>
            @endif
        <div class="card-header">
            <h3 class="card-title">Client Data List (for downgrade)</h3>
        </div>
        <div class="card-body">
                <table id="example" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Company Name</th>
                            <th>Internet</th>
                            <th>Youtube</th>
                            <th>Facebook</th>
                            <th>Data</th>
                            <th>Bdix</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php $i = 0 ?>
                      @foreach ($client_downgrade_data_list as $client)
                      <?php $i++ ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td class="text-capitalize">{{ $client->cu_company }}</td>
                            <td>{{ $client->cu_bandwith }}</td>
                            <td>{{ $client->cu_youtube }}</td>
                            <td>{{ $client->cu_facebook }}</td>
                            <td>{{ $client->cu_data }}</td>
                            <td>{{ $client->cu_bdix }}</td>
                            <td width="10%">
                                <span>
                                    <a href="client_data_bandwidth_downgrade_edit/{{ $client->cu_id }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                    <a href="client_u_d_dataview/{{ $client->cu_id }}" class="btn btn-sm btn-success"><i class="fa fa-retweet" aria-hidden="true"></i></a>
                                </span>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
         

        </div>
    </div>

@endsection