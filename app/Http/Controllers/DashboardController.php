<?php

namespace App\Http\Controllers;

use App\Enums\Todo as EnumsTodo;
use App\Models\Todo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $todoLinks = Todo::query()
            ->where('status', EnumsTodo::TODO)
            ->count();
        return Inertia::render('Dashboard', [
            'todoLinks' => $todoLinks
        ]);
    }
}
