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
      <form action = "/site_survey_save" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <div class="form-group row">
            <div class="col-sm-4">
               <label>Company Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_company" required>
          
            </div>
            <div class="col-sm-4">
               <label>Customer Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_name" required>
          
            </div>

            <div class="col-sm-4">
               <label>Contact No<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_contact_no" required>
              
            </div>

            <div class="col-sm-4">
               <label>Designation<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_designation" required>
              
            </div>

            <div class="col-sm-4">
               <label>Address<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_address" required>
              
            </div>

            <div class="col-sm-4">
               <label>Lat<span style="color:red;">*</span></label>
               <input type="number" class="form-control" name="lat" required>
              
            </div>


            <div class="col-sm-4">
               <label>Lon<span style="color:red;">*</span></label>
               <input type="number" class="form-control" name="lon" required>
              
            </div>

            <div class="col-sm-4">
              <label>Service<span style="color:red;">*</span></label>
              <select name="service" class="form-control" required>
                <option value="">----Select service----</option>
                <option value="1">Internet</option>
                <option value="2">Data</option>
              </select> 
            </div>

            <div class="col-sm-4">
               <label>Quantity<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="quantity" required>
              
            </div>

            <div class="col-sm-4">

             <label>No link<span style="color:red;">*</span></label>
              <select name="no_link" class="form-control" required>
                <option value="">----Select service----</option>
                <option value="1">Single</option>
                <option value="2">Dual</option>
              </select>
              
            </div>

            <div class="col-sm-4" style="display: none;">
               <label>Nearest pop name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="nearest_pop_name">
              
            </div>

            <div class="col-sm-4" style="display: none;">
               <label>Pop location<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="pop_location">
              
            </div>

            <div class="col-sm-4" style="display: none;">
               <label>Distance from pop<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="distance_from_pop">
              
            </div>

            <div class="col-sm-4" style="display: none;">
               <label>Required equipment<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="required_equipment">
              
            </div>

            <div class="col-sm-4" style="display: none;">
               <label>Nttn<span style="color:red;">*</span></label>
               <input type="number" class="form-control" name="nttn">
              
            </div>

            <div class="col-sm-4" style="display: none;">
               <label>Radio survey note<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="radio_survey_note">
              
            </div>

            <div class="col-sm-4" style="display: none;">
               <label>KAM<span style="color:red;">*</span></label>
               <select name="kam_id" class="form-control">
                  @foreach ($kam_list as $klist)
                     <option value="{{ $klist->id }}">{{ ucwords($klist->name) }}</option>
                  @endforeach
               </select>
            </div>
         </div>

         <button type="submit" class="btn btn-primary">Submit</button>
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