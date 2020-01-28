<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminChangePasswordRequest;
use App\Http\Requests\AdminProfileRequest;
use App\Photo;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();

        return view('admin.profile.index', compact('user'));
    }


    public function update(Request $request, $id)
    {
        //
        $user = Auth::user()->whereId($id)->first();

        $input = $request->except('photo_id');
        $photo_id = $request->photo_id;

        if ($photo_id) {


            if($user->photo->path){
                unlink(public_path() . $user->photo->path);
            }

        if ($file = $request->file('photo_id')) {


            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['path' => $name]);

            $input['photo_id'] = $photo->id;


        }
    }

        $user->update($input);

        return redirect('/admin/profile');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user = Auth::user()->whereId($id)->first();

        unlink(public_path() . $user->photo->path);

//        $user->update($user->photo_id = 0);



        return redirect('/admin/profile');

    }

    public function changePasswordView(){

        return view('admin.profile.password');
    }

    public function changePassword(Request $request){

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'min:7'],
            'confirmed_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);


        return redirect('/admin/profile');
    }
}
