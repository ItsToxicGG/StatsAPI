<?php
namespace ItsToxicGG;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use ItsToxicGG\Data;

class Main extends PluginBase {
  
  /** @var Data */
  public static $data;
   
  public function onEnable(): void{
      $this->getLogger()->info("Enabled !");
      $this->data = new Data($this);
  }
  
  public static function getData(): Data{
      return $this->data; 
  }
}
