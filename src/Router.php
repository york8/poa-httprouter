<?php
/**
 * User: York <lianyupeng1988@126.com>
 * Date: 2021/10/23 20:15
 */

namespace Poa\Http\Router;

use Poa\Http\Server\HttpApplication;
use Poa\Http\Server\HttpContext;
use Poa\Middleware\ContextInterface;
use Poa\Middleware\MiddlewareInterface;

class Router implements MiddlewareInterface
{
    /** @var RouteRulerInterface[] */
    protected array $rulers = [];

    public function addRuler(RouteRulerInterface $ruler): self
    {
        $this->rulers[] = $ruler;
        return $this;
    }

    /**
     * @param HttpContext $context
     * @inheritDoc
     */
    public function __invoke(ContextInterface $context)
    {
        foreach ($this->rulers as $ruler) {
            $result = $ruler->process($context);
            if (!$result) continue;
            else if ($result instanceof NotFoundResult) {
                $result($context);
                continue;
            }
            // 将路由结果保存到上下文中
            $context[HttpApplication::KEY_HANDLER] = $result;
            break;
        }
    }
}
