<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function report_view(){
        return view('report_view');
    }



   public function client_details($cu_id)
    {
        $client=DB::table('tbl_customer_registration as c')
            ->select('c.cu_id','c.cu_name','c.cu_company','c.cu_contactno','c.cu_email','c.cu_bandwith','c.cu_bandwith_price','c.cu_youtube','c.cu_youtube_price','c.cu_facebook','c.cu_facebook_price','c.customer_image','c.connect_dt','c.connect_dt','c.connect_dt','c_type.ty_name')//,'cbc.*'
            ->leftJoin('tbl_customer_type as c_type','c_type.ty_id','=','c.ty_id')
            ->where('c.cu_id', "=",$cu_id)
            ->first();
        return response()->json($client);
    }

    public function searchClientInfo(Request $request)
    {
        $company_name=$request->cu_company;
        $index_no=$request->index_no;

        if(!empty($company_name)){
            $clients=DB::table('tbl_customer_registration as c')
                ->select('c.cu_id','c.cu_name','c.cu_company','c.cu_contactno','c.cu_email','c.cu_bandwith','c.cu_bandwith_price','c.cu_youtube','c.cu_youtube_price','c.cu_facebook','c.cu_facebook_price','c.customer_image','c.connect_dt','c.connect_dt','c.connect_dt','c_type.ty_name')//,'cbc.*'
                ->leftJoin('tbl_customer_type as c_type','c_type.ty_id','=','c.ty_id')
                ->where('c.cu_company', "like", "%" . $company_name . "%")
                ->orWhere('c.cu_name', "like", "%" . $company_name . "%")
                ->orWhere('c.cu_short_name', "like", "%" . $company_name . "%")
                //->orWhere('c.index_no', "=",$customer_id)
                //->orWhere('c.ty_id', "=",$customer_type)
                //->orWhere('c.station', "=",$station)
                //->orWhere('c.cu_contactno', "like", "%" . $contact_no . "%")
                //->whereMonth('c.connect_dt', "=",date('F, Y', strtotime($connection_date)))
                //->orWhere('c.cu_short_name', "like", "%" . $short_name . "%")
                ->paginate(3);
        }elseif(!empty($index_no)){
            $clients=DB::table('tbl_customer_registration as c')
                ->select('c.cu_name','c.cu_company','c.cu_contactno','c.cu_email','c.cu_bandwith','c.cu_bandwith_price','c.cu_youtube','c.cu_youtube_price','c.cu_facebook','c.cu_facebook_price','c.customer_image','c.connect_dt','c.connect_dt','c.connect_dt','c_type.ty_name')
                ->leftJoin('tbl_customer_type as c_type','c_type.ty_id','=','c.ty_id')
                ->where('c.index_no', "like", "%" .$index_no ."%");
        }else{
            $clients=NULL;
        }
        return response()->json($clients);
    }

    public function datewiseIncDec(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        $startdate  = date('Y-m-d',strtotime($request->startdate));
        $enddate    = date('Y-m-d',strtotime($request->enddate));
        $type       = $request->type;

        $grades['up']   = array();
        $grades['down'] = array();
        //dd($grades['down']); exit();
        if($type == ''){
            $grades['up']   = DB::table('tbl_customer_registration as c')
                ->selectRaw('c.cu_id, c.cu_company, ud.cu_bandwith as ttl_up_internet, ud.cu_youtube as ttl_up_youtube, ud.cu_facebook as ttl_up_facebook, ud.cu_data as ttl_up_data, ud.cu_bdix as ttl_up_bdix, ud.effective_dt as effective_dt')
                ->leftJoin('tbl_customer_updowngrade as ud','ud.cu_id','=','c.cu_id')
                ->where('ud.flag', '1')
                ->whereBetween('ud.effective_dt',[$startdate,$enddate])
                //->groupBy('ud.cu_id')
                ->orderBy('c.cu_company','asc')
                ->get();

            $grades['down'] = DB::table('tbl_customer_registration as c')
                ->selectRaw('c.cu_id, c.cu_company, ud.cu_bandwith as ttl_up_internet, ud.cu_youtube as ttl_up_youtube, ud.cu_facebook as ttl_up_facebook, ud.cu_data as ttl_up_data, ud.cu_bdix as ttl_up_bdix, ud.effective_dt as effective_dt')
                ->leftJoin('tbl_customer_updowngrade as ud','ud.cu_id','=','c.cu_id')
                ->where('ud.flag', '2')
                ->whereBetween('ud.effective_dt',[$startdate,$enddate])
                //->groupBy('ud.cu_id')
                ->orderBy('c.cu_company','asc')
                ->get();
            $clients = $grades;
        }else if($type == '1'){
            $grades['up']   = DB::table('tbl_customer_registration as c')
                ->selectRaw('c.cu_id, c.cu_company, ud.cu_bandwith as ttl_up_internet, ud.cu_youtube as ttl_up_youtube, ud.cu_facebook as ttl_up_facebook, ud.cu_data as ttl_up_data, ud.cu_bdix as ttl_up_bdix, ud.effective_dt as effective_dt')
                ->leftJoin('tbl_customer_updowngrade as ud','ud.cu_id','=','c.cu_id')
                ->where('ud.flag', '1')
                ->whereBetween('ud.effective_dt',[$startdate,$enddate])
                //->groupBy('ud.cu_id')
                ->orderBy('c.cu_company','asc')
                ->get();
            $clients = $grades;
        }else{
            $grades['down'] = DB::table('tbl_customer_registration as c')
                ->selectRaw('c.cu_id, c.cu_company, ud.cu_bandwith as ttl_up_internet, ud.cu_youtube as ttl_up_youtube, ud.cu_facebook as ttl_up_facebook, ud.cu_data as ttl_up_data, ud.cu_bdix as ttl_up_bdix, ud.effective_dt as effective_dt')
                ->leftJoin('tbl_customer_updowngrade as ud','ud.cu_id','=','c.cu_id')
                ->where('ud.flag', '2')
                ->whereBetween('ud.effective_dt',[$startdate,$enddate])
                //->groupBy('ud.cu_id')
                ->orderBy('c.cu_company','asc')
                ->get();
            $clients = $grades;
        }

      // dd($clients);exit();
       return view('client_data_connection_report',['client_data_connection_report'=>$clients,'startdate'=>$startdate,'enddate'=>$enddate]);
       // return response()->json($clients);
    }
}
