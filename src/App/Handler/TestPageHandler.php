<?php

declare(strict_types=1);

namespace App\Handler;

use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Helper\Template\TemplateVariableContainer;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Form\Element;
use Laminas\Form\Form;

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

//         $username = new Element\Text('username');
//         $username->setLabel('Username');
//         $username->setAttributes([
//             'class' => 'username',
//             'size'  => '30',
//         ]);

//         $password = new Element\Password('password');
//         $password->setLabel('Password');
//         $password->setAttributes([
//             'size'  => '30',
//         ]);

//         $form = new Form('my-form');
//         $form->add($username);
//         $form->add($password);

// //        dd($form->get('username'));

        return new HtmlResponse($this->template->render('app::test-page', [
            //'form' => $form,
        ]));
    }

}
