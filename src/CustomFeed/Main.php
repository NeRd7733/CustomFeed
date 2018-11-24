<?php
/**
 * Created by PhpStorm.
 * User: xZolpha
 * Date: 24-Nov-18
 * Time: 1:16pm
 */

namespace CustomFeed;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmime\Player;
use pocketmine\utils\TextFormat;

class Main extends PluginCommand{

	public $plugin;

	public function __construct(string $name, Main $plugin){
		parent::__construct($name, $plugin);
		$this->plugin = $plugin;
		$this->setDescription("Feed yourself");
	}
	public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
		if(!$sender instanceof Player) return false;
		if(!$sender->hasPermission("server.feed")){
			$sender->sendMessage(TextFormat::RED . "Sorry, you do not have permission to use this command - Plugin by Zolpha#0001");
			return false;
		}
		$sender->setFood(20);
		$sender->setSaturation(20);
		$sender->sendMessage(TextFormat::GREEN . "You have successfully beed fed - Plugin by Zolpha#0001");
		return true;
	}
}
