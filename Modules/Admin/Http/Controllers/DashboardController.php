<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Entry;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title = '応募者一覧';

        $entries = Entry::all();

        return view('admin::index', compact(
            'title',
            'entries'
        ));
    }
}
