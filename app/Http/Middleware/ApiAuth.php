<?php

namespace App\Http\Middleware;

use Closure;
use App\Company;
use Exception;
use Illuminate\Http\JsonResponse;

class ApiAuth
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
        if(Company::where('api_key', $request->api_key)->count() > 0) //is the key valid?
        {
            $company = Company::where('api_key', $request->api_key)->first();

            if($company->status == 'active') //is the company active?
            {
                return $next($request);
            }
            else
            {
                $response = new JsonResponse;
                $response->setStatusCode(403);
                return $response->setData(['message' => 'The company is inactive or has been suspended.']);
            }
        }
        else
        {
            $response = new JsonResponse;
            $response->setStatusCode(403);
            return $response->setData(['message' => 'The API key or user is invalid.']);
        }
    }
}
