<?php

namespace megasamninja\AntiVoidLoop;

class Main extends PluginBase{

    public function onEnable(){
        MainLogger::getLogger()->info(TextFormat::LIGHT_PURPLE."AntiVoidLoop loaded.");
    }

    public function onDisable(){
        $this->getLogger()->info("AntiVoidLoop has been disabled.");
    }
}
