<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logFile = storage_path('logs/laravel.log');
        $logs = "";

        if (File::exists($logFile)) {
            // Read last 100 lines for performance
            $lines = file($logFile);
            $lastLines = array_slice($lines, -100);
            $logs = implode("", array_reverse($lastLines));
        } else {
            $logs = "No log file found.";
        }

        return view('admin.logs.index', compact('logs'));
    }

    public function clear()
    {
        $logFile = storage_path('logs/laravel.log');
        if (File::exists($logFile)) {
            File::put($logFile, '');
        }
        return back()->with('success', 'Log cleared successfully.');
    }
}
