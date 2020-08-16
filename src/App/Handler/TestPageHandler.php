<?php

declare(strict_types=1);

namespace App\Handler;

use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Helper\Template\TemplateVariableContainer;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use App\Form\ContactForm;

class TestPageHandler implements RequestHandlerInterface
{
    private TemplateRendererInterface $template;

    public function __construct(TemplateRendererInterface $template)
    {
        $this->template = $template;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /* @var $templateVariableContainer TemplateVariableContainer */
        $templateVariableContainer = $request->getAttribute(TemplateVariableContainer::class);

        $form = new ContactForm();

        return new HtmlResponse($this->template->render('app::test-page', [
            'form' => $form,
        ]));
    }

}
