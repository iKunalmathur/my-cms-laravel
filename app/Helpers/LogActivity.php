<?php

namespace App\Helpers;

use App\Models\Activity;
use Illuminate\Support\Facades\Request;

class LogActivity

{
    public static function add($subject)
    {

        $log = [];
        $log['subject'] = $subject;
        $log['url'] = Request::fullUrl();
        $log['method'] = Request::method();
        $log['ip'] = Request::ip();
        $log['agent'] = Request::header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        Activity::create($log);
    }

    public static function show()
    {
        return Activity::latest()->get();
    }
}
