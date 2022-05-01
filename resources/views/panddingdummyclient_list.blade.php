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
            <h3 class="card-title">Pending Client List</h3>
        </div>
        <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>KAM</th>
                            <th>Approved</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($panddingdummyclient_list as $client)
                        <?php if($client->status == '0'){ ?>
                        <tr>
                            <td width="5%">{{ $loop->iteration }}</td>
                            <td width="10%">{{ $client->cu_company }}</td>
                            <td width="10%">{{ $client->cu_contactno }}</td>
                            <td width="10%">{{ $client->cu_email }}</td>
                            <td width="20%">{{ $client->cu_address }}</td>
                            <td width="10%"><span class="badge badge-pill btn btn-primary">{{ ucwords($client->kam_name) }}</span></td>
                            <td width="8%">
                                <button data-id="{{ $client->cu_id }}" class="btn btn-secondary" data-toggle="modal" data-target='#practice_modal' onClick="open_container2(this);">Approved</button>
                            </td>
                            <td width="10%">
                                <button type="button" class="btn btn-warning">Pendding</button>
                            </td>

                            <td width="7%">
                                <span>
                                    <a href="client_view/{{ $client->cu_id }}" class="btn btn-info">View</a>
                                </span>
                            </td>
                        </tr>
                        <?php } ?>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>

 <div class="card">
    <div class="modal fade" id="practice_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

           <div class="modal-body">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="modal-title" id="exampleModalLabel">Company/Customer Information</h4>
                            </div>

                        </div>
                    </div>

                    <form action = "/pendding_client_save" method = "post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="card-body">
                            <div class="row">

                                 <div class="col-sm-6" style="display: none;">
                                    <label>Customer Name/ Company Name</label>
                                    <input type="text" class="form-control" name="cu_id" id="cu_id" placeholder="{{ $client->cu_id }}" value="{{ $client->cu_id }}" readonly />
                                </div>
                                <div class="col-sm-12">
                                    <label>Customer Name/ Company Name</label>
                                    <input type="text" class="form-control" name="cu_company" id="cu_company" placeholder="{{ $client->cu_company }}" value="{{ $client->cu_company }}" readonly />
                                </div>
                                <div class="col-sm-6" style="display: none;">
                                    <label>Customer Type</label>
                                    <input type="text" class="form-control" name="ty_id" id="ty_id" placeholder="{{ $client->ty_id }}" value="{{ $client->ty_id }}" readonly />
                                </div>
                                <div class="col-sm-6" style="display: none;">
                                    <label>Station</label>
                                    <input type="text" class="form-control" name="station" id="station" placeholder="{{ $client->station }}" value="{{ $client->station }}" readonly />
                                </div>


                                  <div class="col-sm-6">
                                <label>Contact person</label>
                                <input type="text" class="form-control" name="cu_name" id="cu_name" placeholder="{{ $client->cu_name }}" value="{{ $client->cu_name }}" readonly />
                                </div>
                                  <div class="col-sm-6">
                                    <label>Contact No</label>
                                    <input type="text" class="form-control" name="cu_contactno" id="cu_contactno" placeholder="{{ $client->cu_contactno }}" value="{{ $client->cu_contactno }}" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label>Customer Email</label>
                                    <input type="text" class="form-control" name="cu_email" id="cu_email" placeholder="{{ $client->cu_email }}" value="{{ $client->cu_email }}" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label>Customer Address</label>
                                    <textarea  name="cu_address" class="form-control" id="cu_address" rows="3" style="height:35px;">{{ $client->cu_address }}</textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label>Ip Address</label>
                                    <input type="text" class="form-control" name="cu_ip" id="cu_ip" placeholder="{{ $client->cu_ip }}" value="{{ $client->cu_ip }}" readonly />
                                </div>

                                 <div class="col-sm-6">
                                    <label>Connection Date</label>
                                    <input type="text" class="form-control" name="connect_dt" id="connect_dt" placeholder="{{ $client->connect_dt }}" value="{{ $client->connect_dt }}" readonly>
                                </div>

                                <div class="col-sm-3">
                                    <label>OTC</label>
                                    <input type="text" class="form-control" name="cu_otc" id="connect_dt"  value="0.00" />
                                </div>
                                <div class="col-sm-3">
                                    <label>Installation Cost</label>
                                    <input type="text" class="form-control" name="cu_installationcost" id="cu_installationcost" value="0.00" />
                                </div>
                                <div class="col-sm-3">
                                    <label>Security Money</label>
                                    <input type="text" class="form-control" name="cu_securitymoney" id="cu_securitymoney" value="0.00" />
                                </div>

                                <div class="col-sm-3">
                                    <label>Vat (%)</label>
                                    <input type="text" class="form-control" name="vat" id="vat" id="vat" value="0.00" />
                                </div>

                                <div class="col-sm-6">
                                    <label>Bandwidth</label>
                                    <input type="text" class="form-control" name="cu_bandwith" id="cu_bandwith" value="0.00" />
                                </div>
                                 <div class="col-sm-6">
                                    <label>Bandwidth Unit Price</label>
                                    <input type="text" class="form-control" name="cu_bandwith_price" id="cu_bandwith_price" value="0.00" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Youtube</label>
                                    <input type="text" class="form-control" name="cu_youtube" id="cu_youtube" value="0.00" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Youtube Unit Price</label>
                                    <input type="text" class="form-control" name="cu_youtube_price" id="cu_youtube_price" value="0.00" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" name="cu_facebook" id="cu_facebook" value="0.00" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Facebook Unit Price</label>
                                    <input type="text" class="form-control" name="cu_facebook_price" id="cu_facebook_price" value="0.00" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Data</label>
                                    <input type="text" class="form-control" name="cu_data" id="cu_data"  value="0.00" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Data Unit Price</label>
                                    <input type="text" class="form-control" name="cu_data_price" id="cu_data_price" value="0.00" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Bdix</label>
                                    <input type="text" class="form-control" name="cu_bdix" id="cu_bdix" value="0.00" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Bdix Unit Price</label>
                                    <input type="text" class="form-control" name="cu_bdix_price" id="cu_bdix_price" value="0.00" />
                                </div>

                             </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-sm-3">
                                <input type="hidden" class="form-control" name="area_id" id="area_id" value="" />
                                <input type="hidden" class="form-control" name="kam_id" id="kam_id" value="" />
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                            </div>
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                          </div>
                        </form>
                    </div>


                </div>
            </div>
         </div>
     </div>



 <script>  
  function open_container2(cu_id)
    {
        $.ajax({
            url:'{{ url('approve_pandding_list_save') }}',
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
                $('#cu_youtube').val(data.data.cu_youtube);
                $('#cu_facebook').val(data.data.cu_facebook);
                $('#cu_data').val(data.data.cu_data);
                $('#cu_bdix').val(data.data.cu_bdix);
                $('#kam_id').val(data.data.kam_id);

                $('#practice_modal').modal('show');

                
            }
        });
    }
 </script>
 



@endsection
