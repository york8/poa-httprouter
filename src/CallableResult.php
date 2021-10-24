<?php
/**
 * User: York <lianyupeng1988@126.com>
 * Date: 2021/10/25 0:01
 */

namespace Poa\Http\Router;

use Poa\Http\Server\HttpContext;

class CallableResult implements RouteResultInterface
{
    protected $handler;

    public function __construct(callable $handler)
    {
        $this->handler = $handler;
    }

    public function __invoke(HttpContext $context)
    {
        ($this->handler)($context);
    }
}
