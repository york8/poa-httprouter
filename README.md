# poa-httprouter

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Total Downloads][ico-downloads]][link-downloads]

基于POA洋葱圈模型的路由器中间件，通过实现路由规则来定制路由器具体的动作

## 作者

- [York](https://github.com/york8)

## 安装

```json
{
  "require": {
    "poa/httprouter": "~0.1"
  }
}
```

```bash
composer update
```

或

```bash
composer install poa/httprouter
```

## 示例

```php
use Poa\Http\Router\CallableResult;
use Poa\Http\Router\Router;
use Poa\Http\Router\RouteResultInterface;
use Poa\Http\Router\RouteRulerInterface;
use Poa\Http\Server\HttpApplication;
use Poa\Http\Server\HttpContext;

class SimpleRuler implements RouteRulerInterface
{
    public function process(HttpContext $context): ?RouteResultInterface
    {
        if ($context->request->getMethod() === 'get') {
            return new CallableResult(function () {
                echo 'do something';
            });
        }
        return null;
    }
}

$router = new Router();
$router->addRuler(new SimpleRuler());

$app = new HttpApplication();
$app->use($router);

$app->handle(new HttpContext($request, $responst));
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

[ico-version]: https://img.shields.io/packagist/v/poa/httprouter.svg?style=flat-square

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square

[ico-downloads]: https://img.shields.io/packagist/dt/poa/httprouter.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/poa/httprouter

[link-downloads]: https://packagist.org/packages/poa/httprouter
