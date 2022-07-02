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
		$form->setTitle("$PName Stats");
	  $kills = $this->plugin->getData()->getKills($p);
	  $deaths = $this->plugin->getData()->getDeaths($p);
	  $wins = $this->plugin->getData()->getWins($p);
    $loses = $this->plugin->getData()->getLoses($p);
		$stats = 
		  "§a$PName §fStats\n\n".
			"§f Kills: §a$kills\n".
			"§f Deaths: §a$deaths\n".
			"§f Wins: §a$wins\n".
      "§f Loses: §a$loses\n\n".
			"\n\n"
		;
		$form->setContent($stats);
		$form->sendToPlayer($p);
		return $form;
 }
}
