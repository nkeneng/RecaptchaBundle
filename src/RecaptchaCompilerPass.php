<?php


namespace Steven\RecaptchaBundle;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RecaptchaCompilerPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        if ($container->hasParameter('twig.form.resources')){
            $resources = $container->getParameter('twig.form.resources') ?: [];
            // @Recaptcha is the namespace of my twig templates that points to
            // Lib/RecaptchaBundle/Resources/views/
            // you can debug and see it by typing bin/console debug:twig
            array_unshift($resources,'@Recaptcha/fields.html.twig');
            $container->setParameter('twig.form.resources',$resources);
        }
    }
}
