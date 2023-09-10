<?php

namespace App\Http\Controllers;

use App\Models\BarCode;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\BarCodeService;
class BarCodeController extends Controller
{
    public function __construct(
        protected BarCodeService $barCodeService,
    ) {
    }

    /**
     * Wyświetl formualarz generowania kodu wraz z listą kodów
     */
    public function index(): View
    {
        return view('home', ['codes' => BarCode::all()]);
    }

    /**
     *  Generuj kod
     */
    public function create(Request $request)
    {
        return $this->barCodeService->createBarCode($request->nameCode, $request->valueCode);
    }
}
