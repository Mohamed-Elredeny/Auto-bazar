<?php

namespace App\Http\Controllers\Extract;

use App\Http\Controllers\Controller;
use App\models\City;
use App\models\District;
use Illuminate\Http\Request;

class ExtractCitiesController extends Controller
{
    public function countries(){
        $url = 'https://countriesnow.space/api/v0.1/countries';
        $country=[];
        $cities=[];
        $response = file_get_contents($url);
        $newsData = json_decode($response);
        foreach($newsData->data as $d) {
            City::create([
                'Title_ar'=>$d->country,
                'Title_en'=>$d->country,
                'Title_ku'=>$d->country,
                'code'=>1234
            ]);
            foreach($d->cities as $city){
                District::create([
                    'Title_ar'=>$city,
                    'Title_en'=>$city,
                    'Title_ku'=>$city,
                ]);
            }
        }

        return [
           1
        ];

        return response()->json();
    }
}
