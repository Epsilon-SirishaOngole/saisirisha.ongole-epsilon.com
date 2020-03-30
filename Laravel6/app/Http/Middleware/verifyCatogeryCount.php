<?php

namespace LearnApp\Http\Middleware;
use LearnApp\Category;

use Closure;

class verifyCatogeryCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if(Category::all()->count() == 0){
           session()->flash('error','you need to add catogeries to be able to add posts');
           return redirect(route('catogries.create'));
       }
        return $next($request);
    }
}
