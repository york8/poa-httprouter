<?php
/**
 * User: York <lianyupeng1988@126.com>
 * Date: 2021/10/23 20:36
 */

namespace Poa\Http\Router;

use Poa\Http\Server\HttpContext;

interface RouteRulerInterface
{
    public function process(HttpContext $context): ?RouteResultInterface;
}
