<?php

namespace refaltor\coppervanillamods;

use pocketmine\plugin\PluginBase;
use refaltor\coppervanillamods\listeners\ListenerManager;

class Main extends PluginBase
{
    private static ?self $instance = null;
    public string $file;

    protected function onLoad(): void
    {
        self::$instance = $this;
        $this->file = $this->getFile();
    }

    protected function onEnable(): void
    {
        (new ListenerManager())->init();
    }


    public static function getInstance(): self {return self::$instance;}
}