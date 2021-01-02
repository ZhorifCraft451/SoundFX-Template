<?php

namespace Sound;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

use pocketmine\utils\TextFormat;

use pocketmine\network\mcpe\protcol\LevelEventPacket;
use pocketmine\network\mcpe\protcol\LevelSoundEventPacket;

class Main extends PluginBase implements {

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{

		switch($cmd->getName()){
			case "test":
			    if($sender instanceof Player){

			    	if(count($args) == 1){

			    		if($args[0] == 1){
			    			$volume = mt_rand();
			    			$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
			    		
			    		}

			    		if($args[0] == 2){
			    			$volume = mt_rand();
			    			$sender->getLevel()->broadcastLevelSoundEvent($sender, LevelSoundEventPacket::SOUND_LEVELUP, (int) $volume);
			    		}

			    	}
			    }
			break;
		}
	}
}