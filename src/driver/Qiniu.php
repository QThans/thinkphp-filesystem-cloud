<?php

namespace thans\filesystem\driver;

use League\Flysystem\AdapterInterface;
use Liz\Flysystem\QiNiu\QiNiuOssAdapter;
use think\filesystem\Driver;

class Qiniu extends Driver
{
    protected function createAdapter(): AdapterInterface
    {
        $qiniu = new QiNiuOssAdapter($this->config['accessKey'], $this->config['secretKey'],
            $this->config['bucket'], $this->config['cdnHost']);

        return $qiniu;
    }
}