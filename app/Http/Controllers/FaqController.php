<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqModel;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = \App\Models\FaqModel::all();
        return view('faq', compact('faqs')); // TANPA subfolder
    }

}
