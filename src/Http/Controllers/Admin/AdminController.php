<?php

namespace Astlaure\Saphir\Http\Controllers\Admin;

use Astlaure\Saphir\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('saphir::admin.index');
    }

    public function locales() {
        return response()->json(__('saphir'));
    }
}
