<?php

namespace InfrontLabs\Startup\Controllers;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class DocumentationController extends Controller
{
    public function index($page = 'index')
    {
        if (View::exists('startup::docs.' . $page)) {
            return view('startup::docs.' . $page);
        } else {
            return view('startup::docs.index');
        }
    }
}
