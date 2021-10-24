<?php
/**
 * User: York <lianyupeng1988@126.com>
 * Date: 2021/10/23 20:20
 */

namespace Poa\Http\Router;

use Poa\Http\Server\HttpContext;

interface RouteResultInterface
{
    public function __invoke(HttpContext $context);
}
