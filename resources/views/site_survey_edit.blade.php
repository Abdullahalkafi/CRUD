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
      <h3 class="card-title">Site survey create</h3>
   </div>
   <div class="card-body">
      <form action = "/site_survey_viewall_save/{{ $site_survey->id }}" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <div class="form-group row">

           <div class="col-sm-4" style="display: none;">
               <label>Company Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="id" value="{{ $site_survey->id }}">
          
            </div>

            <div class="col-sm-4">
               <label>Company Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_company" value="{{ $site_survey->cu_company }}">
          
            </div>
            <div class="col-sm-4">
               <label>Customer Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_name" value="{{ $site_survey->cu_name }}">
          
            </div>

            <div class="col-sm-4">
               <label>Contact No<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_contact_no" value="{{ $site_survey->cu_contact_no }}">
              
            </div>

            <div class="col-sm-4">
               <label>Designation<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_designation" value="{{ $site_survey->cu_designation }}">
              
            </div>

            <div class="col-sm-4">
               <label>Address<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_address" value="{{ $site_survey->cu_address }}">
              
            </div>

            <div class="col-sm-4">
               <label>Lat<span style="color:red;">*</span></label>
               <input type="number" class="form-control" name="lat" value="{{ $site_survey->lat }}">
              
            </div>


            <div class="col-sm-4">
               <label>Lon<span style="color:red;">*</span></label>
               <input type="number" class="form-control" name="lon" value="{{ $site_survey->lon }}">
              
            </div>

            <div class="col-sm-4">
              <label>Service<span style="color:red;">*</span></label>
              <select name="service" class="form-control" value="{{ $site_survey->service }}">
                <option value="">----Select service----</option>
                <option value="1">Internet</option>
                <option value="2">Data</option>
              </select> 
            </div>

            <div class="col-sm-4">
               <label>Quantity<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="quantity" value="{{ $site_survey->quantity }}">
              
            </div>

            <div class="col-sm-4">

             <label>Connection media<span style="color:red;">*</span></label>
              <select name="connection_media" class="form-control" value="{{ $site_survey->connection_media }}">
                <option value="">----Select Connection media----</option>
                <option value="1">Optical fiber</option>
                <option value="2">Radio</option>
              </select>
              
            </div>

            <div class="col-sm-4">
               <label>No link<span style="color:red;">*</span></label>
               <input type="number" class="form-control" name="no_link"  value="{{ $site_survey->no_link }}">
              
            </div>

            <div class="col-sm-4">
               <label>Nearest pop name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="nearest_pop_name" value="{{ $site_survey->nearest_pop_name }}">
              
            </div>

            <div class="col-sm-4">
               <label>Pop location<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="pop_location" value="{{ $site_survey->pop_location }}">
              
            </div>

            <div class="col-sm-4">
               <label>Distance from pop<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="distance_from_pop" value="{{ $site_survey->distance_from_pop }}">
              
            </div>

            <div class="col-sm-4">
               <label>Required equipment<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="required_equipment" value="{{ $site_survey->required_equipment }}">
              
            </div>

            <div class="col-sm-4">
               <label>Nttn<span style="color:red;">*</span></label>
               <input type="number" class="form-control" name="nttn" value="{{ $site_survey->nttn }}">
              
            </div>

            <div class="col-sm-4">
               <label>Radio survey note<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="radio_survey_note" value="{{ $site_survey->radio_survey_note }}">
              
            </div>

            <div class="col-sm-4">
               <label>KAM<span style="color:red;">*</span></label>
               <select name="kam_id" class="form-control" value="{{ $site_survey->kam_id }}">
                  @foreach ($kam_list as $klist)
                     <option value="{{ $klist->id }}">{{ ucwords($klist->name) }}</option>
                  @endforeach
               </select>
            </div>
         </div>

         <button type="submit" class="btn btn-primary">Update</button>
      </form>
   </div>
   <!-- /.card-body -->
   <!-- /.card-footer-->
   <script>
      $('.hh'.datepicker({
         numberOfMonths: 2,
         maxDate: 0,
         dateFormat: 'mm-yy'
      }).attr('readonly', 'readonly'));
   </script>


</div>
@endsection