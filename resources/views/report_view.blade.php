
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@extends('layouts.admin')

@section('content')

   <!-- Default box -->
   <div class="card">
      <div class="card-header">
         <h3 class="card-title">Date wise Increase & Decrease Report</h3>
      </div>
      <div class="card-body">
         <form>
            <div class="form-group">
               <div class="row">
                   <div class="col-sm-4">
                      <label for="startdate" class="h6">Start Date</label>
                       <input class="form-control col-sm-12" id="startdate" name="startdate" type="date"/>
                   </div>
                   <div class="col-sm-4">
                      <label for="enddate" class="h6">End Date</label>
                      <input type="date" name="enddate" id="enddate" class="form-control col-sm-12">
                   </div>
                   <div class="col-sm-4">
                      <label>Type</label>
                      <select class="form-control col-sm-12" id="type" name="flagable_status">
                          <option value="">All</option>
                          <option value="1">Upgrade</option>
                          <option value="2">Downgrade</option>
                      </select>
                   </div>
               </div>
            </div>

            <button type="button" onclick="dataincraseanddeceasereport()" class="btn btn-info btn-block text-white">Submit <i class="fa fa-check-circle" aria-hidden="true"></i></button>
         </form>
      </div>

      <div class="widget-content padding">
           <div id="display">
                                    <!---JSON Content will be displayed here-->
           </div>
       </div>
      <!-- /.card-body -->
      <!-- /.card-footer-->
    </div>

@endsection

<script>


  function dataincraseanddeceasereport()
     {
      
      var startdate=$("#startdate").val();
      var enddate=$("#enddate").val();
      var type=$("#type").val();
      var _token   = $('meta[name="csrf-token"]').attr('content');
          
        $.ajax({ 
                    url: "{{ url('/report_increase_decrease') }}",
                    method:'POST',
                    data:{

                        startdate:startdate,
                        enddate:enddate,
                        type:type,
                        _token: _token  
                        
                    },

                   dataType: "html",   //expect html to be returned                
                success: function(response){                    
                    $("#display").html(response); 
                    //alert(response);
                }

        });
        return false; // keeps the page from not refreshing     
       }




</script>

