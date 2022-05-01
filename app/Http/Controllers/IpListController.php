<?php

namespace App\Http\Controllers;

use App\ip_list;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

class IpListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ip_list=DB::table('ip_list')->get();
        return view('ip_list')->with('ip_list', $ip_list);
    }

public function ip_list_viewall(Request $request){

            $comapny  = ip_list::find($request->id);

            //dd($comapny);exit();
                return response()->json([
                  'data' => $comapny
                ]);
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           
        $iplist=new ip_list();
        $iplist->ip_address = $request->ip_address;
        $iplist->status = 1;
        $iplist->create_by  = 1;
        $iplist->create_dt  = date("Y-m-d h:i:s", time());
        $iplist->save();
        return redirect('ip_list')->with('status',"The Ip successfully added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ip_list  $ip_list
     * @return \Illuminate\Http\Response
     */
    public function show(ip_list $ip_list)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ip_list  $ip_list
     * @return \Illuminate\Http\Response
     */
    public function edit(ip_list $ip_list)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ip_list  $ip_list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //dd($id);exit();
        $client=ip_list::where('id',$id)->first();
        //dd($client);
        $client->ip_address = $request->ip_address; 
        $client->save();
        return redirect('ip_list')->with('status',"The Client data upgrade successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ip_list  $ip_list
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ip_list_delete = ip_list::where('id',$id)->first();
        $ip_list_delete->delete();
        return redirect('/ip_list')->with('success', 'Ip deleted successfully');
    }

}
