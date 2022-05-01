<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerDummy;
use App\CustomerUpdowngrade;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

class CustomerController extends Controller
{
    public function get_client_type()
    {
        $client_types=DB::table('tbl_customer_type')->get();
        return $client_types;
    }

    public function client_save(Request $request)
    {
        //dd('HI');
       
       $client=new Customer();//cu_otc,cu_installationcost,cu_securitymoney,
            $client->status = 0;
            $client->cu_name = $request->cu_company;
            $client->ty_id =$request->c_type;
            $client->cu_company = $request->cu_company;                
            $client->cu_contactno   = $request->cu_contactno;                
            $client->cu_email = $request->cu_email;
            $client->cc_address = $request->cc_address;
            $client->cu_short_name = $request->cu_short_name;
            $client->cu_address = $request->cu_address;
            $client->cu_ip = $request->ip_address;
            $client->vat = $request->vat;
            $client->cu_bandwith = $request->cu_bandwith;
            $client->cu_bandwith_price = $request->cu_bandwith_price;
            $client->cu_youtube = $request->cu_youtube;
            $client->cu_youtube_price = $request->cu_youtube_price;
            $client->cu_facebook = $request->cu_facebook;
            $client->cu_facebook_price = $request->cu_facebook_price;
            $client->cu_data = $request->cu_data;
            $client->cu_data_price = $request->cu_data_price;
            $client->cu_bdix = $request->cu_bdix;
            $client->cu_bdix_price = $request->cu_bdix_price;
            $client->customer_image = $request->cu_gr_total;
            $client->station = $request->station;
            $client->index_no = $request->index_no;
            $client->connect_dt = date("Y-m-d h:i:s", time()); //$request->connect_dt;
            if(!empty($request->send_mail_status)){
            $client->send_mail_status = $request->send_mail_status;
            }
            else{
                $client->send_mail_status = 1;

            }
            if(!empty($request->otc_status)){
                $client->otc_status = $request->otc_status;

            }
            else{
                $client->otc_status = 0;
            }
            $client->create_by  = 1;
            $client->create_dt  = date("Y-m-d h:i:s", time());
            $client->save();
        return response()->json('The Client successfully added');
    }

    public function get_client_upgrade_data_list()
    {
        $client_list=\App\Customer::orderby('cu_company','asc')->get();
       //dd($client_list);
       // return response()->json($client_list);
        return view('client_upgrade_data_list')->with('client_upgrade_data_list', $client_list);
        //return $client_list;
    }

    public function get_client_downgrade_data_list()
    {
        $client_list=\App\Customer::orderby('cu_company','asc')->get();
       //dd($client_list);
       // return response()->json($client_list);
        return view('client_downgrade_data_list')->with('client_downgrade_data_list', $client_list);
        //return $client_list;
    }

    public function active_customer_list_viewall(Request $request){

            $comapny  = Customer::find($request->cu_id);
                return response()->json([
                  'data' => $comapny
                ]);
       }

    public function active_customer_edit(Request $request){
        
        $client = Customer::find($request->cu_id);
        return response()->json([
                  'data' => $client
                ]);
    }

    public function active_customer_delete($id)
    {
        $client = Customer::where('cu_id',$id)->first();
        $client->delete();
        return redirect('/active_clients')->with('success', 'The active customer successfully deleted');
    }

    public function get_client_data_connection(Request $request){

        $client_monitoring = DB::table('tbl_customer_registration as cr')
            ->leftjoin('tbl_area as ta', 'cr.area','=','ta.id')
            ->leftjoin(DB::raw("(SELECT *, max(effective_dt) as uddate FROM `tbl_customer_updowngrade` group by cu_id) as cud"), 'cr.cu_id', '=', 'cud.cu_id')
            ->where('cr.status', '=', '1')
            ->selectRaw('cr.cu_company,ta.name as area,cr.cu_bandwith as now_bandwith,cr.cu_youtube as now_youtube,cr.cu_facebook as now_facebook,cr.cu_data as now_data,cr.cu_bdix as now_bdix,cud.cu_bandwith as ud_bandwith,cud.cu_youtube as ud_youtube,cud.cu_facebook as ud_facebook,cud.cu_data as ud_data,cud.cu_bdix as ud_bdix,cud.flag,cr.connect_dt,cud.uddate')
            ->orderby('cr.cu_company', 'asc')
            ->get();

       return view('client_data_connection',['client_monitoring'=>$client_monitoring]);

    }

