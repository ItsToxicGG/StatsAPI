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
	  $kills = $this->plugin->getData()->getKills($p);
	  $online = $this->getOnlinePlayer($p);
	  $stats = 
		  "§aStatus: $online\n\n".
		  "§aCurrently on: §fLobby\n". // Todo
		  "§aKills: §f$kills\n".
                  "§aDeaths: §f$deaths\n".
                  "§aK/DR: §f$kdr\n".
                  "§aCredits: §f$credits\n".
                  "§aLevel: §f$level\n".
	          "§aXP: §f$xp\n\n".	  
		  
			"\n\n"
		;
		$form->setContent($stats);
		$form->sendToPlayer($p);
		return $form;
 }
}
