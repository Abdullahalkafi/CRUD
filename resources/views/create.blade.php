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
      <h3 class="card-title">Client Add</h3>
   </div>
   <div class="card-body">
      <form action = "/client_save" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <div class="form-group row">
            <div class="col-sm-4">
               <label>Customer Name/ Company Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_company" required>
               @if($errors->has('cu_company'))
                    <div class="error" style="color:red">{{ $errors->first('cu_company') }}</div>
               @endif
            </div>
            <div class="col-sm-4">
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
            <div class="col-sm-4">
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
         </div>
         <div class="form-group row">
            <div class="col-sm-4">
               <label>Contact person<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_name" required>
               @if($errors->has('cu_name'))
                    <div class="error" style="color:red">{{ $errors->first('cu_name') }}</div>
               @endif
            </div>

            <div class="col-sm-4">
               <label>Contact No<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_contactno" required>
               @if($errors->has('cu_contactno'))
                    <div class="error" style="color:red">{{ $errors->first('cu_contactno') }}</div>
               @endif
            </div>
            <div class="col-sm-4">
               <label>Customer Email<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_email" required>
                @if($errors->has('cu_email'))
                    <div class="error" style="color:red">{{ $errors->first('cu_email') }}</div>
               @endif
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-4">
               <label>Company Short Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_short_name" required>
               @if($errors->has('cu_short_name'))
                    <div class="error" style="color:red">{{ $errors->first('cu_short_name') }}</div>
               @endif
            </div>
            <div class="col-sm-4">
               <label>Customer Address<span style="color:red;">*</span></label>
               <textarea  name="cu_address" class="form-control" id="mother_name" rows="3" style="height:35px;" required></textarea>
               @if($errors->has('cu_address'))
                    <div class="error" style="color:red">{{ $errors->first('cu_address') }}</div>
               @endif
            </div>
            <div class="col-sm-4">
               <label>Ip Address</label>
               <input type="text" class="form-control" name="cu_ip">
                @if($errors->has('cu_ip'))
                    <div class="error" style="color:red">{{ $errors->first('cu_ip') }}</div>
               @endif
            </div>
         </div>

         <div class="form-group row">
            <div class="col-sm-4">
               <label>Area<span style="color:red;">*</span></label>
               <select name="area_id" class="form-control" required>
                  <option value="">----Select Area----</option>
                  @foreach ($area_list as $alist)
                     <option value="{{ $alist->id }}">{{ ucwords($alist->name) }}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-sm-4">
               <label>KAM<span style="color:red;">*</span></label>
               <select name="kam_id" class="form-control" required>
                  @foreach ($kam_list as $klist)
                     <option value="{{ $klist->id }}">{{ ucwords($klist->name) }}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-sm-4">
               <label>Connection Date<span style="color:red;">*</span></label>
               <input type="date" class="form-control input-medium hh" id="txtfromdatefd" name="connect_dt" required>
               @if($errors->has('connect_dt'))
                  <div class="error" style="color:red">{{ $errors->first('connect_dt') }}</div>
               @endif
            </div>
         </div>

         <div class="form-group row">
            <div class="col-sm-4">
               <label>Bandwidth<span style="color:red;">*</span></label>
               <input type="text" class="form-control" name="cu_bandwith" required>
               @if($errors->has('cu_bandwith'))
                    <div class="error" style="color:red">{{ $errors->first('cu_bandwith') }}</div>
               @endif
            </div>
            <div class="col-sm-2">
               <label>Youtube</label>
               <input type="text" class="form-control" value="0.00" name="cu_youtube"/>
            </div>
            <div class="col-sm-2">
               <label>Facebook</label>
               <input type="text" class="form-control" value="0.00" name="cu_facebook">
            </div>
            <div class="col-sm-2">
               <label>Data</label>
               <input type="text" class="form-control" value="0.00" name="cu_data">
            </div>
            <div class="col-sm-2">
               <label>Bdix</label>
               <input type="text" class="form-control" value="0.00" name="cu_bdix">
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