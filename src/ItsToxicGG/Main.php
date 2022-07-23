<?php
namespace ItsToxicGG;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use ItsToxicGG\provider\{Provider, DefualtProvider, Database\MysqlProvider};

class Main extends PluginBase {
  
  /** @var MysqlProvider */
  public static $mysqlpv;
	
  /** @var DefualtProvider */
  public static $defualt;
  
  /** @var Main */
  private static $instance;
	
  /** @var Provider */
  private $provider;  
  
  public function onLoad(): void{
     self::$instance = $this;  
  }
   
  public function onEnable(): void{
      $this->getLogger()->info("Enabled !");
      $this->defualt = new DefualtProvider();
      $this->mysqlpv = new MysqlProvider();
      $this->provider = new Provider();
  }
  
  public static function getInstance(): Main{
      return $this->instance; 
  }
  
  public static function getMysqlProvider(): MysqlProvider{ // get mysql provider
      return $this->mysqlpv; 
  }
	
  public static function getDefualtProvider(): DefualtProvider{ // get yaml/defualt provider
      return $this->defualt; 
  }
    
  public function getProvider(): Provider{ // get defualt or mysql provider by using example: $main->getProvider()->getMysql()->getKills($player); example end
       return $this->provider;
  }
	
	private function setProvider(): void{ // this is just a test mysql comming soon - Toxic
		$providerName = $this->getConfig()->get("data-provider");
		$provider = null;
		switch(strtolower($providerName)){
			case "defualt":
				$provider = new DefualtProvider();
				$this->getLogger()->notice("YamlProvider/DefualtProvider successfully enabled.");
				break;
				
			case "yaml":
				$provider = new DefualtProvider();
                                $this->getLogger()->notice("YamlProvider/DefualtProvider successfully enabled.");				
				break;
				
			case "mysql":
			   $provider = new MysqlProvider();
			   $this->getLogger()->notice("MysqlProvider successfully enabled.");
			   break;
				
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
