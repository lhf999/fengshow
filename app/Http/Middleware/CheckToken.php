<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
{

    protected $except = [
        '/',
        '/user/login',
        'user/register',
        'user/dologin',
        'user/outlogin',
        'user/sendmessage',
        'user/addmember',
        '/all',
        '/insert',
        '/admin',
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($request->is('user/login') && $request->session()->has('memberInfo')){
            return redirect('/');
        }
        //不需要检验的节点直接跳转
        if($this->shouldPassThrough($request)){
            return $next($request);
        }

        if(!$request->session()->has('memberInfo')){
            return redirect('/user/login');
        }
        return $next($request);
    }

    /**
     * 不需要验证的节点
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function shouldPassThrough($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }
            if ($request->is($except)) {
                return true;
            }
        }
        return false;
    }
}
