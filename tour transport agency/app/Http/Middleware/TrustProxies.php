<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * Use '*' to trust all proxies (including Ngrok).
     *
     * @var array|string|null
     */
    protected $proxies = '*';

    /**
     * The headers that should be used to detect proxies.
     *
     * This ensures proper handling of requests behind proxies like Ngrok.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
