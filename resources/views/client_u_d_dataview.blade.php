@extends('layouts.admin')

@section('content')

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="row">    
                            <div class="col-md-12">
                                <h4 class="modal-title" id="exampleModalLabel"><strong>{{ $client_u_d_dataview->cu_company }} Information</strong></h4>
                            </div>    
                        </div>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">    
                                <div class="col-sm-4">
                                    <label>Customer Name/ Company Name</label>
                                    <input type="text" class="form-control" name="cu_company" value="{{ $client_u_d_dataview->cu_company }}" readonly="">
                                </div>                                          
                                <div class="col-sm-4">
                                    <label>Customer Type</label>                                               
                                    <input type="text" class="form-control" name="ty_name" value="{{ $client_u_d_dataview->ty_name }}" readonly="">
                                </div>                                          
                                <div class="col-sm-4">
                                    <label>Station</label>                                               
                                    <input type="text" class="form-control" name="station" value="{{ $client_u_d_dataview->station }}" readonly="">
                                </div>
                              
                               
                                  <div class="col-sm-4">
                                <label>Contact person</label>
                                <input type="text" class="form-control" name="cu_name" id="teacher_name" value="{{ $client_u_d_dataview->cu_name }}" readonly="">
                                </div>
                                  <div class="col-sm-4">
                                    <label>Contact No</label>
                                    <input type="text" class="form-control" name="cu_contactno" id="father_name" value="{{ $client_u_d_dataview->cu_contactno }}" readonly="">
                                </div>
                                <div class="col-sm-4">
                                    <label>Customer Email</label>
                                    <input type="text" class="form-control" name="cu_email" id="mother_name" value="{{ $client_u_d_dataview->cu_email }}" readonly="">
                                </div>
                                <div class="col-sm-6">
                                    <label>Customer Address</label>
                                    <textarea name="cu_address" class="form-control" id="mother_name" rows="3" style="height:35px;" readonly="">{{ $client_u_d_dataview->cu_address }}</textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label>Ip Address</label>
                                    <input type="text" class="form-control" name="cu_ip" id="cu_ip" value="{{ $client_u_d_dataview->cu_ip }}" readonly="">
                                </div>
                                <div class="col-sm-4">
                                    <label>OTC</label>
                                    <input type="text" class="form-control" name="cu_otc" value="{{ $client_u_d_dataview->cu_otc }}" readonly="">
                                </div>
                                <div class="col-sm-4">
                                    <label>Installation Cost</label>
                                    <input type="text" class="form-control" name="cu_installationcost" value="{{ $client_u_d_dataview->cu_installationcost }}" readonly="">
                                </div>
                                <div class="col-sm-4">
                                    <label>Security Money</label>
                                    <input type="text" class="form-control" name="cu_securitymoney" value="{{ $client_u_d_dataview->cu_securitymoney }}" readonly="">
                                </div>
                                
                                <div class="col-sm-6">
                                    <label>Bandwidth</label>
                                    <input type="text" class="form-control" name="cu_bandwith" id="cu_bandwith" value="{{ $client_u_d_dataview->cu_bandwith }}" readonly="">
                                </div>
                                 <div class="col-sm-6">
                                    <label>Bandwidth Unit Price</label>
                                    <input type="text" class="form-control" name="cu_bandwith_price" id="cu_bandwith_price" value="{{ $client_u_d_dataview->cu_bandwith_price }}" readonly="">
                                </div>
                                <div class="col-sm-6">
                                    <label>Youtube</label>
                                    <input type="text" class="form-control" name="cu_youtube" id="cu_youtube" value="{{ $client_u_d_dataview->cu_youtube }}" readonly="">
                                </div>
                                <div class="col-sm-6">
                                    <label>Youtube Unit Price</label>
                                    <input type="text" class="form-control" name="cu_youtube_price" id="cu_youtube_price" value="{{ $client_u_d_dataview->cu_youtube_price }}" readonly="">
                                </div>
                                <div class="col-sm-6">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" name="cu_facebook" id="cu_facebook" value="{{ $client_u_d_dataview->cu_facebook }}" readonly="">
                                </div>
                                <div class="col-sm-6">
                                    <label>Facebook Unit Price</label>
                                    <input type="text" class="form-control" name="cu_facebook_price" id="cu_facebook_price" value="{{ $client_u_d_dataview->cu_facebook_price }}" readonly="">
                                </div>
                                <div class="col-sm-6">
                                    <label>Data</label>
                                    <input type="text" class="form-control" name="cu_data" id="cu_data" value="{{ $client_u_d_dataview->cu_data }}" readonly="">
                                </div>
                                <div class="col-sm-6">
                                    <label>Data Unit Price</label>
                                    <input type="text" class="form-control" name="cu_data_price" id="cu_data_price" value="{{ $client_u_d_dataview->cu_data_price }}" readonly="">
                                </div>
                                <div class="col-sm-6">
                                    <label>Bdix</label>
                                    <input type="text" class="form-control" name="cu_bdix" id="cu_bdix" value="{{ $client_u_d_dataview->cu_bdix }}" readonly="">
                                </div>
                                <div class="col-sm-6">
                                    <label>Bdix Unit Price</label>
                                    <input type="text" class="form-control" name="cu_bdix_price" id="cu_bdix_price" value="{{ $client_u_d_dataview->cu_bdix_price }}" readonly="">
                                </div>
                                <div class="col-sm-6">
                                    <label>Vat (%)</label>
                                    <input type="text" class="form-control" name="vat" id="vat" value="{{ $client_u_d_dataview->vat }}" readonly="">
                                </div>                          
                                <div class="col-sm-6">
                                    <label>Connection Date</label>
                                    <input type="text" class="form-control" name="connect_dt" value="{{ $client_u_d_dataview->connect_dt }}" readonly="">
                                </div>                                
                            </div>
                        </form>
                    </div>
                  
                </div>

                    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4"><img src="" alt=""></div>
            </div>
        </div>
      </div>
@endsection