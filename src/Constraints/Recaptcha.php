<?php


namespace Steven\RecaptchaBundle\Constraints;


use Symfony\Component\Validator\Constraint;

class Recaptcha extends Constraint
{
    public $message = 'Invalid captcha';
}
