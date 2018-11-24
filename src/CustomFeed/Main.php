<?php
/**
 * Created by PhpStorm.
 * User: xZolpha
 * Date: 24-Nov-18
 * Time: 11:27 AM
 */

namespace CustomFeed;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmime\Player;
use pocketmine\utils\TextFormat;

class Main extends PluginCommand{

	public $plugin;

	public function __construct(string $name, Loader $plugin){
		parent::__construct($name, $plugin);
		$this->plugin = $plugin;
		$this->setDescription("Feed yourself");
	}
	public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
		if(!$sender instanceof Player) return false;
		if(!$sender->hasPermission("valion.feed")){
			$sender->sendMessage(TextFormat::RED . "How dare you use this command without permission!");
			return false;
		}
		$sender->setFood(20);
		$sender->setSaturation(20);
		$sender->sendMessage(TextFormat . "You've been fed!");
		return true;
	}
}