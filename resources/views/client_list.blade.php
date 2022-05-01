@extends('layouts.admin')

@section('content')



    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Client Active List</h3>
         </div>
            <!-- /.box-header -->
            <div class="card-body">
              @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

              <table id="example" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>Address</th>
                <th>Show All Informations</th>
                <th>Status</th>
                <?php $user_typeone = Auth::user()->user_type; if($user_typeone==1 || $user_typeone==2){ ?>
                <th>Actions</th>
                <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php $user_type = Auth::user()->user_type; $i = 0 ?>
                @foreach ($client_list as $client)
                <?php $i++ ?>
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $client->cu_company }}</td>
                    <td>{{ $client->cu_contactno }}</td>
                    <td>{{ $client->cu_email }}</td>
                    <td>{{ $client->cu_address }}</td>
                    <td><button data-id="{{ $client->cu_id }}" class="btn btn-sm btn-success" data-toggle="modal" data-target='#practice_modal' onClick="active_customer_list_view(this);" >All Informations View</button></td>
                    <td  width="10%"> 
                        <span>
                         <a href="#" class="btn btn-success">Active</a>
                      </span>
                    </td>

                    <?php 



                     if($user_type==1 || $user_type==2){ ?>

                                                       
                      <td width="10%">
                        <button data-id="{{ $client->cu_id }}" class="btn btn-sm btn-success" data-toggle="modal" data-target='#practice_modal_edit' onClick="active_customer_edit(this);" ><i class="fa fa-pencil-square" aria-hidden="true"></i></button>
                        
                        <a href="active_customer_delete/{{ $client->cu_id }}" class="btn btn-danger btn-sm text-white" onclick="return confirm('Are you sure you want to delete this clenit?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                   </td>

                    <?php } ?>
     
                </tr>

                @endforeach
         
                 
                </tbody>
              </table>

            <!-- /.box-body -->
          </div>
        </div>




<!-- Active Aclient list data View -->


