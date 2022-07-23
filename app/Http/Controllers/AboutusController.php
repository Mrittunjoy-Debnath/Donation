<?php

namespace App\Http\Controllers;

use App\Aboutus;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function aboutus()
    {

//        $firstProducts =Product::where('publication_status',1)
//            ->take(4)
//            ->get();

        $about = Aboutus::where('publication_status',1)
                ->get();

        return view('front-end.aboutus.aboutus',[
            'about'=>$about,
        ]);
    }
}
