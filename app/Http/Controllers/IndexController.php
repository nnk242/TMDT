<?php

namespace App\Http\Controllers;

use App\LogCar;
use App\Manufacturer;
use App\Type;
use Illuminate\Http\Request;
use App\Car;

class IndexController extends Controller
{
    //
    public  function welcome(Request $request) {
        $type_check = Type::Pluck('id');
        $m_check = Manufacturer::Pluck('id');
        $arr = array(1,2,3,4,5);

        $types =  Type::all();
        $manufacturers =  Manufacturer::all();
        if (in_array($request->type, json_decode($type_check)) || $request->type == 'all'
            and in_array($request->curr, $arr) || $request->curr == 'all'
            and in_array($request->mcar, json_decode($m_check)) || $request->mcar == 'all') {
            $tslt = $request->type;
            $cslt = $request->curr;
            $mslt = $request->mcar;
            if($cslt == 1) {
                $lc = 0;
                $ec = 50000;
            } elseif ($cslt == 2) {
                $lc = 50001;
                $ec = 100000;
            } elseif ($cslt == 3) {
                $lc = 100001;
                $ec = 200000;
            }elseif ($cslt == 4) {
                $lc = 200001;
                $ec = 500000;
            }elseif ($cslt == 5) {
                $lc = 500001;
                $ec = 10000000000;
            } else {
                $lc = 0;
                $ec = 0;
            }
            if ($cslt == 'all') {
                if($tslt == 'all') {
                    if ($mslt == 'all') {
                        $cars = Car::all();
                    } else {
                        $cars = Car::where([['car_manufacturer_id', '=', $mslt]])->get();
                    }
                } else {
                    if ($mslt == 'all') {
                        $cars = Car::where([['types', '=', $tslt]])->get();
                    } else {
                        $cars = Car::where([['types', '=', $tslt], ['car_manufacturer_id', '=', $mslt]])->get();
                    }
                }
            } else {
                if($tslt == 'all') {
                    if ($mslt == 'all') {
                        $cars = Car::where([['price', '>=', $lc], ['price', '<=', $ec]])->get();
                    } else {
                        $cars = Car::where([['car_manufacturer_id', '=', $mslt], ['price', '>=', $lc], ['price', '<=', $ec]])->get();
                    }
                } else {
                    if ($mslt == 'all') {
                        $cars = Car::where([['types', '=', $tslt], ['price', '>=', $lc], ['price', '<=', $ec]])->get();
                    } else {
                        $cars = Car::where([['types', '=', $tslt], ['car_manufacturer_id', '=', $mslt], ['price', '>=', $lc], ['price', '<=', $ec]])->get();
                    }
                }
            }
            return view('FindCar', compact( 'types', 'manufacturers', 'cars', 'tslt', 'cslt', 'mslt'));
        }


        return view('welcome', compact('types', 'manufacturers'));
    }

    public function info($id) {
        $cs = Car::find($id);
        return view('CT', compact('cs'));
    }
    public function bookcar($id) {
        $cs = Car::find($id);
        //return $cs;
        return view('bookcar', compact('cs'));
    }

    public function pbookcar($id, Request $request) {

        $car = Car::find($id);
        if (isset($car)) {
            $user_id = $car->user_id;
            $name = $request->hoten;
            $numb = $request->sdt;
            $addr = $request->diachi;
            $time_ = $request->tgd;

            $log = new LogCar();

            $log->user_id = $user_id;
            $log->name = $name;
            $log->number_phone = $numb;
            $log->address = $addr;
            $log->time_start = $time_;
            $log->save();

            return redirect()->back()->with('mes', 'Đã gửi yêu cầu đến tài xế');
        }
        return redirect()->back()->with('er', 'Đã gửi yêu cầu đến tài xế');
    }
}
