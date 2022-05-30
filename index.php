<?php declare(strict_types = 1);

require_once __DIR__ . '/vendor/autoload.php';

$configurator = new Nette\Configurator();
$configurator->setTempDirectory(__DIR__ . '/temp');
$configurator->setTimeZone('Europe/Prague');
$configurator->setDebugMode(true);
$configurator->enableTracy(__DIR__ . '/logs');

$configurator->createRobotLoader()
			->addDirectory(__DIR__ . '/App')
			->register();

$configurator->addConfig(__DIR__ . '/config.neon');

$container = $configurator->createContainer();
$container
		->getByType(Nette\Application\Application::class)
		->run();
