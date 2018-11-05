<?php

namespace App\Http\Controllers\Admin\Car;

use App\Http\Requests\Admin\CarCreateRequest;
use App\Models\Car;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cars = DB::table('cars')->paginate(10);

        return view('admin.cars.cars',compact('cars'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * @param CarCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CarCreateRequest $request)
    {
        $car = new Car;
        $car->name = $request->name;
        $car->save();

        $location = new Location();
        $location->car_id = $car->id;
        $location->x = $request->x;
        $location->y = $request->y;
        $location->save();

        return redirect()->to('admin/car/cars')->with('create', 'New car created');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Car::where('id',$id)->delete();

        return redirect()->back()->with('delete', 'user deleted');
    }

}