<div class="card">
    <div class="modal fade" id="practice_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

           <div class="modal-body">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title">Active Customer Information</h5>
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
                                    <input type="text" class="form-control" id="cu_id" placeholder="{{ $client->cu_id }}" value="{{ $client->cu_id }}" readonly />
                                </div>
                                <div class="col-sm-12">
                                    <label>Customer Name/ Company Name</label>
                                    <input type="text" class="form-control" id="cu_company" placeholder="{{ $client->cu_company }}" value="{{ $client->cu_company }}" readonly />
                                </div>
                                <div class="col-sm-6" style="display: none;">
                                    <label>Customer Type</label>
                                    <input type="text" class="form-control" id="ty_id" placeholder="{{ $client->ty_id }}" value="{{ $client->ty_id }}" readonly />
                                </div>
                                <div class="col-sm-6" style="display: none;">
                                    <label>Station</label>
                                    <input type="text" class="form-control" id="station" placeholder="{{ $client->station }}" value="{{ $client->station }}" readonly />
                                </div>


                                  <div class="col-sm-6">
                                <label>Contact person</label>
                                <input type="text" class="form-control" id="cu_name" placeholder="{{ $client->cu_name }}" value="{{ $client->cu_name }}" readonly />
                                </div>
                                  <div class="col-sm-6">
                                    <label>Contact No</label>
                                    <input type="text" class="form-control" id="cu_contactno" placeholder="{{ $client->cu_contactno }}" value="{{ $client->cu_contactno }}" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label>Customer Email</label>
                                    <input type="text" class="form-control"  id="cu_email" placeholder="{{ $client->cu_email }}" value="{{ $client->cu_email }}" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label>Customer Address</label>
                                    <textarea  class="form-control" id="cu_address" rows="3" style="height:35px;">{{ $client->cu_address }}</textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label>Ip Address</label>
                                    <input type="text" class="form-control"  id="cu_ip" placeholder="{{ $client->cu_ip }}" value="{{ $client->cu_ip }}" readonly />
                                </div>

                                 <div class="col-sm-6">
                                    <label>Connection Date</label>
                                    <input type="text" class="form-control"  id="connect_dt" placeholder="{{ $client->connect_dt }}" value="{{ $client->connect_dt }}" readonly>
                                </div>

                                <div class="col-sm-3">
                                    <label>OTC</label>
                                    <input type="text" class="form-control"  id="connect_dt"  value="0.00" readonly />
                                </div>
                                <div class="col-sm-3">
                                    <label>Installation Cost</label>
                                    <input type="text" class="form-control"  id="cu_installationcost" value="0.00" readonly />
                                </div>
                                <div class="col-sm-3">
                                    <label>Security Money</label>
                                    <input type="text" class="form-control"  id="cu_securitymoney" value="0.00" readonly />
                                </div>

                                <div class="col-sm-3">
                                    <label>Vat (%)</label>
                                    <input type="text" class="form-control"  id="vat" id="vat" value="0.00" readonly />
                                </div>

                                <div class="col-sm-6">
                                    <label>Bandwidth</label>
                                    <input type="text" class="form-control"  id="cu_bandwith" value="0.00" readonly />
                                </div>
                                 <div class="col-sm-6">
                                    <label>Bandwidth Unit Price</label>
                                    <input type="text" class="form-control"  id="cu_bandwith_price" value="0.00" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label>Youtube</label>
                                    <input type="text" class="form-control"  id="cu_youtube" value="0.00" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label>Youtube Unit Price</label>
                                    <input type="text" class="form-control"  id="cu_youtube_price" value="0.00" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control"  id="cu_facebook" value="0.00" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label>Facebook Unit Price</label>
                                    <input type="text" class="form-control"  id="cu_facebook_price" value="0.00" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label>Data</label>
                                    <input type="text" class="form-control"  id="cu_data"  value="0.00" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label>Data Unit Price</label>
                                    <input type="text" class="form-control"  id="cu_data_price" value="0.00" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label>Bdix</label>
                                    <input type="text" class="form-control" id="cu_bdix" value="0.00" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label>Bdix Unit Price</label>
                                    <input type="text" class="form-control"  id="cu_bdix_price" value="0.00" readonly />
                                </div>

                             </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
     </div>


     <!-- Active Aclient list data Edit -->


