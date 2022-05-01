@extends('layouts.admin')

@section('content')



    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Site Survey Form List</h3>
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
                <th>Approved</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($site_survey_list as $site_survey)
                <?php if($site_survey->survey_status == '0'){ ?>
                <tr>
                    <td>{{ $site_survey->id }}</td>
                    <td>{{ $site_survey->cu_company }}</td>
                    <td>{{ $site_survey->cu_contact_no }}</td>
                    <td>{{ $site_survey->cu_address }}</td>
                    <td><button data-id="{{ $site_survey->id }}" class="btn btn-secondary" data-toggle="modal" data-target='#practice_modal' onClick="open_container2(this);">Approved</button></td>
                    <td>

                        <ul class="list-inline m-0">
                            <li class="list-inline-item">
                            <a href="site_survey_edit/{{ $site_survey->id }}" class="btn btn-sm btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            </li>
                            <li class="list-inline-item">
                            <a href="site_survey_form_delete/{{ $site_survey->id }}" class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Are you sure you want to delete this clenit?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
              
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
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title">Survey report Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                     <div class="card-body">
                            <div class="row">

                   <form action = "/site_survey_viewall_report_save/{{ $site_survey->id }}" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <div class="form-group row">

           <div class="col-sm-4" style="display: none;">
               <label>Company Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="id" id="id"  readonly>
          
            </div>

            <div class="col-sm-4">
               <label>Company Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_company" id="cu_company" readonly>
          
            </div>
            <div class="col-sm-4">
               <label>Customer Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_name" id="cu_name" readonly>
          
            </div>

            <div class="col-sm-4">
               <label>Contact No<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_contact_no" id="cu_contact_no" readonly>
              
            </div>

            <div class="col-sm-4">
               <label>Designation<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_designation" id="cu_designation" readonly>
              
            </div>

            <div class="col-sm-4">
               <label>Address<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_address" id="cu_address" readonly>
              
            </div>

            <div class="col-sm-4">
               <label>Lat<span style="color:red;">*</span></label>
               <input type="number" class="form-control" name="lat" id="lat" readonly>
              
            </div>


            <div class="col-sm-4">
               <label>Lon<span style="color:red;">*</span></label>
               <input type="number" class="form-control" name="lon" id="lon" readonly>
              
            </div>

            <div class="col-sm-4">
              <label>Service<span style="color:red;">*</span></label>
              <input type="number" class="form-control" name="service" id="service" readonly>
            </div>

            <div class="col-sm-4">
               <label>Quantity<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="quantity" id="quantity" readonly>
              
            </div>

            <div class="col-sm-4">
               <label>No link<span style="color:red;">*</span></label>
               <input type="number" class="form-control" name="no_link" id="no_link" readonly>
              
            </div>

            <div class="col-sm-8">

             <label>Connection media<span style="color:red;">*</span></label>
              <select name="connection_media" class="form-control" required>
                <option value="">--------Select Connection media-----------</option>
                <option value="1">Optical fiber</option>
                <option value="2">Radio</option>
              </select>
              
            </div>

            <div class="col-sm-6">
               <label>Nearest pop name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" id="nearest_pop_name" name="nearest_pop_name">
              
            </div>

            <div class="col-sm-6">
               <label>Pop location<span style="color:red;">*</span></label>
               <input type="text" class="form-control" id="pop_location" name="pop_location">
              
            </div>

            <div class="col-sm-6">
               <label>Distance from pop<span style="color:red;">*</span></label>
               <input type="text" class="form-control" id="distance_from_pop" name="distance_from_pop">
              
            </div>

            <div class="col-sm-6">
               <label>Required equipment<span style="color:red;">*</span></label>
               <input type="text" class="form-control" id="required_equipment" name="required_equipment">
              
            </div>

            <div class="col-sm-6">

              <label>Nttn<span style="color:red;">*</span></label>
              <select name="nttn" id="nttn" class="form-control" required>
                <option value="">--------Select Nttn-----------</option>
                <option value="1">Summit communications</option>
                <option value="2">Fiber@Home</option>
                <option value="3">BTCL</option>
                <option value="4">Local</option>
              </select>
              
            </div>

           

            <div class="col-sm-6">
               <label>KAM<span style="color:red;">*</span></label>

               <select name="kam_id" class="form-control">
                  @foreach ($kam_list as $klist)
                     <option value="{{ $klist->id }}">{{ ucwords($klist->name) }}</option>
                  @endforeach
               </select>
   
            </div>

             <div class="col-sm-12">
               <label>Radio survey note<span style="color:red;">*</span></label>
               <input type="text" class="form-control" id="radio_survey_note" name="radio_survey_note">
              
            </div>
        </div>
         </div>

                          <hr>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary" value="create">Save changes</button>
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
  function open_container2(id)
    {
        $.ajax({
            url:'{{ url('site_survey_list_save') }}',
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


