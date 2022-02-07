<?php


namespace Steven\RecaptchaBundle\Type;


use Steven\RecaptchaBundle\Constraints\Recaptcha;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecaptchaSubmitType extends AbstractType
{
    /**
     * @var string
     */
    private $key;

    public function __construct(string $key)
    {

        $this->key = $key;
    }

    public function getParent()
    {
        // we could have extend form SubmitType but for
        // some validation purpose we extend form texttype
        return TextType::class;
    }

    public function getBlockPrefix()
    {
        return 'recaptcha_submit';
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['label'] = false;
        // pass the key received from the service into the button field
        $view->vars['key'] = $this->key;
        $view->vars['button'] = $options['label'];
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // this field is not mapped to any entity
        $resolver->setDefaults([
            'mapped' => false,
            'constraints' => new Recaptcha()
        ]);
    }
}
