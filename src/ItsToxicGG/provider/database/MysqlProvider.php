<?php

namespace ItsToxicGG\provider\database;


use pocketmine\player\Player;
use ItsToxicGG\Main;
use mysqli;
use mysqli_result;

class MysqlProvider{

	private $plugin;

	public function __construct(Main $plugin)
	{
		$this->plugin = $plugin;
		$this->init();
	}

	public function init(){
		$this->getDatabase()->query("CREATE TABLE IF NOT EXISTS RolzzDev (
			PlayerName VARCHAR(255) PRIMARY KEY, Kill TEXT NOT NULL, Death TEXT NOT NULL, Kill TEXT NOT NULL, Death TEXT NOT NULL, KDR TEXT NOT NULL, Level TEXT NOT NULL, Xp TEXT NOT NULL, Win TEXT NOT NULL, Lose TEXT NOT NULL
			);");
	}

	public function getDatabase(){
		$config = $this->plugin->getConfig()->get("mysql");
		$koneksi =  new mysqli($config["ip"],$config["user"],$config["password"],$config["database"]);
		if($koneksi){	
		    return $koneksi;
		} else {
			Main::getInstance()->getLogger()->alert("Could connect mysql");
			return null;
		}
	}

	public function registerAccount(Player  $player){
		$playerName = $player->getName();
		$oke = $this->getDatabase();
		mysqli_query($oke,"INSERT INTO RolzzDev (PlayerName, Kill, Death, KDR, Level, Xp, Win, Lose)VALUES('$playerName', '0','0','0','0','0','')");
        $oke->close();
	}

	public function addscore(Player $player,$type){
	    $playerName = $player->getName();
		$oke = $this->getDatabase();
		$query = function() use ($oke){
			mysqli_query($oke,func_get_arg(0));
		};
		if($type == "kill"){
		    $query("UPDATE RolzzDev SET Kill = Kill + 1 WHERE PlayerName = '$playerName'");
		}
		if($type == "death"){
			$query("UPDATE RolzzDev SET Death = Death + 1 WHERE PlayerName = '$playerName'");
		}
		if($type == "kdr"){
			$query("UPDATE RolzzDev SET KDR = KDR + 1 WHERE PlayerName = '$playerName'");
		}
		if($type == "level"){
		    $query("UPDATE RolzzDev SET Level = Level + 1 WHERE PlayerName = '$playerName'");
		}
		if($type == "xp"){
			$query("UPDATE RolzzDev SET Xp = Xp + 1 WHERE PlayerName = '$playerName'");
		}
		if($type == "win"){
			$query("UPDATE RolzzDev SET Win = Win + 1 WHERE PlayerName = '$playerName'");
		}
		if($type == "loses"){
			$query("UPDATE RolzzDev SET Lose = Lose + 1 WHERE PlayerName = '$playerName'");
		}    
		$oke->close();
	}

	public function getAccount(Player $player): bool
    {
        $playerName = $player->getName();
		$oke = $this->getDatabase();
        $query = mysqli_query($oke,"SELECT * FROM RolzzDev WHERE PlayerName = '$playerName'");

        if ($query instanceof mysqli_result) {
            return isset($query->fetch_assoc()["PlayerName"]);
        }
        return $query;
	}
}
