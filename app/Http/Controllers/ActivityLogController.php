<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function showLogs()
    {
        $logs = \App\Models\ActivityLog::all();
        return view('admin.activityLog', compact('logs'));
    }
}
