<?php

namespace Paw\Core;

class Config
{
    private array $configs;

    public function __construct()
    {
        $this->configs["LOG_LEVEL"] = getenv("LOG_LEVEL") ?: \Monolog\Logger::INFO;
        $path = getenv("LOG_PATH") ?: "/logs/app.log";
        $this->configs["LOG_PATH"] = $this->joinPaths('..', $path);

        $this->configs['DB_ADAPTER'] = getenv('DB_ADAPTER') ?? 'mysql';
        $this->configs['DB_HOSTNAME'] = getenv('DB_HOSTNAME') ?? 'localhost';
        $this->configs['DB_NAME'] = getenv('DB_NAME') ?? 'database_name';
        $this->configs['DB_USERNAME'] = getenv('DB_USERNAME') ?? 'root';
        $this->configs['DB_PASSWORD'] = getenv('DB_PASSWORD') ?? '';
        $this->configs['DB_PORT'] = getenv('DB_PORT') ?? '3306';
        $this->configs['DB_CHARSET'] = getenv('DB_CHARSET') ?? 'utf8';

        $this->configs['TEMPLATES_DIR'] = getenv('TEMPLATES_DIR') ?? '/src/App/views';
        $this->configs['TEMPLATES_CACHE_DIR'] = getenv('TEMPLATES_CACHE_DIR') ?? '/src/App/views/cache';

    }

    public function joinPaths()
    {
        $paths = array();
        foreach (func_get_args() as $arg) {
            if ($arg != ''){
                $paths[] = $arg;
            }
        }
        return preg_replace('#/+#', '/', join('/', $paths));
    }

    public function get($name)
    { 
        return $this->configs[$name] ?? null;
    }
}