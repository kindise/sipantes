<?php

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $breadcrumbs = [
            [
                'name' => 'Dashboard'
            ]
        ];

        return view('pages.dashboard', compact('title', 'breadcrumbs'));
    }
}
