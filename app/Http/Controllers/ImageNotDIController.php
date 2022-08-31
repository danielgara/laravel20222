<?php

namespace App\Http\Controllers;

use App\Util\ImageLocalStorage;
use Illuminate\Http\Request;

class ImageNotDIController extends Controller
{
    public function index()
    {
        return view('imagenotdi.index');
    }

    public function save(Request $request)
    {
        $storeImageLocal = new ImageLocalStorage();
        $storeImageLocal->store($request);

        return back();
    }
}
