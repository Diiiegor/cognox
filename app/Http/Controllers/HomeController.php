<?php

namespace App\Http\Controllers;

use App\Repositories\CuentasRepository;

class HomeController extends Controller
{
    private $cuentasRepository;

    public function __construct(CuentasRepository $cuentasRepository)
    {
        $this->cuentasRepository = $cuentasRepository;
    }

    public function home()
    {
        $cuentasPropias = $this->cuentasRepository->cuentasPropias();
        return view('home', compact('cuentasPropias'));
    }
}
