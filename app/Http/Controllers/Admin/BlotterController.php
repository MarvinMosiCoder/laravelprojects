<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminActivities;
use App\Residences;
use App\Blotter;
use Auth;
use Hash;
use Session;
use Image;
class BlotterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        Session::put('page','add_blotter');
        $blotters = Blotter::all();
        return view('admin.blotter.add_blotter', compact('blotters'));
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
        $this->validate($request, [
            'residences_id' => 'required',
            'comp_name' => 'required',
            'comp_age' => 'required',
            'comp_gender' => 'required',
            'comp_nat' => 'required',
            'comp_address' => 'required',
            'resp_name' => 'required',
            'resp_age' => 'required',
            'resp_gender' => 'required',
            'resp_nat' => 'required',
            'resp_address' => 'required',
            'serial_number' => 'required',
            'blotter_type' => 'required',
            'location' => 'required',
            'comp_statement' => 'required',
            'resp_statement' => 'required',
      ]);
      $blotter = array(
        'residences_id' => $request->residences_id,
        'comp_name' => $request->comp_name,
        'comp_age' => $request->comp_age,
        'comp_gender' => $request->comp_gender,
        'comp_nat' => $request->comp_nat,
        'comp_address' => $request->comp_address,
        'resp_name' => $request->resp_name,
        'resp_age' => $request->resp_age,
        'resp_gender' => $request->resp_gender,
        'resp_nat' => $request->resp_nat,
        'resp_address' => $request->resp_address,
        'serial_number' => $request->serial_number,
        'blotter_type' => $request->blotter_type,
        'location' => $request->location,
        'comp_statement' => $request->comp_statement,
        'resp_statement' => $request->resp_statement
    );

             Blotter::create($blotter);
             $admin_activities = AdminActivities::create($request->all());
             Session::flash('success_message', 'Data Save!');
             return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function autocomplete(){
    $term = Input::get('term');

    $results = array();

    $queries = DB::table('residences')
        ->where('fname', 'LIKE', '%'.$term.'%')
        ->where('mname', 'LIKE', '%'.$term.'%')
        ->orWhere('lname', 'LIKE', '%'.$term.'%')
        ->take(5)->get();

    foreach ($queries as $query)
    {
        $results[] = [ 'id' => $query->id, 'value' => $query->fname.' '.$query->mname. ' ' .$query->lname ];
    }
    return Response::json($results);
  }

}
