<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProfileRequest;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view('admin.profile', compact('user'));
    }


    public function update(Request $request, $id)
    {
        //
        $user = Auth::user()->whereId($id)->first();

        $input = $request->all();

        switch ($request->submitbutton){

            case 'Save Photo':
//             unlink(public_path() . $user->photo->path);



        if ($file = $request->file('photo_id')) {


            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['path' => $name]);

            $input['photo_id'] = $photo->id;


        }
        break;
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

//    public function photo(Request $request)
//    {
//
//        $user = Auth::user();
//
//        $input = $request->all();
//
//
//        if($file = $request->file('photo_id')){
//
//
//            $name = time() . $file->getClientOriginalName();
//
//            $file->move('images', $name);
//
//            $photo = Photo::create(['path'=>$name]);
//
//            $input['photo_id'] = $photo->id;
//
//
//        }
//
//
//        $user->update($input);
//
//    }
}
