<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessPackage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');
        $order = Order::where("user_id", $request->user()->id)->get();
        foreach ($order as $item) {
            foreach ($item->order_details as $item) {
                if($item->package_id == $id) {
                    return $next($request);
                }
            }
        }
        abort(403, 'Anda tidak memiliki hak mengakses laman tersebut!');
        // return $next($request);
    }
}
