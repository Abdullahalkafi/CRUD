<?php

namespace App\Http\Controllers;

use App\CustomerDummy;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Auth;
use DB;

class CustomerDummyController extends Controller
    {
          public function get_client_type(){
        $client_types=DB::table('tbl_customer_type')->get();
            return $client_types;
    }


    public function client_add()
    {
        $client_types   = DB::table('tbl_customer_type')->get();
        $area_list      = DB::table('tbl_area')->where('status','1')->orderBy('name','asc')->get();
        $kam_list       = DB::table('tbl_kam')->where('status','1')->orderBy('name','asc')->get();
        return view('create',['customer_type_list'=>$client_types,'area_list'=>$area_list,'kam_list'=>$kam_list]);
    }

    public function client_save(Request $request)
    {
        
        //dd($request->all());exit();


        $validatedData = $request->validate([
                'cu_name' => ['required'],
                'ty_id' => ['required'],
                'station' => ['required'],
                'cu_company' => ['required'],
                'cu_contactno' => ['required'],
                'cu_email' => ['required'],
                'cu_short_name' => ['required'],
                'cu_address' => ['required'],
                'cu_bandwith' => ['required'],
                'connect_dt' => ['required']
            ],
            [
                'cu_name.required' => 'Customer name is required',
                'station.required' => 'Station is required',
                'cu_company.required' => 'Company name is required',
                'cu_contactno.required' => 'Contact number is required',
                'cu_email.required' => 'Email is required',
                'cu_short_name.required' => 'Company short name is required',
                'cu_address.required' => 'Address is required',
                'cu_bandwith.required' => 'Bandwidth is required',
                'connect_dt.required' => 'Connection Date is required'
            ]);

        //Data Insert into database
        $data =[
           'cu_name'=>$request->input('cu_name'),
           'area'=>$request->input('area_id'),
           'station'=>$request->input('station'),
           'ty_id'=>$request->input('ty_id'),
           'cu_company'=>$request->input('cu_company'),
           'cu_contactno'=>$request->input('cu_contactno'),
           'cu_email'=>$request->input('cu_email'),
           'cu_short_name'=>$request->input('cu_short_name'),
           'cu_address'=>$request->input('cu_address'),
           'cu_ip'=>$request->input('cu_ip'),
           'cu_bandwith'=>$request->input('cu_bandwith'),
           'cu_youtube'=>$request->input('cu_youtube'),
           'cu_facebook'=>$request->input('cu_facebook'),
           'cu_data'=>$request->input('cu_data'),
           'cu_bdix'=>$request->input('cu_bdix'),
           'connect_dt'=>$request->input('connect_dt'),
           'status'=> 0,
           'kam_id'=>$request->input('kam_id'),
           'create_by'=> Auth::user()->id
        ];
        DB::table('tbl_customer_registration_dummy')->insert($data);

        return redirect('dummy_clients_list')->with('status',"The Client successfully added");
    }

public function work_order(){

    $dummyclient_list=  DB::table('tbl_customer_registration_dummy')
            ->select('tbl_customer_registration_dummy.*','users.name','users.user_type as role')
            ->leftJoin('users','users.id','=','tbl_customer_registration_dummy.create_by')
            //->where('tbl_customer_registration_dummy.status',0)
            ->where('tbl_customer_registration_dummy.approve_status',1)
            ->orderBy('tbl_customer_registration_dummy.cu_company','ASC')
            ->get();
        return view('work_order')->with('work_order', $dummyclient_list);

}


public function edit_dummycustomer_update($id, Request $request){

        $dummycustomer =  CustomerDummy::find($id);
        $dummycustomer->cu_company = $request->cu_company;
        $dummycustomer->ty_id =$request->ty_id;
        $dummycustomer->station = $request->station;                
        $dummycustomer->cu_name   = $request->cu_name;                
        $dummycustomer->cu_contactno = $request->cu_contactno;
        $dummycustomer->cu_email = $request->cu_email;
        $dummycustomer->cu_short_name = $request->cu_short_name;
        $dummycustomer->cu_address = $request->cu_address;
        $dummycustomer->cu_ip = $request->cu_ip;
        $dummycustomer->area = $request->area;
        $dummycustomer->kam_id = $request->kam_id;
        $dummycustomer->connect_dt = $request->connect_dt;
        $dummycustomer->cu_bandwith = $request->cu_bandwith;
        $dummycustomer->cu_youtube = $request->cu_youtube;
        $dummycustomer->cu_facebook = $request->cu_facebook;
        $dummycustomer->cu_data = $request->cu_data;
        $dummycustomer->cu_bdix = $request->cu_bdix;
        $dummycustomer->save();

        return redirect('dummy_clients_list')->with('status',"The client data update successfully");

    //dd($request->all());

}

public function work_order_edit_client_save(Request $request, $cu_id){

    //dd($request->all()); exit();

     $site_survey=CustomerDummy::where('cu_id',$cu_id)->first();
     $site_survey->cu_ip = $request->cu_ip;
     $site_survey->approve_status = 2;

     $site_survey->save();
    return redirect('work_order')->with('success',"The site survey update successfully");

}



public function client_submit($cu_id){
        $client =CustomerDummy::where('cu_id', $cu_id)->update(['status' =>2]);
       return response()->json($newClient);
    }

public function client_approve($cu_id){
        $client = CustomerDummy::where('cu_id',$cu_id)->first();
        $newClient = $client->replicate(); 
        $newClient->setTable('tbl_customer_registration');
        $clients=$newClient->save();
        dd($clients);exit();
        //return response()->json($newClient);

    }


     public function get_dummy_list(){
        //$client_list=\App\CustomerDummy::orderBy('cu_id','DESC')->get();//where('status',0)->
        //$client_list=\App\CustomerDummy::with('login')->orderBy('cu_id','DESC')->get(); tumi r ami ek shate hole haste haste pet betha hoye jabe 
        $dummyclient_list=  DB::table('tbl_customer_registration_dummy')
            ->select('tbl_customer_registration_dummy.*','users.name','users.user_type as role')
            ->leftJoin('users','users.id','=','tbl_customer_registration_dummy.create_by')
            //->where('tbl_customer_registration_dummy.status',0)
            ->where('tbl_customer_registration_dummy.approve_status',0)
            ->orderBy('tbl_customer_registration_dummy.cu_company','ASC')
            ->get();
        return view('dummyclient_list')->with('dummyclient_list', $dummyclient_list);
    }

  public function approvel_change_status(Request $request){

        $user = CustomerDummy::find($request->cu_id);

        $user->approve_status = $request->approve_status;

        $user->save();

        return response()->json(['success'=>'Status change successfully.']);

  }

  public function approve_pandding_list_save(Request $request){

  	$comapny  = CustomerDummy::find($request->cu_id);
  

    return response()->json([
      'data' => $comapny
    ]);


  }

    public function get_pending_dummy_clients_list(){
        $panddingdummyclient_list = DB::table('tbl_customer_registration_dummy')
            ->select('tbl_customer_registration_dummy.*','kam.name as kam_name')
            ->leftJoin('tbl_kam as kam','kam.id','=','tbl_customer_registration_dummy.kam_id')
            ->where('tbl_customer_registration_dummy.approve_status',2)
            ->orderBy('tbl_customer_registration_dummy.cu_id','DESC')
            ->get();

        return view('panddingdummyclient_list')->with('panddingdummyclient_list', $panddingdummyclient_list);
    }




    public function get_client_list(){
        
        $client_list= DB::table('tbl_customer_registration')
            ->select('tbl_customer_registration.*','tbl_login.user_name','tbl_login.user_type as role')
            ->leftJoin('tbl_login','tbl_login.login_id','=','tbl_customer_registration.create_by')
            //->where('tbl_customer_registration.status', '=', 1)
            ->orderBy('tbl_customer_registration.cu_id','DESC')
            ->get();
        return view('client_list')->with('client_list', $client_list);
    }

     // edit client
    public function edit($cu_id)
    {
        $client = CustomerDummy::where('cu_id',$cu_id)->first();
        //dd($client);exit();
        return view('edit_dummy_customer_list')->with('edit_dummy_customer_list', $client);
        //return response()->json($client);
    }

    public function update($id, Request $request)
    {
        $client=CustomerDummy::where('cu_id',$id)->first();//cu_otc,cu_installationcost,cu_securitymoney,
         //   $client->status = 0;
            if(!empty($request->c_type)){
            $client->ty_id = $request->c_type;  
            }
            else{
                $client->ty_id=0;
            }       
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
            $client->update_by  = 1;
            $client->update_at  = date("Y-m-d h:i:s", time());
            $client->save();
        return response()->json('The Client successfully added');
    }


    public function view($id)
    {
        $client = CustomerDummy::where('cu_id',$id)->first();

        return view('dummyclient_list_view')->with('dummyclient_list_view', $client);

        //dd($client);exit();
       // return response()->json($client);
    }


    public function delete($id)
    {
        //dd($id);exit();
        $client = CustomerDummy::where('cu_id',$id)->first();
        $client->delete();
        return redirect('/dummy_clients_list')->with('success', 'Client deleted successfully');
    }
}
