# FreeAPI
API - Save Kills, Wins, Deathes and loses with Built In Stats Menu
# Features
- SetAble Provider (mysql & yaml) (sqlite soon!)
- StatsForm & Command
- API
- Customisable
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
     $this->freeapi->getData()->addKill($player, 1);
     $this->freeapi->getData()->addWin($player, 1);
     $this->freeapi->getData()->addDeath($player, 1);
     $this->freeapi->getData()->addLose($player, 1);     
  }
// u can do the same with getting kills, wins, loses and deathes but just add get not add
  public function HowToGet(Player $player){
     $this->freeapi->getData()->getKills($player, 1);
     $this->freeapi->getData()->getWins($player, 1);
     $this->freeapi->getData()->getDeaths($player, 1);
     $this->freeapi->getData()->getLoses($player, 1);  
  }
  
```
# Example
```php
/** @var Main */
public $plugin;

public function __construct(Main $plugin){
    $this->plugin = $plugin;
}

// Example =
public function teamwin(Player $player){
    $player->sendTitle("Ur team Won");
    $this->phase = 3;
    $this->plugin->freeapi->getData()->addWins($player, 1);
}
``