    public function pendding_client_save(Request $request){

        //dd($request->all());exit();
        $id = $request->cu_id;

        //Data Insert into database
       $data =[
           'cu_name'=>$request->input('cu_name'),
           'area'=>$request->input('area_id'),
           'ty_id'=>$request->input('ty_id'),
           'cu_company'=>$request->input('cu_company'),
           'cu_contactno'=>$request->input('cu_contactno'),
           'cu_email'=>$request->input('cu_email'),
           'cu_short_name'=>$request->input('cu_short_name'),
           'cu_address'=>$request->input('cu_address'),
           'cu_ip'=>$request->input('cu_ip'),
           'vat'=>$request->input('vat'),
           'cu_bandwith'=>$request->input('cu_bandwith'),
           'cu_youtube'=>$request->input('cu_youtube'),
           'cu_facebook'=>$request->input('cu_facebook'),
           'cu_data'=>$request->input('cu_data'),
           'cu_bdix'=>$request->input('cu_bdix'),
           'cu_bandwith_price'=>$request->input('cu_bandwith_price'),
           'cu_youtube_price'=>$request->input('cu_youtube_price'),
           'cu_facebook_price'=>$request->input('cu_facebook_price'),
           'cu_data_price'=>$request->input('cu_data_price'),
           'cu_bdix_price'=>$request->input('cu_bdix_price'),
           'station'=>$request->input('station'),
           'index_no'=>$request->input('index_no'),
           'connect_dt'=>$request->input('connect_dt'),
           'kam_id'=>$request->input('kam_id'),
           'create_by'=> Auth::user()->id
       ];

      DB::table('tbl_customer_registration')->insert($data);

        $upgrade = CustomerDummy::find($id);
        $upgrade->status     = 1;
        $upgrade->save();


       return redirect('pending_dummy_clients_list')->with('status',"The Client successfully added");


      

    }

    public function client_u_d_dataview($id)
      {
        $client = Customer::where('cu_id',$id)->first();

        return view('client_u_d_dataview')->with('client_u_d_dataview', $client);
    }

    public function user_add(){

        return view('user_add');
    }

  public function user_list(){

    $user_list=\App\User::orderby('id','asc')->get();
    //dd($user_list);exit();
    return view('user_list',['user_list'=>$user_list]);

  }

  public function add_user_save(Request $request){
         $client=new User();
         $client->name = $request->name;
         $client->email =$request->email;
         $hashpass = $request->password;
         $client->password = bcrypt($hashpass);                
         $client->user_type   = $request->user_type; 
         $client->save();
         return response()->json('The Client successfully added');
    }

    public function get_client_all_list()
    {
        $client_list=\App\Customer::orderby('cu_company','asc')->get();
        return $client_list;
    }

    // edit client
    public function edit($cu_id)
    {
        $client = Customer::where('cu_id',$cu_id)->first();

        return view('client_upgrade_data_edit')->with('client_upgrade_data_edit', $client);
        //dd($client);exit();
        //return response()->json($client);
    }

    public function downgrade_edit($cu_id){

        $client = Customer::where('cu_id',$cu_id)->first();
        return view('downgrade_edit')->with('downgrade_edit', $client);

    }

