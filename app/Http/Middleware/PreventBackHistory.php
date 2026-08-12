<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventBackHistory
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    //byakhod el req , $next -> kml el rew ll stage ely b3dha
    //3shan ely b3d el middleware ytnfz w yro7 3l controller
    //3ayzen el req ykml 3ady lakn n3dl el response ely rag3 mn laravel 
    // w nkhly el browser my save el page fel cache
   public function handle(Request $request, Closure $next): Response
{
    //kml el request 
$response = $next($request);

   //by change el response ely rag3 b headers 
   //don't store the page 
$response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
$response->headers->set('Pragma', 'no-cache');

return $response;


}

}