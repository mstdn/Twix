<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function about()
    {
        return Inertia::render('Pages/About');
    }

    public function terms()
    {
        return Inertia::render('Pages/Terms');
    }

    public function privacy()
    {
        return Inertia::render('Pages/Privacy');
    }
}
