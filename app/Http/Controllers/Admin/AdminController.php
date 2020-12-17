<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Admin;
use Hash;
use Session;
use Image;
class AdminController extends Controller
{

    public function dashboard() {
        Session::put('page','dashboard');
    	return view('admin.dashboard');
    }
    
    public function login(Request $request) {
    	if($request->isMethod('post')) {
    		$data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
                'password.required' => 'password is required',
            ];

            $this->validate($request,$rules,$customMessages);

    		if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])) {
    			return redirect('admin/dashboard');
    		}else {
    			//return redirect()->back();
                return redirect('admin')->with('error_message', 'Invalid Username or Password');
    		}
    	}
		return view('admin.admin_login');	
	}

    public function settings() {
        Session::put('page','settings');
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.settings')->with(compact('adminDetails'));
    }

    public function chkCurrentPassword(Request $request) {
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
            echo "true";
        }else {
            echo "false";
        }
    }

    public function updateCurrentPassword(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //chech if current password is correct
            if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
                //chech if new password is correct
                if ($data['new_pwd'] == $data['confirm_pwd']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                    Session::flash('success_message', 'Password has been updated Successfully');
                }else {
                    Session::flash('error_message', 'Password not Match');
                }
            }else {
                Session::flash('error_message', 'Your Current password is Incorrect');
            }
            return redirect()->back();
        }
    }

    public function updateAdminDetails(Request $request){
        Session::put('page','update-admin-details');
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s-]+$/u',
                'admin_mobile' => 'required|numeric',
                'admin_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];

            $customMessages = [
                'admin_name.required' => 'Name is required',
                'admin_name.aplha' => 'Valid Name required',
                'admin_mobile.required' => 'Mobile is required',
                'admin_mobile.numeric' => 'valid Mobile required',
            ];

            $this->validate($request,$rules,$customMessages);

            //upload image for admin
            if ($request->hasFile('admin_image')) {
                $image_tmp = $request->file('admin_image');
                if ($image_tmp->isValid()) {
                    //get imgae extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //generate new imaga
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/admin_images/admin_photos/'.$imageName;
                    //upload image
                    Image::make($image_tmp)->save($imagePath);
                }else if(!empty($data['current_admin_image'])){
                     $imageName = $data['current_admin_image'];
                }else {
                    $imageName = "";
                }
            }
             $imageName = $data['current_admin_image'];
            //update admin details
            Admin::where('email', Auth::guard('admin')->user()->email)->update(['name'=>$data['admin_name'], 'mobile'=>$data['admin_mobile'], 'image'=>$imageName]);
            Session::flash('success_message', 'Admin Details Updated Successfully!');
            return redirect()->back();
        }
        return view('admin.update_admin');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
