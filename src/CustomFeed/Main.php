<?php
/**
 * Created by PhpStorm.
 * User: Lockie#0001
 * Date: 24-Nov-18
 */

namespace CustomFeed;

use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as R;
use pocketmine\command\Command;

class Main extends PluginBase implements Listener{

	public function onEnable(): void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
		if(!$sender instanceof Player) return false;
		if(!$sender->hasPermission("valion.feed")){
			$sender->sendMessage(R::RED . "How dare you use this command without permission!");
			return false;
		}
		$sender->setFood(20);
		$sender->setSaturation(20);
		$sender->sendMessage(R::GREEN . "You've been fed!");
		return true;
	}
}
