@extends('layouts.admin')

@section('content')





    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Client List</h3>
        </div>
        <div class="card-body">
                @if ($message = Session::get('status'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                   <table id="example" class="table table-bordered table-hover display" style="width:100%">
                          <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Contact No.</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Created By</th>
                                                    <th>Approve</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                               <?php $i = 0 ?>
                                               @foreach ($dummyclient_list as $client)
                                                  <?php $i++ ?>
                                                <tr id="row_to_hide">
                                                    <td>{{ $i }}</td>
                                                    <td class="text-capitalize">{{ $client->cu_company }}</td>
                                                    <td>{{ $client->cu_contactno }}</td>
                                                    <td>{{ $client->cu_email }}</td>
                                                    <td>{{ $client->cu_address }}</td>
                                                    <td width="10%">{{ $client->name }}</td>
                                                    <td width="15%" id="status_change{{ $client->cu_id }}">
                                                        <?php if($client->approve_status==1){ ?>
                                                       <button type="button" class="btn btn-danger" onclick="approvel_change_status('0','{{ $client->cu_id }}')">Approve</button>
                                                       <?php }else{ ?>
                                                      <button type="button" class="btn btn-info" onclick="approvel_change_status('1','{{ $client->cu_id }}')">For approval</button>
                                                       <?php } ?>
                                                    </td>

                                                    <td width="20%">
                                                        <!--Admin Route-->
                                                        <?php if($client->role==1 || $client->role==2){ ?>

                                                        <?php } ?>
                                                        <!--USER Route-->
                                                        <?php if($client->role!=4){ ?>
                                                        <span>
                                                            <a href="client_edit/{{ $client->cu_id }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>

                                                            <a href="client_view/{{ $client->cu_id }}" class="btn btn-sm btn-success"><i class="fa fa-retweet" aria-hidden="true"></i></a>

                                                                <a href="client_delete/{{ $client->cu_id }}" class="btn btn-danger btn-sm text-white" onclick="return confirm('Are you sure you want to delete this client?');"><i class="fa fa-trash" aria-hidden="true"></i></a>

                                                        </span>
                                                        <?php } ?>
                                                    </td>

                                                </tr>
                                                @endforeach




                                </tbody>

                                        <tfoot>
                                        <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Contact No.</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Created By</th>
                                                    <th>Approve</th>
                                                    <th>Actions</th>
                                                </tr>
                                    </tfoot>
                            </table>
        </div>
    </div>


    <script type="text/javascript">

   function approvel_change_status(approve_status,cu_id)
    {

 //alert();
        $.ajax({

            type: "GET",

            dataType: "json",

            url: '/approvel_change_status',

            data: {'approve_status': approve_status, 'cu_id': cu_id},

            success: function(data){

               $('#row_to_hide').remove();

            }
            });

        return false; // keeps the page from not refreshing
    }
    </script>


@endsection


