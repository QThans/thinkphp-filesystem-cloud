<?php
namespace thans\filesystem\traits;

trait Storage
{
    public function getUrl(string $path)
    {
        return isset($this->config['url']) && $this->config['url'] ? $this->config['url'].DIRECTORY_SEPARATOR.$path : $path;
    }
}