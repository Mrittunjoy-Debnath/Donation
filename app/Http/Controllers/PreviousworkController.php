<?php

namespace App\Http\Controllers;

use App\PreviousWork;
use Illuminate\Http\Request;

class PreviousworkController extends Controller
{
    public function previouswork()
    {

//        $firstProducts =Product::where('publication_status',1)
//            ->take(4)
//            ->get();

        $p_work = PreviousWork::where('publication_status',1)
            ->get();

        return view('front-end.p_work.p_work',[
            'p_work'=>$p_work,
        ]);
    }

    public function detailsWork($id)
    {
        $work = PreviousWork::find($id);

        return view('front-end.p_work.details_work',[
            'work' =>$work,
        ]);
    }
}