    public function update(Request $request, $id)
    {
        //dd($request->all());exit();
        $effective_dt = date('Y-m-d');
        if($request->effective_dt != ''){$effective_dt=date('Y-m-d',strtotime($request->effective_dt));}
        $client=Customer::where('cu_id',$id)->first();//cu_otc,cu_installationcost,cu_securitymoney,
        //   $client->status = 0;
        $new_bandwidth  = 0.00;
        $new_youtube    = 0.00;
        $new_facebook   = 0.00;
        $new_data       = 0.00;
        $new_bdix       = 0.00;

        if($request->new_bandwidth != ''){$new_bandwidth= $new_bandwidth+$request->new_bandwidth;}
        if($request->new_youtube != ''){$new_youtube    = $new_youtube+$request->new_youtube;}
        if($request->new_facebook != ''){$new_facebook  = $new_facebook+$request->new_facebook;}
        if($request->new_data != ''){$new_data          = $new_data+$request->new_data;}
        if($request->new_bdix != ''){$new_bdix          = $new_bdix+$request->new_bdix;}

        $client->cu_bandwith    = $request->cu_bandwith+$new_bandwidth;
        $client->cu_youtube     = $request->cu_youtube+$new_youtube;
        $client->cu_facebook    = $request->cu_facebook+$new_facebook;
        $client->cu_data        = $request->cu_data+$new_data;
        $client->cu_bdix        = $request->cu_bdix+$new_bdix;


        $client->update_by  = Auth::user()->id;
        $client->update_at  = date("Y-m-d h:i:s", time());
        $client->save();

        $upgrade = new CustomerUpdowngrade();
        $upgrade->cu_bandwith   = $new_bandwidth;
        $upgrade->cu_youtube    = $new_youtube;
        $upgrade->cu_facebook   = $new_facebook;
        $upgrade->cu_data       = $new_data;
        $upgrade->cu_bdix       = $new_bdix;
        

        $upgrade->flag          = 1;
        $upgrade->effective_dt  = $effective_dt;
        $upgrade->cu_id         = $id;
        $upgrade->create_by     = Auth::user()->id;
        $upgrade->save();


        return redirect('client_upgrade_data_list')->with('status',"The Client data upgrade successfully");
    }

    public function update_down($id, Request $request)
    {
        $effective_dt = date('Y-m-d');
        if($request->effective_dt != ''){$effective_dt=date('Y-m-d',strtotime($request->effective_dt));}
        $client=Customer::where('cu_id',$id)->first();//cu_otc,cu_installationcost,cu_securitymoney,
        //   $client->status = 0;
        $new_bandwidth  = 0.00;
        $new_youtube    = 0.00;
        $new_facebook   = 0.00;
        $new_data       = 0.00;
        $new_bdix       = 0.00;

        if($request->new_bandwidth != ''){$new_bandwidth= $new_bandwidth+$request->new_bandwidth;}
        if($request->new_youtube != ''){$new_youtube    = $new_youtube+$request->new_youtube;}
        if($request->new_facebook != ''){$new_facebook  = $new_facebook+$request->new_facebook;}
        if($request->new_data != ''){$new_data          = $new_data+$request->new_data;}
        if($request->new_bdix != ''){$new_bdix          = $new_bdix+$request->new_bdix;}

        $client->cu_bandwith    = $request->cu_bandwith-$new_bandwidth;
        $client->cu_youtube     = $request->cu_youtube-$new_youtube;
        $client->cu_facebook    = $request->cu_facebook-$new_facebook;
        $client->cu_data        = $request->cu_data-$new_data;
        $client->cu_bdix        = $request->cu_bdix-$new_bdix;


        $client->update_by  = Auth::user()->id;
        $client->update_at  = date("Y-m-d h:i:s", time());//dd($client);
        $client->save();

        $downgrade = new CustomerUpdowngrade();
        $downgrade->cu_bandwith = $new_bandwidth;
        $downgrade->cu_youtube  = $new_youtube;
        $downgrade->cu_facebook = $new_facebook;
        $downgrade->cu_data     = $new_data;
        $downgrade->cu_bdix     = $new_bdix;

        $downgrade->flag        = 2;
        $downgrade->effective_dt= $effective_dt;
        $downgrade->cu_id       = $id;
        $downgrade->create_by   = Auth::user()->id;
        $downgrade->save();

        return redirect('client_downgrade_data_list')->with('status',"The Client data upgrade successfully");
    }

    public function view($id)
    {
        $client = Customer::where('cu_id',$id)->first();
        return response()->json($client);
    }

    public function delete($id)
    {
        $client = Customer::where('cu_id',$id)->first();
        $client->delete();
        return response()->json('The client successfully deleted');
    }

    public function update_status($id, Request $request)
    {
        if($request->effective_dt) {
            $client = Customer::where('cu_id', $id)->first();
            $new_status = 0;

            if ($client->status == 0) $new_status = 1;
            $client->status = $new_status;
            $client->update_by = 1;
            $client->update_at = date("Y-m-d h:i:s", time());
            $client->save();

            //
            $conn_history = new ConnectionHistory();
            $conn_history->date = date('Y-m-d', strtotime($request->effective_dt));
            $conn_history->flag = $new_status;
            $conn_history->comment = $request->comment;
            $conn_history->cu_id = $id;
            $conn_history->create_by = 1;

            $conn_history->save();

            return response()->json($client);
        }
    }
}
