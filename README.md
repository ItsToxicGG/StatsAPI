# FreeAPI
API - Save Kills, Wins, Deathes and loses with Built In Stats Menu
# Version
U Currently in the version/branch which does not support Mysql, if u do want mysql, it will be comming soon!
# API
- How to use in ur minigame plugin!
```php
<?php
// Step 1

namespace YourMiniGamePlugin\Whatever{

use pocketmine\plugin\PluginBase;
use ItsToxicGG\Main as FreeAPI;

class Main extends PluginBase {
// step 2
  /** @var FreeAPI */	
  public $freeapi;
// step 3
  protected function onEnable(): void{
     $this->freeapi = $this->getServer()->getPluginManager()->getPlugin("FreeAPI");
  }
// letz begin with how to add kills, wins, loses, deathes
  public function HowToAdd(Player $player){
     $this->freeapi->getStats()->addKills($player, 1);
     $this->freeapi->getStats()->addWins($player, 1);
     $this->freeapi->getStats()->addDeaths($player, 1);
     $this->freeapi->getStats()->addLoses($player, 1);     
  }
// u can do the same with getting kills, wins, loses and deathes but just add get not add
  public function HowToGet(Player $player){
     $this->freeapi->getStats()->getKills($player, 1);
     $this->freeapi->getStats()->getWins($player, 1);
     $this->freeapi->getStats()->getDeaths($player, 1);
     $this->freeapi->getStats()->getLoses($player, 1);  
  }
  
```
