<?php

namespace MegaPE\AntiVoidLoop;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    
    public function onVoidLoop(PlayerMoveEvent $event){
        if($event->getTo()->getFloorY() < 1){
            $event->setCancelled(true);
            $event->getPlayer()->teleport($this->getServer()->getDefaultLevel()->getSpawnLocation());
            $event->getPlayer()->sendMessage(TextFormat::AQUA . "You were saved from the deadly \"Void Lood\"");
        }
    }
}
