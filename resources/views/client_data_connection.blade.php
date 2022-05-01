@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 style="text-align: center; font-size: 20px;"> Client's <b><i class="fas fa-tachometer-alt" aria-hidden="true"></i>Monitoring<i class="fas fa-tachometer-alt" aria-hidden="true"></i></b></h3>
        </div>
        <div class="card-body">
                <table id="example" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th width="5%">Sl</th>
                            <th width="10%">Company</th>
                            <th width="10%">Location</th>
                            <!--th width="10%">KAM</th-->
                            <th width="10%">Bandwidth</th>
                            <th width="8%">Youtube</th>
                            <th width="7%">Facebook</th>
                            <th width="7%">Data</th>
                            <th width="8%">Bdix</th>
                            <th width="5%"><i class="fas fa-tachometer-alt" aria-hidden="true"></i></th>
                            <th width="5%">Connection</th>
                            <th width="5%">Up/Down</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($client_monitoring as $client)
                        <tr>
                            <td width="5%">{{ $loop->iteration }}</td>
                            <td width="10%">{{ $client->cu_company }}</td>
                            <td width="10%">{{ $client->area }}</td>
                            <td width="10%">Now=<b>{{ $client->now_bandwith }}MB </b>
                                 @if($client->flag=='1')
                                <br>Up=<b>{{ $client->ud_bandwith }}MB</b>
                                @else
                                <br>Down=<b>{{ $client->ud_bandwith }}MB</b>
                                @endif

                            </td>
                            <td width="8%">Now=<b>{{ $client->now_youtube }}MB </b>

                                 @if($client->flag=='1')
                                <br>Up=<b>{{ $client->ud_youtube }}MB</b>
                                @else
                                <br>Down=<b>{{ $client->ud_youtube }}MB</b>
                                @endif

                            </td>
                            <td width="7%">Now=<b>{{ $client->now_facebook }}MB </b>

                                @if($client->flag=='1')
                                <br>Up=<b>{{ $client->ud_facebook }}MB</b>
                                @else
                                <br>Down=<b>{{ $client->ud_facebook }}MB</b>
                                @endif

                            </td>
                            <td width="7%">Now=<b>{{ $client->now_data }}MB </b>


                                @if($client->flag=='1')
                                <br>Up=<b>{{ $client->ud_data }}MB</b>
                                @else
                                <br>Down=<b>{{ $client->ud_data }}MB</b>
                                @endif

                               </td>
                            <td width="8%">Now=<b>{{ $client->now_bdix }}MB </b>


                                @if($client->flag=='1')
                                <br>Up=<b>{{ $client->ud_bdix }}MB</b>
                                @else
                                <br>Down=<b>{{ $client->ud_bdix }}MB</b>
                                @endif

                                </td>
                            <td width="5%">
                                @if($client->flag=='1')
                                 <button type="button" class="btn btn-success"><i class="fas fa-sort-amount-up-alt"></i></button>
                                @elseif($client->flag=='2')
                                <button type="button" class="btn btn-warning"><i class="fas fa-sort-amount-down"></i></button>
                                @endif
                                
                                
                            </td>
                            <td width="5%">{{ date('d-m-Y',strtotime($client->connect_dt)) }}</td>
                            @if($client->uddate)
                            <td width="5%">{{ date('d-m-Y',strtotime($client->uddate)) }}</td>
                            @endif
                            
                  
                        </tr>
                        @endforeach
                    </tbody>
                </table>




        </div>
    </div>

@endsection