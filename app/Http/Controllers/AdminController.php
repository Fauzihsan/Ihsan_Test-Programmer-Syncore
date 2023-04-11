<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = Biodata::all();

        return view('biodata.list', compact('data'));
    }

    public function destroy($id)
    {
        Biodata::destroy($id);

        return redirect()->back();
    }
}
