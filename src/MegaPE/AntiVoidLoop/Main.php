<?php

namespace MegaPE\AntiVoidLoop;

use pocketmine\entity\Entity;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;

class Main extends PluginBase implements Listener{
    private $x;
    private $y;
    private $z;
    private $startingHeight;
    
    public function onEnable(){
        $this->saveDefaultConfig();
        $this->reloadConfig();
        
        $config = $this->getConfig();
        $this->x = $config->get("x");
        $this->y = $config->get("y");
        $this->z = $config->get("z");
        $this->startingHeight = $config->get("starting-height");
    }
    
    public function onDisable(){
    $this->saveConfig();
    }
    
    public function onVoidLoop(PlayerMoveEvent $event){
        $player = $event->getPlayer();
        $level = $player->getLevel();
        
        if($player->getY() <= $this->startingHeight){
            $spawn = new Position($this->x,$this->y,$this->z,$level);
            $player->teleport($spawn);
        }
    }
}
