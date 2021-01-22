<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class MainAdminController extends Controller
{
    public function AdminProfile(){
        $adminData = Admin::find(12);
        return view('admin.profile.view_profile',compact('adminData'));
    }

    public function AdminProfileEdit(){
        $editData = Admin::find(12);
        return view('admin.profile.edit_profile',compact('editData')); 
    }

    public function AdminProfileStore(Request $request){
        $data = Admin::find(12);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' =>'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);

    } // end method
}
