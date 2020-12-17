<?php

namespace App\Http\Controllers\Admin;

use App\Residences;
use App\Blotter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\AdminActivities;
use Hash;
use Session;
use Image;

class ResidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       Session::put('page','add_residences');
       $residences = Residences::all();
       return view('admin.residence.add_residences', compact('residences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Session::put('page','add_residences');
        return view('admin.residence.add_residences');
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
              'fname' => 'required',
              'lname' => 'required',
              'gender' => 'required',
              'birthplace' => 'required',
              'date_of_birth' => 'required',
              'address' => 'required',
              'contact' => 'required',
              'email' => 'required',
              'area' => 'required',
              'civil_status' => 'required',
              'voters_status' => 'required',
              'image' => 'required',
        ]);

         //upload image for admin
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    //get imgae extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //generate new imaga
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/residence_images/'.$imageName;
                    //upload image
                    Image::make($image_tmp)->save($imagePath);
                }else {
                    $imageName = "";
                }
            }

            $residences = array(
            'fname'       =>   $request->fname,
            'mname'        =>   $request->mname,
            'lname'        =>   $request->lname,
            'gender'        =>   $request->gender,
            'birthplace'        =>   $request->birthplace,
            'date_of_birth'        =>   $request->date_of_birth,
            'address'        =>   $request->address,
            'contact'        =>   $request->contact,
            'email'        =>   $request->email,
            'area'        =>   $request->area,
            'civil_status'        =>   $request->civil_status,
            'voters_status'        =>   $request->voters_status,
            'image'            =>   $imageName
        );

        
        $checkrow = Residences::where('fname', $request->input('fname'))
                              ->where('lname', $request->input('lname'))
                              ->first();
        if ($checkrow) {
             Session::flash('error_message', 'Already Exist!');
             return redirect()->back();          
        }else {
             Residences::create($residences);
             $admin_activities = AdminActivities::create($request->all());
             Session::flash('success_message', 'Data Save!');
             return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $residence = Residences::find($id);
        return view('admin.residence.show_residence', compact('residence', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $residences = Residences::find($id);
        return view('admin.residence.edit_residence', compact('residences', 'id'));
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
        $residences = Residences::find($id);

       //upload image for admin
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    //get imgae extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //generate new imaga
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/residence_images/'.$imageName;
                    //upload image
                    Image::make($image_tmp)->save($imagePath);
                }else if(!empty($request->current_residence_image)){
                     $imageName = $request->current_residence_image;
                }else {
                    $imageName = "";
                }
              }
              $imageName = $request->current_residence_image;
              $residences = array(
                'fname'       =>   $request->fname,
                'mname'        =>   $request->mname,
                'lname'        =>   $request->lname,
                'gender'        =>   $request->gender,
                'birthplace'        =>   $request->birthplace,
                'date_of_birth'        =>   $request->date_of_birth,
                'address'        =>   $request->address,
                'contact'        =>   $request->contact,
                'email'        =>   $request->email,
                'area'        =>   $request->area,
                'civil_status'        =>   $request->civil_status,
                'voters_status'        =>   $request->voters_status,
                'image'            =>   $imageName
            );
    
             Residences::whereId($id)->update($residences);
             $admin_activities = AdminActivities::create($request->all());
             Session::flash('success_message', 'Updated Data Successfully!');
             return redirect('/admin/add_residences');          

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
}
