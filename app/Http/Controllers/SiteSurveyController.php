<?php

namespace App\Http\Controllers;

use App\site_survey;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

class SiteSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kam_list       = DB::table('tbl_kam')->where('status','1')->orderBy('name','asc')->get();
        return view('site_survey_create',['kam_list'=>$kam_list]);
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
        $site_survey=new site_survey();
        $site_survey->cu_company = $request->cu_company;
        $site_survey->cu_name = $request->cu_name;
        $site_survey->cu_contact_no = $request->cu_contact_no;
        $site_survey->cu_designation = $request->cu_designation;
        $site_survey->cu_address = $request->cu_address;
        $site_survey->lat = $request->lat;
        $site_survey->lon = $request->lon;
        $site_survey->service = $request->service;
        $site_survey->quantity = $request->quantity;
        $site_survey->connection_media = $request->connection_media;
        $site_survey->no_link = $request->no_link;
        $site_survey->nearest_pop_name = $request->nearest_pop_name;
        $site_survey->pop_location = $request->pop_location;
        $site_survey->distance_from_pop = $request->distance_from_pop;
        $site_survey->required_equipment = $request->required_equipment;
        $site_survey->nttn = $request->nttn;
        $site_survey->radio_survey_note = $request->radio_survey_note;
        $site_survey->kam_id = $request->kam_id;
        $site_survey->update_by = 1;
        $site_survey->update_at = date("Y-m-d h:i:s", time());
        $site_survey->create_by  = 1;
        $site_survey->create_dt  = date("Y-m-d h:i:s", time());
        $site_survey->save();
        return redirect('site_survey_create')->with('status',"The Ip successfully added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\site_survey  $site_survey
     * @return \Illuminate\Http\Response
     */
    public function show(site_survey $site_survey)
    {

        $client_types   = DB::table('tbl_customer_type')->get();
        $area_list      = DB::table('tbl_area')->where('status','1')->orderBy('name','asc')->get();
        $kam_list       = DB::table('tbl_kam')->where('status','1')->orderBy('name','asc')->get();
        $site_survey_list=DB::table('site_survey')->get();
        return view('site_survey_list',['customer_type_list'=>$client_types,'area_list'=>$area_list,'kam_list'=>$kam_list,'site_survey_list'=>$site_survey_list]);
    }

    public function site_survey_form_list(site_survey $site_survey){

                $site_survey_list=DB::table('site_survey')->get();

                $kam_list       = DB::table('tbl_kam')->where('status','1')->orderBy('name','asc')->get();
        return view('site_survey_report_list',['kam_list'=>$kam_list, 'site_survey_list'=>$site_survey_list]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\site_survey  $site_survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

       $site_survey  = site_survey::find($request->id);

      $kam_list       = DB::table('tbl_kam')->where('status','1')->orderBy('name','asc')->get();
      return view('site_survey_edit',['kam_list'=>$kam_list, 'site_survey'=>$site_survey ]);
    }

    public function site_survey_edit(Request $request)
    {

      $site_survey  = site_survey::find($request->id);

      //$kam_list       = DB::table('tbl_kam')->where('status','1')->orderBy('name','asc')->get();
      return view('site_survey_report_edit', ['site_survey'=>$site_survey]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\site_survey  $site_survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //dd($request->all());exit();

        $site_survey=site_survey::where('id',$id)->first();
        $site_survey->cu_company = $request->cu_company;
        $site_survey->cu_name = $request->cu_name;
        $site_survey->cu_contact_no = $request->cu_contact_no;
        $site_survey->cu_designation = $request->cu_designation;
        $site_survey->cu_address = $request->cu_address;
        $site_survey->lat = $request->lat;
        $site_survey->lon = $request->lon;
        $site_survey->service = $request->service;
        $site_survey->quantity = $request->quantity;
        $site_survey->connection_media = $request->connection_media;
        $site_survey->no_link = $request->no_link;
        $site_survey->nearest_pop_name = $request->nearest_pop_name;
        $site_survey->pop_location = $request->pop_location;
        $site_survey->distance_from_pop = $request->distance_from_pop;
        $site_survey->required_equipment = $request->required_equipment;
        $site_survey->nttn = $request->nttn;
        $site_survey->radio_survey_note = $request->radio_survey_note;
        $site_survey->kam_id = $request->kam_id;

        $site_survey->save();
        return redirect('site_survey_list')->with('status',"The site survey update successfully");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\site_survey  $site_survey
     * @return \Illuminate\Http\Response
     */
    public function site_survey_edit_report_save(Request $request, $id)
    {
        
        //dd($request->all());exit();

        $site_survey=site_survey::where('id',$id)->first();
        $site_survey->cu_company = $request->cu_company;
        $site_survey->cu_name = $request->cu_name;
        $site_survey->cu_contact_no = $request->cu_contact_no;
        $site_survey->cu_designation = $request->cu_designation;
        $site_survey->cu_address = $request->cu_address;
        $site_survey->lat = $request->lat;
        $site_survey->lon = $request->lon;
        $site_survey->service = $request->service;
        $site_survey->quantity = $request->quantity;
        $site_survey->connection_media = $request->connection_media;
        $site_survey->no_link = $request->no_link;
        $site_survey->nearest_pop_name = $request->nearest_pop_name;
        $site_survey->pop_location = $request->pop_location;
        $site_survey->distance_from_pop = $request->distance_from_pop;
        $site_survey->required_equipment = $request->required_equipment;
        $site_survey->nttn = $request->nttn;
        $site_survey->radio_survey_note = $request->radio_survey_note;
        $site_survey->kam_id = $request->kam_id;

        $site_survey->save();
        return redirect('site_survey_form_list')->with('success',"The site survey update successfully");
    }

    public function site_survey_viewall_report_save(Request $request, $id)
    {
        
        //dd($request->all());exit();

        $site_survey=site_survey::where('id',$id)->first();
        $site_survey->cu_company = $request->cu_company;
        $site_survey->cu_name = $request->cu_name;
        $site_survey->cu_contact_no = $request->cu_contact_no;
        $site_survey->cu_designation = $request->cu_designation;
        $site_survey->cu_address = $request->cu_address;
        $site_survey->lat = $request->lat;
        $site_survey->lon = $request->lon;
        $site_survey->service = $request->service;
        $site_survey->quantity = $request->quantity;
        $site_survey->connection_media = $request->connection_media;
        $site_survey->no_link = $request->no_link;
        $site_survey->nearest_pop_name = $request->nearest_pop_name;
        $site_survey->pop_location = $request->pop_location;
        $site_survey->distance_from_pop = $request->distance_from_pop;
        $site_survey->required_equipment = $request->required_equipment;
        $site_survey->nttn = $request->nttn;
        $site_survey->radio_survey_note = $request->radio_survey_note;
        $site_survey->kam_id = $request->kam_id;
        $site_survey->survey_status = 1;
        $site_survey->save();
        return redirect('site_survey_form_list')->with('status',"The site survey update successfully");
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\site_survey  $site_survey
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site_survey_delete = site_survey::where('id',$id)->first();
        $site_survey_delete->delete();
        return redirect('/site_survey_list')->with('success', 'Site survey deleted successfully');
    }

  public function site_survey_form_delete($id){

    $site_survey_delete = site_survey::where('id',$id)->first();
        $site_survey_delete->delete();
        return redirect('/site_survey_form_list')->with('success', 'Site survey form deleted successfully');

  }

   
   public function site_survey_list_save(Request $request){

    //dd($request->all());exit();

    $comapny  = site_survey::find($request->id);

   // dd($comapny);exit();

    return response()->json([
      'data' => $comapny
    ]);


  }

public function site_survey_list_view(Request $request){

    //dd($request->all());exit();

    $comapny  = site_survey::find($request->id);

   // dd($comapny);exit();

    return response()->json([
      'data' => $comapny
    ]);


  }
}
