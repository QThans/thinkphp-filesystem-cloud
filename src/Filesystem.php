<?php


namespace thans\filesystem;


use think\App;
use think\filesystem\Driver;

class Filesystem
{
    protected $disks;

    /** @var App */
    protected $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    /**
     * @param  null|string  $name
     *
     * @return Driver
     */
    public function disk(string $name = null): Driver
    {
        $name = $name ?: $this->app->config->get('filesystem.default');

        if (! isset($this->disks[$name])) {
            $config = $this->app->config->get("filesystem.disks.{$name}");

            $this->disks[$name] = App::factory($config['type'], '\\thans\\filesystem\\driver\\', $config);
        }

        return $this->disks[$name];
    }

    public function __call($method, $parameters)
    {
        return $this->disk()->$method(...$parameters);
    }
}