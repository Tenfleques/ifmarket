<?php

namespace App\Http\Middleware;

use Illuminate\Validation\Rule;
use App;
use Validator;
use Closure;


class ValidateForm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        $language = $request->cookie('lang'); //need to return error messages that user understand
        $langs = ["en", "ru"];
        if(in_array($language,$langs)){
            App::setLocale($language);
        }  

        $tags = array_map(function($val){
            return strtolower($val);
        },json_decode(file_get_contents(asset('storage/symbols.json'))));
       
        
        Validator::make($request->all(), [
            'company_symbol' => [
                'bail',
                'required',
                Rule::notIn($tags),
            ],
            'email' => 'bail|required|email',
            'start_date' => 'bail|required|regex:/^\d{4}\-\d{1,2}\-\d{1,2}$/|date|before_or_equal:end_date|before_or_equal:today',
            'end_date' => 'bail|required|regex:/^\d{4}\-\d{1,2}\-\d{1,2}$/|date|before_or_equal:today|after_or_equal:start_date',
        ])->validate();
        
        return $next($request);
    }
}
