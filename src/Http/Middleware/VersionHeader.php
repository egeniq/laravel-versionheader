<?php

namespace Egeniq\Laravel\VersionHeader\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VersionHeader
{
    /**
     * @var string
     */
    private $headerName;

    /**
     * @var string
     */
    private $version;

    public function __construct($headerName, $version)
    {
        $this->headerName = $headerName;
        $this->version = $version;
    }
    
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($this->version !== null) {
            $response->header($this->headerName, $this->version);
        }

        return $response;
    }
}
