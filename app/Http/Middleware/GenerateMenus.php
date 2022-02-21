<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Lavary\Menu\Menu as LavaryMenu;
use App\Models\Menu;

class GenerateMenus
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
        if ($request->segment(1) != 'admin') {
            (new LavaryMenu())->make('menu', function ($menu) {
                $items = Menu::all();
                foreach ($items as $item) {
                    $menu->add($item->title, $item->link);
                }
            });
        }
        return $next($request);
    }
}
