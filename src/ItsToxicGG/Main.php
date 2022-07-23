<?php
namespace ItsToxicGG;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use ItsToxicGG\Data;

class Main extends PluginBase {
  
  /** @var Data */
  public static $data;
  
	/** @var Main */
	private static $instance;
	
	/** @var Provider */
	private $provider;  
  
  public function onLoad(): void{
     self::$instance = $this;  
  }
   
  public function onEnable(): void{
      $this->getLogger()->info("Enabled !");
      $this->data = new Data($this);
      $this->provider = new Provider($this);
  }
  
  public static function getInstance(): Main{
      return $this->instance; 
  }
  
  public static function getData(): Data{
      return $this->data; 
  }
    
	public function getProvider(): Provider{
		return $this->provider;
	}
	
	private function setProvider(): void{ // this is just a test mysql comming soon - Toxic
		$providerName = $this->getConfig()->get("data-provider");
		$provider = null;
		switch(strtolower($providerName)){
			case "yaml":
				$provider = new YamlProvider();
				$this->getLogger()->notice("YamlProvider successfully enabled.");
				break;
//                        case "mysql": soon
//                           $provider = new MysqlProvider();
// 			  $this->getLogger()->notice("MysqlProvider successfully enabled.");        
//                            break;
			default:
				$this->getLogger()->error("Please set a valid data-provider in config.yml. Plugin Disabled");
				$this->getServer()->getPluginManager()->disablePlugin($this);
				break;
		}
		if($provider instanceof ProviderInterface){
			$this->provider = $provider;
		}
	}
}    
