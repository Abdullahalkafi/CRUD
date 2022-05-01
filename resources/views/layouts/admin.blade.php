<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <title>Isp CRM</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <style>
        .bg-light {
            background-color: #eae9e9 !important;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- /.navbar -->
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fa fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fa fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <aside class="main-sidebar">
      <!-- Brand Logo -->
      @if(Auth::user()->user_type == 1)@php $role='Super Admin'; @endphp @elseif(Auth::user()->user_type == 2) @php $role='Admin'; @endphp @elseif(Auth::user()->user_type == 3) @php $role='Manager'; @endphp @elseif(Auth::user()->user_type == 4) @php $role='User'; @endphp @endif
      <a href="{{url('/')}}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $role }}</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column menu_active_class" data-widget="treeview" role="menu" data-accordion="false">

            <li class="site_survey nav-item {{ Request::is('ip_list') || Request::is('site_survey_create') || Request::is('site_survey_list')  ? 'menu-open' : '' }}">
              <a href="#" class="nav-link">
               <i class="fa fa-map-signs" aria-hidden="true"></i>
                <p>
                  Site Survey
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="ip_list nav-item">
                  <a href="/ip_list" class="nav-link {{ Request::is('ip_list')  ? 'active' : '' }}">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    <p>Ip List</p>
                  </a>
                </li>
                <li class="site_survey_create nav-item">
                  <a href="/site_survey_create" class="nav-link {{ Request::is('site_survey_create') ? 'active' : '' }}">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <p>Site Survey Create</p>
                  </a>
                </li>

                <li class="site_survey_form_list nav-item">
                  <a href="/site_survey_form_list" class="nav-link {{ Request::is('site_survey_form_list') ? 'active' : '' }}">
                    <i class="fa fa-globe" aria-hidden="true"></i>
                    <p>Site Survey form List</p>
                  </a>
                </li>


                <li class="site_survey_report_list nav-item">
                  <a href="/site_survey_list" class="nav-link {{ Request::is('site_survey_list') ? 'active' : '' }}">
                    <i class="fa fa-globe" aria-hidden="true"></i>
                    <p>Site Survey report List</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="customer nav-item {{ Request::is('client_list') || Request::is('client_add') || Request::is('dummy_clients_list') || Request::is('pending_dummy_clients_list') || Request::is('active_clients')  ? 'menu-open' : '' }}">
              <a href="#" class="nav-link">
                <i class="fa fa-users" aria-hidden="true"></i>
                <p>
                  Customer
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="client_add nav-item">
                  <a href="/client_add" class="nav-link {{ Request::is('client_add')  ? 'active' : '' }}">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <p>Customer Create</p>
                  </a>
                </li>
                <li class="customer_list nav-item">
                  <a href="/dummy_clients_list" class="nav-link {{ Request::is('dummy_clients_list') ? 'active' : '' }}">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <p>Customer List</p>
                  </a>
                </li>

                <li class="work_order nav-item">
                  <a href="/work_order" class="nav-link {{ Request::is('work_order') ? 'active' : '' }}">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <p>Work Order</p>
                  </a>
                </li>


                <li class="pending_customer_list nav-item">
                  <a href="/pending_dummy_clients_list" class="nav-link {{ Request::is('pending_dummy_clients_list') ? 'active' : '' }}">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <p>Pending Customer List</p>
                  </a>
                </li>
           
                <li class="active_customer_list nav-item">
                  <a href="/active_clients" class="nav-link {{ Request::is('active_clients') ? 'active' : '' }}">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <p>Active Customer List</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item bandwidthmonitoring {{ Request::is('client_data_connection') || Request::is('client_upgrade_data_list') || Request::is('client_downgrade_data_list') || Request::is('pages/validation')  ? 'menu-open' : '' }}">
              <a href="#" class="nav-link">
                <i class="fas fa-tachometer-alt" aria-hidden="true"></i>
                <p>
                  Bandwidth Monitor
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="monitoring nav-item">
                  <a href="/client_data_connection" class="nav-link {{ Request::is('client_data_connection')  ? 'active' : '' }}">
                    <i class="fab fa-watchman-monitoring"></i>
                    <p>Monitoring</p>
                  </a>
                </li>
                <li class="upgrade nav-item">
                  <a href="/client_upgrade_data_list" class="nav-link {{ Request::is('client_upgrade_data_list')  ? 'active' : '' }}">
                    <i class="fas fa-arrow-up"></i>
                    <p>Upgrade</p>
                  </a>
                </li>
                <li class="downgrade nav-item">
                  <a href="/client_downgrade_data_list" class="nav-link {{ Request::is('client_downgrade_data_list')  ? 'active' : '' }}">
                    <i class="fas fa-arrow-down" aria-hidden="true"></i>
                    <p>Downgrade</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item user {{ Request::is('user') || Request::is('user_add') || Request::is('pages/editors') || Request::is('pages/validation')  ? 'menu-open' : '' }}">
              <a href="#" class="nav-link">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                <p>
                  User
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="add_user nav-item">
                  <a href="/user_add" class="nav-link {{ Request::is('user_add')  ? 'active' : '' }}">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <p>User Add</p>
                  </a>
                </li>
                <li class="user_list nav-item">
                  <a href="/user_list" class="nav-link {{ Request::is('user_list') ? 'active' : '' }}">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <p>User List</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item report {{ Request::is('report_view') || Request::is('client_data_list_d') || Request::is('pages/validation')  ? 'menu-open' : '' }}">
              <a href="#" class="nav-link">
                <i class="fa fa-users" aria-hidden="true"></i>
                <p> Report <i class="fa fa-angle-left right"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/report_view" class="nav-link {{ Request::is('report_view')  ? 'active' : '' }}">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <p>Increase & Decrease Report</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
        <a class="nav-link dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
          <p> {{ __('Logout') }} </p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>       
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <section class="content">
        @yield('content')
      </section>
    </div>

    <footer class="main-footer">
      <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo url('/');?>">WCL-ISPCRM</a>.</strong> All rights reserved.
    </footer>
  </div>
  <?php 

    $admin=array('');

    $account=array('site_survey', 'work_order', 'ip_list', 'site_survey_form_list', 'client_add', 'site_survey_report_list');

    $support=array('site_survey_create', 'client_add', 'site_survey_report_list', 'customer_list', 'pending_customer_list','upgrade', 'downgrade', 'user');

    $marketing=array('ip_list', 'client_add', 'site_survey_form_list', 'customer_list', 'bandwidthmonitoring', 'work_order', 'pending_customer_list', 'monitoring', 'upgrade', 'downgrade', 'user');

    $user_type = Auth::user()->user_type;

    $user_array=explode(',',$user_type);


 if($user_type!=2 && $user_type!=3 && $user_type!=4){

      $not_allowed=array_diff($admin,$user_array);

     }elseif($user_type!=1 && $user_type!=3 && $user_type!=4){


     $not_allowed=array_diff($account,$user_array);

   }elseif($user_type!=1 && $user_type!=2 && $user_type!=4){


     $not_allowed=array_diff($support,$user_array);
   }

     else{

     $not_allowed=array_diff($marketing,$user_array);

   }


?>
<script>
function my_code(){ 
  var not_allowed=<?php print_r(json_encode($not_allowed)); ?>;
  if(not_allowed){
    for(i=0; i<58; i++ )
    {
      if(not_allowed[i])
      {
        if($('li').hasClass(not_allowed[i]))
        {
          $('.'+not_allowed[i]).hide();
        }
      }
    }
  }
  
  $('.menu_active_class').show();
}

window.onload=my_code();

</script>

<script>


    $(document).ready(function() {
      var table = $('#example').DataTable( {
          "scrollY": "600px",
          "paging": false
      } );
   
      $('a.toggle-vis').on( 'click', function (e) {
          e.preventDefault();
   
          // Get the column API object
          var column = table.column( $(this).attr('data-column') );
   
          // Toggle the visibility
          column.visible( ! column.visible() );
      } );
  } );

    jQuery(document).ready(function(){
      var date_input=$('input[name="start_dt"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    });

    jQuery(document).ready(function() {
    jQuery('#example').DataTable( {
        "pagingType": "full_numbers"
        } );
     } );
</script>

  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

  <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>