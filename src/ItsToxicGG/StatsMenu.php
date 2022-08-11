<?php

namespace ItsToxicGG;

use Vecnavium\FormsUI\SimpleForm;
use pocketmine\player\Player;
use ItsToxicGG\Main;

class StatsMenu {
  
 /** @var Main */ 
 public $plugin;
  
 public function __construct(Main $plugin){ 
     $this->plugin = $plugin;
 }  
   
 public function StatsMenu(Player $p){
	    $form = new SimpleForm(function(Player $p, int $data = null){
		    $result = $data;
		    if($result === null){
			    return true;
		    }
		});
	  $PName = $p->getName();
          $form->setTitle("Stats: $PName");
	  if($this->getConfig()->get("provider") === "yaml" or "defualt"){
	      $kills = $this->plugin->getDefualtProvider()->getKills($p);
              $deaths = $this->plugin->getDefualtProvider()->getWins($p);
	      $wins = $this->plugin->getDefualtProvider()->getWins($p);
	  }
	  $stats = 
		  "§aStatus: $online\n\n".
		  "§aCurrently on: §fLobby\n". // Todo
		  "§aKills: §f$kills\n".
                  "§aDeaths: §f$deaths\n".
		  "§aWins: §f$wins\n"
			"\n\n"
		;
		$form->setContent($stats);
		$form->sendToPlayer($p);
		return $form;
 }
}
