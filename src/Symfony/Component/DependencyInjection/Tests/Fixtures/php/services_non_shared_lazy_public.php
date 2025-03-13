<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class Symfony_DI_PhpDumper_Service_Non_Shared_Lazy extends Container
{
    protected $parameters = [];

    public function __construct()
    {
        $this->services = $this->privates = [];
        $this->methodMap = [
            'foo' => 'getFooService',
        ];

        $this->aliases = [];
    }

    public function compile(): void
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled(): bool
    {
        return true;
    }

    protected function createProxy($class, \Closure $factory)
    {
        return $factory();
    }

    /**
     * Gets the public 'foo' service.
     *
     * @return \Bar\FooLazyClass
     */
    protected static function getFooService($container, $lazyLoad = true)
    {
        $container->factories['foo'] ??= fn () => self::getFooService($container);

        if (true === $lazyLoad) {
            return new \ReflectionClass('Bar\FooLazyClass')->newLazyGhost(static function ($proxy) use ($container) { self::getFooService($container, $proxy); });
        }

        static $include = true;

        if ($include) {
            include_once __DIR__.'/Fixtures/includes/foo_lazy.php';

            $include = false;
        }

        return $lazyLoad;
    }
}
