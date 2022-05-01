@extends('layouts.admin')

@section('content')


    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">

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



            <div class="box-header">
              <h3 class="box-title">User List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($user_list as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td class="text-capitalize">
                      @if ($client->user_type == 1)
                          Superadmin
                      @elseif ($client->user_type == 2)
                          Admin
                      @elseif ($client->user_type == 3)
                          Manager
                      @else
                         User
                      @endif</td>
                      <td width="10%">
                        <a href="client_user_delete/{{ $client->id }}" class="btn btn-danger btn-sm text-white" onclick="return confirm('Are you sure you want to delete this clenit?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                   </td>
     
                </tr>

                @endforeach
         
                 
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
            <!-- /.box-body -->
      </div>
  </section>

@endsection

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
 
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
 
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
