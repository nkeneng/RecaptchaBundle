<?php


namespace Steven\RecaptchaBundle\DependencyInjection;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class RecaptchaExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration,$configs);
        $container->setParameter('recaptcha.key',$config['key']);
        $container->setParameter('recaptcha.secret',$config['secret']);
    }
}
