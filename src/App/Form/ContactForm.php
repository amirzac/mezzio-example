<?php

declare(strict_types=1);

namespace App\Form;

use Laminas\Captcha\AdapterInterface as CaptchaAdapter;
use Laminas\Form\Element;
use Laminas\Form\Form;

class ContactForm extends Form
{
    // protected $captcha;

    public function __construct() //CaptchaAdapter $captcha
    {
        parent::__construct();

        // $this->captcha = $captcha;

        // add() can take an Element/Fieldset instance, or a specification, from
        // which the appropriate object will be built.
        $this->add([
            'name' => 'name',
            'options' => [
                'label' => 'Your name',
            ],
            'type'  => 'Text',
        ]);
        $this->add([
            'type' => Element\Email::class,
            'name' => 'email',
            'options' => [
                'label' => 'Your email address',
            ],
        ]);
        $this->add([
            'name' => 'subject',
            'options' => [
                'label' => 'Subject',
            ],
            'type'  => 'Text',
        ]);
        $this->add([
            'type' => Element\Textarea::class,
            'name' => 'message',
            'options' => [
                'label' => 'Message',
            ],
        ]);
        // $this->add([
        //     'type' => Element\Captcha::class,
        //     'name' => 'captcha',
        //     'options' => [
        //         'label' => 'Please verify you are human.',
        //         'captcha' => $this->captcha,
        //     ],
        // ]);
        $this->add(new Element\Csrf('security'));
        $this->add([
            'name' => 'send',
            'type'  => 'Submit',
            'attributes' => [
                'value' => 'Submit',
            ],
        ]);

        // We could also define the input filter here, or
        // lazy-create it in the getInputFilter() method.
    }
}