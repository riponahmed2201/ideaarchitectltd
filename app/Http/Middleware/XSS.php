<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class XSS
{
    protected array $except = [
        'content',
        'description',
        'short_description',
        'about_me',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $input = $request->all();

        array_walk_recursive($input, function (&$value, $key) {
            if (! in_array($key, $this->except, true)) {
                $value = is_string($value) ? htmlspecialchars($value) : $value;
            }
        });

        $request->merge($input);

        return $next($request);
    }
}
