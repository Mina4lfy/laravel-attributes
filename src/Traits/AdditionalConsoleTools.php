<?php

declare(strict_types=1);

namespace Rinvex\Attributes\Traits;

trait AdditionalConsoleTools
{
    /**
     * Register commands.
     *
     * @param array $commands
     *
     * @return void
     */
    protected function registerCommands(array $commands): void
    {
        $commandsToRegister = [];

        foreach ($commands as $class => $config) {
            $commandsToRegister[] = $class;
        }

        $this->commands($commandsToRegister);
    }

    /**
     * Publishes config.
     *
     * @param string $namespace
     *
     * @return void
     */
    protected function publishesConfig(string $namespace): void
    {
        $this->publishes([
            __DIR__ . '/../../config/config.php' => config_path(basename("$namespace.php")),
        ], "$namespace::config");
    }

    /**
     * Autoload migrations.
     *
     * @param string $namespace
     *
     * @return void
     */
    protected function autoloadMigrations(string $namespace): void
    {
        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('migrations'),
        ], "$namespace::migrations");
    }
}
