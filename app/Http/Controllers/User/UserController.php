<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cars = Auth::user()->cars()->paginate(10);

        return view('user.dashboard', compact('cars'));
    }

    /**
     * @param Request $request
     * @return Car|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function getCar(Request $request)
    {
        $id = $request->id;
        $location = Car::with('location')->where('id', $id)->first();

        return $location;
    }
}
