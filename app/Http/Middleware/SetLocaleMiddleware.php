<?php

namespace App\Http\Middleware;

use Closure;

class SetLocaleMiddleware
{
    /**
     * The availables languages.
     *
     * @array $languages
     */
    protected $languages = ['en', 'fr'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (
            (
                !\Session::has('lang')
                && isset($request->lang)
                && !empty($request->lang)
                && in_array($request->lang, $this->languages)
            )
            || (
                \Session::has('lang')
                && isset($request->lang)
                && !empty($request->lang)
                && in_array($request->lang, $this->languages)
                && $request->lang != \Session::get('lang')
            )
        ) {
            \Session::put('lang', $request->lang);
            \Lang::setlocale($request->lang);
        }
        else if (
            !\Session::has('lang')
            && !isset($request->lang)
        ) {
            \Session::put('lang', \App::getLocale());
            \Lang::setlocale(\App::getLocale());
        }
        return $next($request);
    }
}