<div class="card">
    <div class="modal fade" id="practice_modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

           <div class="modal-body">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title">Active Customer Information Edit</h5>
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
                                    <input type="text" class="form-control" id="cu_id" placeholder="{{ $client->cu_id }}" value="{{ $client->cu_id }}" readonly />
                                </div>
                                <div class="col-sm-12">
                                    <label>Customer Name/ Company Name</label>
                                    <input type="text" class="form-control" id="cu_company" placeholder="{{ $client->cu_company }}" value="{{ $client->cu_company }}" />
                                </div>
                                <div class="col-sm-6" style="display: none;">
                                    <label>Customer Type</label>
                                    <input type="text" class="form-control" id="ty_id" placeholder="{{ $client->ty_id }}" value="{{ $client->ty_id }}" readonly />
                                </div>
                                <div class="col-sm-6" style="display: none;">
                                    <label>Station</label>
                                    <input type="text" class="form-control" id="station" placeholder="{{ $client->station }}" value="{{ $client->station }}" readonly />
                                </div>


                                  <div class="col-sm-6">
                                <label>Contact person</label>
                                <input type="text" class="form-control" id="cu_name" placeholder="{{ $client->cu_name }}" value="{{ $client->cu_name }}"  />
                                </div>
                                  <div class="col-sm-6">
                                    <label>Contact No</label>
                                    <input type="text" class="form-control" id="cu_contactno" placeholder="{{ $client->cu_contactno }}" value="{{ $client->cu_contactno }}"  />
                                </div>
                                <div class="col-sm-6">
                                    <label>Customer Email</label>
                                    <input type="text" class="form-control"  id="cu_email" placeholder="{{ $client->cu_email }}" value="{{ $client->cu_email }}"  />
                                </div>
                                <div class="col-sm-6">
                                    <label>Customer Address</label>
                                    <textarea  class="form-control" id="cu_address" rows="3" style="height:35px;">{{ $client->cu_address }}</textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label>Ip Address</label>
                                    <input type="text" class="form-control"  id="cu_ip" placeholder="{{ $client->cu_ip }}" value="{{ $client->cu_ip }}"  />
                                </div>

                                 <div class="col-sm-6">
                                    <label>Connection Date</label>
                                    <input type="text" class="form-control"  id="connect_dt" placeholder="{{ $client->connect_dt }}" value="{{ $client->connect_dt }}" >
                                </div>

                                <div class="col-sm-3">
                                    <label>OTC</label>
                                    <input type="text" class="form-control"  id="connect_dt"  value="0.00"  />
                                </div>
                                <div class="col-sm-3">
                                    <label>Installation Cost</label>
                                    <input type="text" class="form-control"  id="cu_installationcost" value="0.00"  />
                                </div>
                                <div class="col-sm-3">
                                    <label>Security Money</label>
                                    <input type="text" class="form-control"  id="cu_securitymoney" value="0.00"  />
                                </div>

                                <div class="col-sm-3">
                                    <label>Vat (%)</label>
                                    <input type="text" class="form-control"  id="vat" id="vat" value="0.00"  />
                                </div>

                                <div class="col-sm-6">
                                    <label>Bandwidth</label>
                                    <input type="text" class="form-control"  id="cu_bandwith" value="0.00"  />
                                </div>
                                 <div class="col-sm-6">
                                    <label>Bandwidth Unit Price</label>
                                    <input type="text" class="form-control"  id="cu_bandwith_price" value="0.00"  />
                                </div>
                                <div class="col-sm-6">
                                    <label>Youtube</label>
                                    <input type="text" class="form-control"  id="cu_youtube" value="0.00"  />
                                </div>
                                <div class="col-sm-6">
                                    <label>Youtube Unit Price</label>
                                    <input type="text" class="form-control"  id="cu_youtube_price" value="0.00"  />
                                </div>
                                <div class="col-sm-6">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control"  id="cu_facebook" value="0.00"  />
                                </div>
                                <div class="col-sm-6">
                                    <label>Facebook Unit Price</label>
                                    <input type="text" class="form-control"  id="cu_facebook_price" value="0.00"  />
                                </div>
                                <div class="col-sm-6">
                                    <label>Data</label>
                                    <input type="text" class="form-control"  id="cu_data"  value="0.00"  />
                                </div>
                                <div class="col-sm-6">
                                    <label>Data Unit Price</label>
                                    <input type="text" class="form-control"  id="cu_data_price" value="0.00"  />
                                </div>
                                <div class="col-sm-6">
                                    <label>Bdix</label>
                                    <input type="text" class="form-control" id="cu_bdix" value="0.00"  />
                                </div>
                                <div class="col-sm-6">
                                    <label>Bdix Unit Price</label>
                                    <input type="text" class="form-control"  id="cu_bdix_price" value="0.00"  />
                                </div>

                             </div>
                          </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Save changes</button>
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

  function active_customer_list_view(cu_id)
    {
        $.ajax({
            url:'{{ url('active_customer_list_viewall') }}',
            type: 'GET',
            dataType: 'JSON',
            data: { cu_id:cu_id.getAttribute('data-id') },
            success: function(data){
                
                $('#cu_id').val(data.data.cu_id);
                $('#cu_name').val(data.data.cu_name);
                $('#area_id').val(data.data.area);
                $('#ty_id').val(data.data.ty_id);
                $('#cu_company').val(data.data.cu_company);
                $('#cu_contactno').val(data.data.cu_contactno);
                $('#cu_email').val(data.data.cu_email);
                $('#cc_address').val(data.data.cc_address);
                $('#cu_short_name').val(data.data.cu_short_name);
                $('#cu_address').val(data.data.cu_address);
                $('#cu_ip').val(data.data.cu_ip);
                $('#station').val(data.data.station);
                $('#index_no').val(data.data.index_no);
                $('#connect_dt').val(data.data.connect_dt);
                $('#status').val(data.data.status);
                $('#approve_status').val(data.data.approve_status);
                $('#send_mail_status').val(data.data.send_mail_status);
                $('#otc_status').val(data.data.otc_status);
                $('#update_by').val(data.data.update_by);
                $('#update_at').val(data.data.update_at);
                $('#updated_at').val(data.data.updated_at);
                $('#create_by').val(data.data.create_by);
                $('#create_dt').val(data.data.create_dt);
                $('#cu_bandwith').val(data.data.cu_bandwith);
                $('#cu_bandwith_price').val(data.data.cu_bandwith_price);
                $('#cu_youtube').val(data.data.cu_youtube);
                $('#cu_youtube_price').val(data.data.cu_youtube_price);
                $('#cu_facebook').val(data.data.cu_facebook);
                $('#cu_facebook_price').val(data.data.cu_facebook_price);
                $('#cu_data').val(data.data.cu_data);
                $('#cu_data_price').val(data.data.cu_data_price);
                $('#cu_bdix').val(data.data.cu_bdix);
                $('#cu_bdix_price').val(data.data.cu_bdix_price);
                $('#kam_id').val(data.data.kam_id);

                $('#practice_modal').modal('show');

                
            }
        });
    }

 // active customer list data edit

   function active_customer_edit(cu_id)
    {

        //alert();
        $.ajax({
            url:'{{ url('active_customer_list_edit') }}',
            type: 'GET',
            dataType: 'JSON',
            data: { cu_id:cu_id.getAttribute('data-id') },
            success: function(data){
                
                $('#cu_id').val(data.data.cu_id);
                $('#cu_name').val(data.data.cu_name);
                $('#area_id').val(data.data.area);
                $('#ty_id').val(data.data.ty_id);
                $('#cu_company').val(data.data.cu_company);
                $('#cu_contactno').val(data.data.cu_contactno);
                $('#cu_email').val(data.data.cu_email);
                $('#cc_address').val(data.data.cc_address);
                $('#cu_short_name').val(data.data.cu_short_name);
                $('#cu_address').val(data.data.cu_address);
                $('#cu_ip').val(data.data.cu_ip);
                $('#station').val(data.data.station);
                $('#index_no').val(data.data.index_no);
                $('#connect_dt').val(data.data.connect_dt);
                $('#status').val(data.data.status);
                $('#approve_status').val(data.data.approve_status);
                $('#send_mail_status').val(data.data.send_mail_status);
                $('#otc_status').val(data.data.otc_status);
                $('#update_by').val(data.data.update_by);
                $('#update_at').val(data.data.update_at);
                $('#updated_at').val(data.data.updated_at);
                $('#create_by').val(data.data.create_by);
                $('#create_dt').val(data.data.create_dt);
                $('#cu_bandwith').val(data.data.cu_bandwith);
                $('#cu_bandwith_price').val(data.data.cu_bandwith_price);
                $('#cu_youtube').val(data.data.cu_youtube);
                $('#cu_youtube_price').val(data.data.cu_youtube_price);
                $('#cu_facebook').val(data.data.cu_facebook);
                $('#cu_facebook_price').val(data.data.cu_facebook_price);
                $('#cu_data').val(data.data.cu_data);
                $('#cu_data_price').val(data.data.cu_data_price);
                $('#cu_bdix').val(data.data.cu_bdix);
                $('#cu_bdix_price').val(data.data.cu_bdix_price);
                $('#kam_id').val(data.data.kam_id);

                $('#practice_modal').modal('show');

                
            }
        });
    }




 </script>
 




@endsection

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
 
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
 
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
