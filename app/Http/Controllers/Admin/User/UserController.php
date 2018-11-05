<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Middleware\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $id = 2;
        $users = DB::table('users')->where('role_id',$id)->paginate(1);

        return view('admin.users.users',compact('users'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addCars($id)
    {
        $cars = DB::table('cars')->get()->pluck('name', 'id');

        return view('admin.users.add',compact('cars','id'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function attach(Request $request, $id)
    {
        $cars = $request->car;
        $user =\App\User::findOrFail($id);
        $user->cars()->sync($cars);

        return redirect()->to('admin/users/users')->with('attach', 'attached');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function  delete($id)
    {
        \App\User::where('id',$id)->delete();

        return redirect()->back()->with('delete', 'user deleted');
    }
}
