<?php

namespace App\Http\Controllers;

use App\Models\BarCode;
use Illuminate\View\View;
use App\Http\Requests\StoreBarCodeRequest;
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
    public function create(StoreBarCodeRequest $request)
    {
        return $this->barCodeService->createBarCode($request->name, $request->value);
    }
}
