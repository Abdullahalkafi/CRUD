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
      <form action = "/site_survey_edit_report_save/{{ $site_survey->id }}" method = "post">
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
               <label>No link<span style="color:red;">*</span></label>
               <input type="number" class="form-control" name="no_link"  value="{{ $site_survey->no_link }}">
              
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