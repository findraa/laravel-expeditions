<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class AccessLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->getClientIp();
        $data =  DB::table('visitors')->where('ip',$ip);
        $total = $data->count();
        if($total==0){
            DB::table('visitors')->insert([
                'path' => $request->path(),
                'ip' => $request->getClientIp(),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        }
        $response = $next($request);

        return $response;
    }
}
