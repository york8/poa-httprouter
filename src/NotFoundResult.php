<?php
/**
 * User: York <lianyupeng1988@126.com>
 * Date: 2021/10/25 0:06
 */

namespace Poa\Http\Router;

/**
 * 没有找到匹配的路由结果时，但又希望执行一些其它收尾逻辑时执行特殊逻辑（如日志上报等）
 */
class NotFoundResult extends CallableResult
{
}
