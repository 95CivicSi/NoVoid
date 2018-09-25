<?php

namespace TheBurritoDevs\NoVoid;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;

class NoVoid extends PluginBase implements Listener {

	public function onEnable() {
		$this->getLogger()->info("");
		$this->getLogger()->info("---");
		$this->getLogger()->info("PLUGIN: EasyJobs");
		$this->getLogger()->info("AUTHOR: TheBurritoDev's, known as BaconOFBurger.");
		$this->getLogger()->info("---");
		$this->getLogger()->info("");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveDefaultConfig();
		$this->reloadConfig();
	}

	public function onMove(PlayerMoveEvent $event) {
		$player = $event->getPlayer();
		if ($player->getY() < -2) {
			$player->teleport($player->getLevel()->getSafeSpawn());
			$player->sendPopup(C::RED . C::BOLD . "You fell in void, teleporting back to spawn");
			return true;
		}
	}
}
