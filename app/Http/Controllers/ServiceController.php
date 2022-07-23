<?php

namespace App\Http\Controllers;

use App\Aboutus;
use App\House;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function house()
    {
        $about = House::where('publication_status',1)
            ->get();

        return view('front-end.service.house',[
            'about'=>$about,
        ]);
    }
    public function foods()
    {
        $about = Aboutus::where('publication_status',1)
            ->get();

        return view('front-end.service.foods',[
            'about'=>$about,
        ]);
    }
    public function tubewell()
    {
        $about = Aboutus::where('publication_status',1)
            ->get();

        return view('front-end.service.tubewell',[
            'about'=>$about,
        ]);
    }


}
