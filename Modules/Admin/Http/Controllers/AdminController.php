<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Yajra\DataTables\DataTables;


class AdminController extends Controller
{
   

    public function dashboard()
    {
        return view('admin::dashboard');
    }

    
}
