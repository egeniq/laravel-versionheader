<?php

namespace Egeniq\Laravel\VersionHeader\Test\Http\Middleware;

use Egeniq\Laravel\VersionHeader\Http\Middleware\VersionHeader;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PHPUnit\Framework\TestCase;

class VersionHeaderTest extends TestCase
{
    public function testAddsVersionHeader()
    {
        $request = new Request();

        $middleware = new VersionHeader('X-Version', '1.2.3');

        /** @var Response $response */
        $response = $middleware->handle($request, function () {
            return new Response();
        });

        $this->assertArrayHasKey('x-version', $response->headers->all());
        $this->assertSame('1.2.3', $response->headers->get('x-version'));
    }
}
