@extends('layouts.admin')

@section('content')


<div class="card">
   <div class="card-header">
      <h3 class="card-title">Edit Customer</h3>
   </div>
   <div class="card-body">
      <form action = "/edit_dummycustomer_update/{{ $edit_dummy_customer_list->cu_id }}" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <div class="form-group row">
            <div class="col-sm-4" style="display: none;">
               <label>Customer ID<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_id" value="{{ $edit_dummy_customer_list->cu_id }}">
            </div>
            <div class="col-sm-4">
               <label>Customer Name/ Company Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_company" value="{{ $edit_dummy_customer_list->cu_company }}">
            </div>
            <div class="col-sm-4" style="display: none;">
                <label>Customer Type<span style="color:red;">*</span></label> 
               <input type="text" class="form-control" name="ty_id" value="{{ $edit_dummy_customer_list->ty_id }}">
                                                            
            </div>
            <div class="col-sm-4" style="display: none;">
               <label>Station<span style="color:red;">*</span></label>  
                <input type="text" class="form-control" name="station" value="{{ $edit_dummy_customer_list->station }}">
            </div>
            <div class="col-sm-4">
               <label>Contact person<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_name" value="{{ $edit_dummy_customer_list->cu_name }}">
            </div>
            <div class="col-sm-4">
               <label>Contact No<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_contactno" value="{{ $edit_dummy_customer_list->cu_contactno }}">
            </div>
            <div class="col-sm-4">
               <label>Customer Email<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_email" value="{{ $edit_dummy_customer_list->cu_email }}">
            </div>
            <div class="col-sm-4">
               <label>Company Short Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_short_name" value="{{ $edit_dummy_customer_list->cu_short_name }}">
            </div>
            <div class="col-sm-4">
               <label>Customer Address</label>
               <input type="text" class="form-control" name="cu_address" value="{{ $edit_dummy_customer_list->cu_address }}">
            </div>
            <div class="col-sm-4">
               <label>Ip Address</label>
               <input type="text" class="form-control" name="cu_ip"  value="{{ $edit_dummy_customer_list->cu_ip }}"> 
            </div>
            <div class="col-sm-4" style="display: none;">
               <label>Area<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="area" value="{{ $edit_dummy_customer_list->area }}">
            </div>
            <div class="col-sm-4" style="display: none;">
               <label>KAM</label>
               <input type="text" class="form-control" name="kam_id" value="{{ $edit_dummy_customer_list->kam_id }}">
            </div>
            <div class="col-sm-4">
                <label>Connection Date<span style="color:red;">*</span></label>
               <input type="date" class="form-control input-medium date_Picker" name="connect_dt" value="{{ $edit_dummy_customer_list->connect_dt }}">
            </div>
            <div class="col-sm-4">
               <label>Bandwidth</label>
               <input type="text" class="form-control" name="cu_bandwith" value="{{ $edit_dummy_customer_list->cu_bandwith }}">
            </div>
            <div class="col-sm-2">
               <label>Youtube</label>
               <input type="text" class="form-control" name="cu_youtube" value="{{ $edit_dummy_customer_list->cu_youtube }}"/>
            </div>
            <div class="col-sm-2">
               <label>Facebook</label>
               <input type="text" class="form-control" name="cu_facebook" value="{{ $edit_dummy_customer_list->cu_youtube_price }}">
            </div>
            <div class="col-sm-2">
               <label>Data</label>
               <input type="text" class="form-control" name="cu_data" value="{{ $edit_dummy_customer_list->cu_data }}">
            </div>
            <div class="col-sm-2">
               <label>Bdix</label>
               <input type="text" class="form-control" name="cu_bdix" value="{{ $edit_dummy_customer_list->cu_bdix }}">
            </div>
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>
   <!-- /.card-body -->
   <!-- /.card-footer-->


</div>
@endsection