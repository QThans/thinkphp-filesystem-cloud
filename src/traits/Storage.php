<?php

namespace thans\filesystem\traits;

use Overtrue\Flysystem\Cos\CosAdapter;

trait Storage
{
    public function getUrl(string $path)
    {
        if (strpos($path, '/') === 0) {
            return $path;
        }
        $adapter = $this->filesystem->getAdapter();
        return isset($this->config['url']) && $this->config['url'] ? $this->config['url'] . DIRECTORY_SEPARATOR . $path
        : ($adapter instanceof CosAdapter) ? $adapter->getUrl($path) : $this->path($path);
    }
}
