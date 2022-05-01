@extends('layouts.admin')

@section('content')

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

<div class="card">
   <div class="card-header">
      <h3 class="card-title">IP create</h3>
   </div>
   <div class="card-body">
      <form action = "/ip_list_save" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <div class="form-group row">
            <div class="col-sm-4">
               <label>IP Address<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="ip_address" required>
          
            </div>
         </div>

         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">IP List</h3>
        </div>
        <div class="card-body">
  <table id="example" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ip</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                          
                      <?php $i = 0 ?>
                        @foreach ($ip_list as $ip)
                        <?php $i++ ?>
                        <tr id="row_to_hide">
                            <td width="20%">{{ $i }}</td>
                            <td width="60%">{{ $ip->ip_address }}</td>
                            <td width="20%">
                                 <ul class="list-inline m-0">
                                              <li class="list-inline-item">
                                                
                                                 <button data-id="{{ $ip->id }}" class="btn btn-sm btn-success" data-toggle="modal" data-target='#practice_modal_edit' onClick="ip_edit(this);" ><i class="fa fa-pencil-square" aria-hidden="true"></i></button>

                                                 </li>
                                                <li class="list-inline-item">
                                                  <a href="ip_list_delete/{{ $ip->id }}" class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Are you sure you want to delete this clenit?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
              
                                            </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                               <tfoot>
                                        <tr>
                                          <th>ID</th>
                                          <th>Ip</th>
                                          <th>Action</th>
                                           </tr>
                                    </tfoot>
                </table>
   </div>

</div>


<div class="card">
    <div class="modal fade" id="practice_modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

           <div class="modal-body">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title">IP Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                    <form action = "/pendding_client_save" method = "post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="card-body">
                            <div class="row">

                                 <div class="col-sm-6" style="display: none;">
                                    <label>Customer Name/ Company Name</label>
                                    <input type="text" class="form-control" id="id" name="id" placeholder="{{ $ip_list[0]->id }}" value="{{ $ip_list[0]->id }}" readonly />
                                </div>
                                <div class="col-sm-12">
                                    <label>Ip Address</label>
                                    <input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="{{ $ip_list[0]->ip_address }}" value="{{ $ip_list[0]->ip_address }}" />
                                </div>
                               
                             </div>
                          </div>

                            <div class="modal-footer">
                                <input type="button" name="save" class="btn btn-primary" value="Save to changes" id="butsave">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
         </div>
     </div>

<script>  


// active customer list data view

  function ip_edit(id)
    {
        $.ajax({
            url:'{{ url('ip_list_viewall') }}',
            type: 'GET',
            dataType: 'JSON',
            data: { id:id.getAttribute('data-id') },
            success: function(data){

              //alert(data);
                
                $('#id').val(data.data.id);
                $('#ip_address').val(data.data.ip_address);
                $('#practice_modal_edit').modal('show');
    
                
            }
        });
    }

// Ip Edit data insert //


$(document).on('click', '#butsave' ,function() {

        var id =  $('#id').val();
        var ip_address =  $('#ip_address').val();

       $.ajax ({
            url: "ip_list_viewall_save/" + id,
           type : "POST",
           data : {

               _token:'{{ csrf_token() }}',
               id:id ,
               ip_address : ip_address
           },
           success: function (data) {
               console.log(data);
           }
       });
 
    });

</script>




@endsection


<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
 
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
 
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

