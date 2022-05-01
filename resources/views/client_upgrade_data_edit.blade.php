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
      <h3 class="card-title">Client Upgrade Data</h3>
   </div>
   <div class="card-body">
        <form action = "/client_data_update/{{ $client_upgrade_data_edit->cu_id }}" method = "post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Client Name/ Company Name</label>
                            <input type="text" class="form-control" name="cu_company" value="{{ $client_upgrade_data_edit->cu_company }}" readonly>
                        </div>

                        <div class="col-sm-4">
                            <label>Contact person</label>
                            <input type="text" class="form-control" name="cu_name" value="{{ $client_upgrade_data_edit->cu_name }}" readonly>
                        </div>

                        <div class="col-sm-4">
                            <label>Contact No</label>
                            <input type="text" class="form-control" name="cu_contactno" value="{{ $client_upgrade_data_edit->cu_contactno }}" readonly>
                        </div>

                        <div class="col-sm-4">
                            <label>Customer Email</label>
                            <input type="text" class="form-control" name="cu_email" value="{{ $client_upgrade_data_edit->cu_email }}" readonly>
                        </div>

                        <div class="col-sm-4">
                            <label>Company Short Name</label>
                            <input type="text" class="form-control" name="cu_short_name" value="{{ $client_upgrade_data_edit->cu_short_name }}" readonly>
                        </div>

                        <div class="col-sm-4">
                            <label>Customer Address</label>
                            <textarea  name="cu_address" class="form-control" id="mother_name" rows="3" style="height:35px;" readonly>{{ $client_upgrade_data_edit->cu_address }}</textarea>
                        </div>

                        <div class="col-sm-6">
                            <label>Bandwidth</label>
                            <input type="text" class="form-control" name="cu_bandwith" value="{{ $client_upgrade_data_edit->cu_bandwith }}" readonly>
                        </div>

                        <div class="col-sm-6">
                            <label>New Bandwidth</label>
                            <input type="text" class="form-control" name="new_bandwidth" value="{{ $client_upgrade_data_edit->new_bandwidth }}">
                        </div>

                        <div class="col-sm-6">
                            <label>Youtube</label>
                            <input type="text" class="form-control" name="cu_youtube" value="{{ $client_upgrade_data_edit->cu_youtube }}" readonly/>
                        </div>

                        <div class="col-sm-6">
                            <label>New Youtube</label>
                            <input type="text" class="form-control" name="new_youtube" value="{{ $client_upgrade_data_edit->new_youtube }}">
                        </div>

                        <div class="col-sm-6">
                            <label>Facebook</label>
                            <input type="text" class="form-control" name="cu_facebook" value="{{ $client_upgrade_data_edit->cu_facebook }}" readonly>
                        </div>

                        <div class="col-sm-6">
                            <label>New Facebook</label>
                            <input type="text" class="form-control" name="new_facebook" value="{{ $client_upgrade_data_edit->new_facebook }}">
                        </div>

                        <div class="col-sm-6">
                            <label>Data</label>
                            <input type="text" class="form-control" name="cu_data" value="{{ $client_upgrade_data_edit->cu_data }}" readonly>
                        </div>

                        <div class="col-sm-6">
                            <label>New Data</label>
                            <input type="text" class="form-control" name="new_data" value="{{ $client_upgrade_data_edit->new_data }}">
                        </div>

                        <div class="col-sm-6">
                            <label>Bdix</label>
                            <input type="text" class="form-control" name="cu_bdix" value="{{ $client_upgrade_data_edit->cu_bdix }}" readonly>
                        </div>

                        <div class="col-sm-6">
                            <label>New Bdix</label>
                            <input type="text" class="form-control" name="new_bdix" value="{{ $client_upgrade_data_edit->new_bdix }}">
                        </div>

                        <div class="col-sm-6">
                            <label>Effective Date<span style="color:red;">*</span></label>
                            <input type="date" class="form-control" name="effective_dt" id="txtfromdate" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
   </div>
   <!-- /.card-body -->
   <!-- /.card-footer-->
    <script>
        $('#txtfromdate'.datepicker({
            maxDate: 0,
            dateFormat: 'yy'
        }).attr('readonly', 'readonly'));
    </script>


</div>
@endsection