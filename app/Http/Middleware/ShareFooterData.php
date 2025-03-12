<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\GeneralParameter;

class ShareFooterData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $email = GeneralParameter::where('general_parameter_key', 'COMPANY_EMAIL')->first();
        $address = GeneralParameter::where('general_parameter_key', 'COMPANY_ADDRESS')->first();
        $phone = GeneralParameter::where('general_parameter_key', 'COMPANY_PHONE_NUMBER')->first();

        view()->share('email', $email);
        view()->share('address', $address);
        view()->share('phone', $phone);

        return $next($request);
    }
}
