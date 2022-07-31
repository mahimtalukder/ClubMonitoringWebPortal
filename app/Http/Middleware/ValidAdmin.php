<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Token;

class ValidAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->get('admin')){
            return $next($request);
        }
        return redirect()->route('signin');

        // $token = $request->header("Authorization");
        // $token = json_decode($token);
        // $check_token = Token::where('token',$token->access_token)->where('expired_at',NULL)->first();
        // if ($check_token) {
        //     return $next($request);

        // }
        // else return response("Invalid token",401);
    }
}
