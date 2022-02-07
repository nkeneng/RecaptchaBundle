<?php


namespace Steven\RecaptchaBundle\Constraints;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class RecaptchaValidator extends ConstraintValidator
{
    /**
     * @var RequestStack
     */
    private $requestStack;
    /**
     * @var \ReCaptcha\ReCaptcha
     */
    private $captcha;

    /**
     * RecaptchaValidator constructor.
     * @param RequestStack $requestStack
     * @param \ReCaptcha\ReCaptcha $captcha
     */
    public function __construct(RequestStack $requestStack, \ReCaptcha\ReCaptcha $captcha)
    {
        $this->requestStack = $requestStack;
        $this->captcha = $captcha;
    }

    public function validate($value, Constraint $constraint)
    {
        $recaptchaResponse = $this->requestStack->getCurrentRequest()->request->get('g-recaptcha-response');

        if (empty($recaptchaResponse)){
            $this->context->buildViolation($constraint->message)->addViolation();
            return;
        }

    }
}
