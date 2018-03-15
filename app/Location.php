<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Location extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store',
        'id',
        'res_id',
        'city',
        'streetna_1',
        'address',
        'house_num1',
        'house_num2',
        'house_num3',
        'house_num4',
        'house_num5',
        'house_num6',
        'build_type',
        'adres_full',
        'cell',
        'y',
        'x',
        'car',
        'pedestrian',
        'status',
        'type',
        'year_buld',
        'floors',
        'flats',
        'matwalls',
        'people',
        'key_accou',
        'bus',
    ];
    public $timestamps = false;

    /**
     * @param $x
     * @param $y
     * @return collection
     */
    public static function get($x,$y)
    {
        return DB::table('locations')
            ->where('x', 'like', $x.'%')
            ->where('y','like',$y.'%')
            ->get();
    }
}
