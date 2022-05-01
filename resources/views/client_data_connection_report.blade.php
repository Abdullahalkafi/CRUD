<div class="table-responsive bg-info">
    <div class="card-header text-center"><h3 class="card-title">Increase & Decrease Report of {{date('d-m-Y',strtotime($startdate))}} to {{date('d-m-Y',strtotime($enddate))}}</h3></div>
</div>
@if(count($client_data_connection_report['up'])>0)
    <div class="table-responsive">
        <div class="card-header"><h3 class="card-title text-capitalize">Upgrade List</h3></div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Date</th>
                <th>Name</th>
                <th>Bandwidth</th>
                <th>Facebook</th>
                <th>Youtube</th>
                <th>Data</th>
                <th>Bdix</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($client_data_connection_report['up'] as $client)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d-m-Y',strtotime($client->effective_dt)) }}</td>
                    <td>{{ $client->cu_company }}</td>
                    <td>{{ $client->ttl_up_internet }}</td>
                    <td>{{ $client->ttl_up_youtube }}</td>
                    <td>{{ $client->ttl_up_facebook }}</td>
                    <td>{{ $client->ttl_up_data }}</td>
                    <td>{{ $client->ttl_up_bdix }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif

@if(count($client_data_connection_report['down'])>0)
    <div class="table-responsive">
        <div class="card-header"><h3 class="card-title text-capitalize">Downgrade List</h3></div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Date</th>
                <th>Name</th>
                <th>Bandwidth</th>
                <th>Facebook</th>
                <th>Youtube</th>
                <th>Data</th>
                <th>Bdix</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($client_data_connection_report['down'] as $client)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d-m-Y',strtotime($client->effective_dt)) }}</td>
                    <td>{{ $client->cu_company }}</td>
                    <td>{{ $client->ttl_up_internet }}</td>
                    <td>{{ $client->ttl_up_youtube }}</td>
                    <td>{{ $client->ttl_up_facebook }}</td>
                    <td>{{ $client->ttl_up_data }}</td>
                    <td>{{ $client->ttl_up_bdix }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif