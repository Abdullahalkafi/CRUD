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
            <h3 class="card-title">Site Survey List</h3>
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
                <th>Company Name</th>
                <th>Contact No.</th>
                <th>Address</th>
                <th>Pop location</th>
                <th>Customer create</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
               
                @foreach ($site_survey_list as $site_survey)
               
                 <?php if($site_survey->survey_status == '1'){ ?>
                <tr>
                    <td>{{ $site_survey->id }}</td>
                    <td>{{ $site_survey->cu_company }}</td>
                    <td>{{ $site_survey->cu_contact_no }}</td>
                    <td>{{ $site_survey->cu_address }}</td>
                    <td>{{ $site_survey->pop_location }}</td>
                    <td><button data-id="{{ $site_survey->id }}" class="btn btn-success" data-toggle="modal" data-target='#practice_modal' onClick="open_container2(this);">New customer create</button></td>
                    <td>

                        <ul class="list-inline m-0">
                            <li class="list-inline-item">
                            <a href="site_survey_viewall/{{ $site_survey->id }}" class="btn btn-sm btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            </li>
                            <li class="list-inline-item">
                            <a href="site_survey_delete/{{ $site_survey->id }}" class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Are you sure you want to delete this clenit?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
              
                            </li>
                        </ul>
                   </td>
     
                </tr>

                 <?php } ?>

                @endforeach
         
                 
                </tbody>
              </table>

            <!-- /.box-body -->
          </div>
        </div>

<div class="card">
    <div class="modal fade" id="practice_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

           <div class="modal-body">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="padding: 20px;">
                    <div class="modal-header">

                        <h5 class="modal-title">New customer create</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                     <div class="card-body">
                            <div class="row">

     <form action = "/client_save" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <div class="form-group row">
            <div class="col-sm-6">
               <label>Company Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" id="cu_company" name="cu_company" readonly>
            </div>

             <div class="col-sm-6">
               <label>Contact person<span style="color:red;">*</span></label>
               <input type="text" class="form-control" id="cu_name" name="cu_name" readonly>
            </div>

            <div class="col-sm-6">
               <label>Contact No<span style="color:red;">*</span></label>
               <input type="text" class="form-control"  id="cu_contact_no" name="cu_contactno" readonly>
            </div>

            <div class="col-sm-6">
               <label>Customer Address<span style="color:red;">*</span></label>
               <input type="text"  name="cu_address" class="form-control" id="cu_address" readonly>
            </div>

            <div class="col-sm-6" style="display: none;">
               <label>KAM<span style="color:red;">*</span></label>
                 <input type="text"  name="kam_id" class="form-control" id="kam_id" readonly>
               </select>
            </div>


            <div class="col-sm-6">
               <label>Customer Type<span style="color:red;">*</span></label>                                               
               <select name="ty_id" class="form-control" required>
                <option value="">----Select Customer Type----</option>
                @foreach ($customer_type_list as $client)
                  <option value="{{ $client->ty_id }}">{{ $client->ty_name }}</option>
                @endforeach
               </select>
               @if($errors->has('ty_name'))
                    <div class="error" style="color:red">{{ $errors->first('ty_name') }}</div>
               @endif
            </div>
            <div class="col-sm-6">
               <label>Station<span style="color:red;">*</span></label>                                               
               <select class="form-control" name="station" required>
                  <option value="">Select Station Area</option>
                  <option value="1">Dhaka</option>
                  <option value="2">Outside Dhaka</option>
               </select>
               @if($errors->has('station'))
                    <div class="error" style="color:red">{{ $errors->first('station') }}</div>
               @endif
            </div>
      
           

            <div class="col-sm-6">
               <label>Customer Email<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_email" required>
                @if($errors->has('cu_email'))
                    <div class="error" style="color:red">{{ $errors->first('cu_email') }}</div>
               @endif
            </div>
    
            <div class="col-sm-6">
               <label>Company Short Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_short_name" required>
               @if($errors->has('cu_short_name'))
                    <div class="error" style="color:red">{{ $errors->first('cu_short_name') }}</div>
               @endif
            </div>
  
            <div class="col-sm-6">
               <label>Area<span style="color:red;">*</span></label>
               <select name="area_id" class="form-control" required>
                  <option value="">----Select Area----</option>
                  @foreach ($area_list as $alist)
                     <option value="{{ $alist->id }}">{{ ucwords($alist->name) }}</option>
                  @endforeach
               </select>
            </div>
          
            <div class="col-sm-6">
               <label>Connection Date<span style="color:red;">*</span></label>
               <input type="date" class="form-control input-medium hh" id="txtfromdatefd" name="connect_dt" required>
               @if($errors->has('connect_dt'))
                  <div class="error" style="color:red">{{ $errors->first('connect_dt') }}</div>
               @endif
            </div>
         </div>

         <div class="form-group row">
            <div class="col-sm-6">
               <label>Bandwidth<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_bandwith" required>
               @if($errors->has('cu_bandwith'))
                    <div class="error" style="color:red">{{ $errors->first('cu_bandwith') }}</div>
               @endif
            </div>
            <div class="col-sm-3">
               <label>Youtube</label>
               <input type="text" class="form-control" value="0.00" name="cu_youtube"/>
            </div>
            <div class="col-sm-3">
               <label>Facebook</label>
               <input type="text" class="form-control" value="0.00" name="cu_facebook">
            </div>
            <div class="col-sm-3">
               <label>Data</label>
               <input type="text" class="form-control" value="0.00" name="cu_data">
            </div>
            <div class="col-sm-3">
               <label>Bdix</label>
               <input type="text" class="form-control" value="0.00" name="cu_bdix">
            </div>
         </div>
         <button type="submit" class="btn btn-primary">New customer create</button>
      </form>
                    </div>
                </div>
            </div>
         </div>
     </div>


<script>  
  function open_container2(id)
    {
        $.ajax({
            url:'{{ url('site_survey_list_view') }}',
            type: 'GET',
            dataType: 'JSON',
            data: { id:id.getAttribute('data-id') },
            success: function(data){

                //alert(data);
                
                $('#id').val(data.data.id);
                $('#cu_company').val(data.data.cu_company);
                $('#cu_name').val(data.data.cu_name);
                $('#cu_contact_no').val(data.data.cu_contact_no);
                $('#cu_designation').val(data.data.cu_designation);
                $('#cu_address').val(data.data.cu_address);
                $('#lat').val(data.data.lat);
                $('#lon').val(data.data.lon);
                $('#service').val(data.data.service);
                $('#quantity').val(data.data.quantity);
                $('#connection_media').val(data.data.connection_media);
                $('#no_link').val(data.data.no_link);
                $('#nearest_pop_name').val(data.data.nearest_pop_name);
                $('#pop_location').val(data.data.pop_location);
                $('#distance_from_pop').val(data.data.distance_from_pop);
                $('#required_equipment').val(data.data.required_equipment);
                $('#nttn').val(data.data.nttn);
                $('#radio_survey_note').val(data.data.radio_survey_note);
                $('#kam_id').val(data.data.kam_id);
                $('#survey_status').val(data.data.survey_status);
                $('#practice_modal').modal('show');

                
            }
        });
    }
 </script>


@endsection

<!-- Active Aclient list data View -->


