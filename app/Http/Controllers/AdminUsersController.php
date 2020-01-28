<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Role;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(5);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new User();
        $input = $request->except('photo_id');
        $input['password'] = bcrypt(trim($request->password));
        $photo_id = $request->photo_id;

        if ($photo_id) {


            if ($file = $request->file('photo_id')) {

                $name = time() . $file->getClientOriginalName();


                $file->move('images', $name);

                $photo = Photo::create(['path' => $name]);

                $input['photo_id'] = $photo->id;

            }
        }
        $request->validate([
            'password' => ['required', 'min:7'],
            'confirmed_password' => ['same:password'],
        ]);

        $user->create($input);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $roles = Role::pluck('name', 'id')->all();
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);

        if (trim($request->password) == '') {

            $input = $request->except('password', 'photo_id');

            $photo_id = $request->photo_id;
            if ($photo_id) {


                if ($user->photo->path) {
                    unlink(public_path() . $user->photo->path);
                }
                if ($file = $request->file('photo_id')) {

                    $name = time() . $file->getClientOriginalName();


                    $file->move('images', $name);

                    $photo = Photo::create(['path' => $name]);

                    $input['photo_id'] = $photo->id;

                }
            }

        } else {

            $input = $request->except('photo_id');
            $input['password'] = bcrypt(trim($request->password));
            $request->validate([
                'password' => ['required', 'min:7'],
                'confirmed_password' => ['same:password'],
            ]);

            $photo_id = $request->photo_id;

            if ($photo_id) {


                if ($user->photo->path) {
                    unlink(public_path() . $user->photo->path);
                }
                if ($file = $request->file('photo_id')) {

                    $name = time() . $file->getClientOriginalName();


                    $file->move('images', $name);

                    $photo = Photo::create(['path' => $name]);

                    $input['photo_id'] = $photo->id;

                }
            }
        }


        $user->update($input);

        return redirect('/admin/users');

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
         $user = User::findOrFail($id);

         $user->delete();

         return redirect('/admin/users');
    }
}
