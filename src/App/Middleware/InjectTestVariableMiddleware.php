<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Mezzio\Helper\Template\TemplateVariableContainer;

class InjectTestVariableMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        $container = $request->getAttribute(
            TemplateVariableContainer::class,
            new TemplateVariableContainer()
        );

        $request = $request->withAttribute(
            TemplateVariableContainer::class,
            $container->merge([
                'test_var'  => 'test_value',
            ])
        );

        return $handler->handle($request);
    }
}
