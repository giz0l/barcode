<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class BarCodeController extends Controller
{
    /**
     * Wyświetl formualarz generowania kodu wraz z listą kodów
     */
    public function index(): View
    {
        return view('home');
    }

    /**
     *  Generuj kod
     */
    public function create(Request $request): RedirectResponse
    {
        // Generuj kod

        return redirect('/');
    }
}
