<?php

namespace ItsToxicGG;

use pocketmine\player\Player;
use ItsToxicGG\Main;

class DataProvider {
  
   /** @var Main */
   public $plugin;
  
   public function __construct(Main $plugin){
       $this->plugin = $plugin; 
   }
  
   public function addKill(Player $player){
        $name = $player->getName();
        $kills = new Config($this->plugin->getDataFolder() . "pdata/kills.yml", Config::YAML);
        $k = $kills->get($name);
        $kills->set($name, $k + 1);
        $kills->save();
   }
    
   public function getKills($player){
	      $name = $player->getName();	    
        $kills = new Config($this->plugin->getDataFolder() . "pdata/kills.yml", Config::YAML);
        if($player instanceof Player){
            return $kills->get($player->getName());
        } else {
            return $kills->get($name);
        }
    }	
	
    public function addWin(Player $player){
        $name = $player->getName();
        $wins = new Config($this->plugin->getDataFolder() . "pdata/wins.yml", Config::YAML);
        $w = $wins->get($name);
        $wins->set($name, $w + 1);
        $wins->save();
    }
    
    public function getWins($player){
	      $name = $player->getName();
        $wins = new Config($this->plugin->getDataFolder() . "pdata/wins.yml", Config::YAML);
        if($player instanceof Player){
            return $wins->get($player->getName());
        } else {
            return $wins->get($name);
        }
    }	
    
    public function addDeath(Player $player){
        $name = $player->getName();
        $deaths = new Config($this->plugin->getDataFolder() . "pdata/deaths.yml", Config::YAML);
        $d = $deaths->get($name);
        $deaths->set($name, $d + 1);
        $deaths->save();
    }
    
    public function getDeaths($player){
	      $name = $player->getName();    
        $deaths = new Config($this->plugin->getDataFolder() . "pdata/deaths.yml", Config::YAML);
        if($player instanceof Player){
            return $deaths->get($player->getName());
        } else {
            return $deaths->get($name);
        }
    }
  
    public function addLose(Player $player){
        $name = $player->getName();
        $deaths = new Config($this->plugin->getDataFolder() . "pdata/deaths.yml", Config::YAML);
        $d = $deaths->get($name);
        $deaths->set($name, $d + 1);
        $deaths->save();
    }
    
    public function getLoses($player){
	      $name = $player->getName();    
        $deaths = new Config($this->plugin->getDataFolder() . "pdata/deaths.yml", Config::YAML);
        if($player instanceof Player){
            return $deaths->get($player->getName());
        } else {
            return $deaths->get($name);
        }
    }    
}
