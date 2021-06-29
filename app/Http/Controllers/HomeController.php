<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Courier;
use App\Models\Province;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class HomeController extends Controller
{
    public function index()
    {
        $couriers   = Courier::pluck('title', 'code');
        $provinces  = Province::pluck('title', 'province_id');
        return view('main', compact('couriers', 'provinces'));
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('title', 'city_id');
        return json_encode($city);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'province_origin'       => 'required',
            'city_origin'           => 'required',
            'province_destination'  => 'required',
            'city_destination'      => 'required',
            'courier'               => 'required',
            'weight'                => 'required'
        ]);

        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin,
            'destination'   => $request->city_destination,
            'weight'        => $request->weight,
            'courier'       => $request->courier
        ])->get();

        $namaKurir  = $cost[0]['name'];
        $berat      = $request->weight;

        $rows = [];
        foreach ($cost[0]['costs'] as $row) {
            $rows[] = [
                'description'   => $row['description'],
                'biaya'         => $row['cost'][0]['value'],
                'etd'           => $row['cost'][0]['etd']
            ];
        }

        $origin         = RajaOngkir::kota()->find($request->city_origin);
        $destination    = RajaOngkir::kota()->find($request->city_destination);

        return view('result', ['namaKurir' => $namaKurir, 'berat' => $berat, 'rows' => $rows, 'origin' => $origin, 'destination' => $destination]);
    }
}
