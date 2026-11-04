<?php

namespace App\Http\Controllers;

use App\Models\LogAuditoria;
use Illuminate\Http\Request;

class AuditoriaController extends Controller
{
    public function index(Request $request)
    {
        $logs = LogAuditoria::with(
            'usuario'
        )
        ->latest()
        ->paginate(20);

        return view(
            'auditoria.index',
            compact('logs')
        );
    }
}