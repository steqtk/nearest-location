<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Location;

/**
 * Class NearestBuildingController
 * @package App\Http\Controllers
 */
class NearestBuildingController extends Controller
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function getNearest(Request $request)
    {
        $data = $request->only('x','y');
        $rules = [
            'x' => 'required|numeric',
            'y' => 'required|numeric'
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails())
            return $validator->errors();
        $x1 = substr(str_replace('.', ',',$data['x']), 0,5);//0.01 is +-1km
        $y1 = substr(str_replace('.', ',',$data['y']),0,5);
        $nearest = [];
        Location::get($x1,$y1)->each(function ($item) use ($x1, $y1, &$nearest){
            $la1 = (float)(str_replace(",", ".", $x1));
            $lo1 = (float)(str_replace(",", ".", $y1));
            $la2 = (float)(str_replace(",", ".", $item->x));
            $lo2 = (float)(str_replace(",", ".", $item->y));
            $nearest[] = [
                'addr' => $item->adres_full,
                'type' => $item->matwalls,
                'x'    => $item->x,
                'y'   => $item->y,
                'distance' => self::haversineGreatCircleDistance($la1, $lo1, $la2, $lo2),
            ];
       });
        usort($nearest, function($a, $b){
            if($a['distance'] === $b['distance'])
                return 0;
            return $a['distance'] > $b['distance'] ? 1 : -1;
        });
        return $nearest[0];
    }

    /**
     * @param $latitudeFrom
     * @param $longitudeFrom
     * @param $latitudeTo
     * @param $longitudeTo
     * @param int $earthRadius
     * @return float|int distance
     */
    function haversineGreatCircleDistance(
        $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }
}
