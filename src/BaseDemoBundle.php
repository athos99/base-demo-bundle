<?php
namespace Athos99\BaseDemoBundle;

use Athos99\BaseDemoBundle\Service\BaseDemo;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class BaseDemoBundle extends AbstractBundle
{

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
      $services = $container->services();
      $services->set('athos99.base_demo', BaseDemo::class);
      $builder->getDefinition( 'athos99.base_demo')
            ->setArgument('$param1', $config['param1'] )
            ->setArgument('$param2', $config['param2'] )
            ->setArgument('$param2', $config['param3'] )
            ;
    }


    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
            ->stringNode('param1')->defaultValue('default value1')->end()
            ->stringNode('param2')->defaultValue('default value2')->end()
            ->stringNode('param3')->defaultValue('default value3')->end()
            ->end()
        ;
    }
}
