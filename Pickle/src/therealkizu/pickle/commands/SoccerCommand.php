<?php

/**
 * Pickle (c) 2020
 * This project is licensed under GNU LESSER GENERAL PUBLIC LICENSE v3.0
 * It is free to use, and copyright free.
 *
 * @author TheRealKizu
 */

declare(strict_types=1);

namespace therealkizu\pickle\commands;

use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\plugin\Plugin;
use therealkizu\pickle\entities\EntityManager;
use therealkizu\pickle\Pickle;

class SoccerCommand extends Command implements PluginIdentifiableCommand {

    /** @var Pickle $pickle */
    private $pickle;

    public function __construct(Pickle $pickle, string $name, string $description = "", string $usageMessage = null, array $aliases = []) {
        $this->pickle = $pickle;
        parent::__construct($name, $description, $usageMessage, $aliases);
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     * @return mixed|void
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if (!$sender->hasPermission("pickle.cmd.soccer")) {
            $sender->sendMessage(Pickle::PICKLE_PREFIX . $this->pickle->utils->translateLang("no-permission"));
            return;
        }

        if (!$sender instanceof Player) {
            $sender->sendMessage(Pickle::PICKLE_PREFIX . $this->pickle->utils->translateLang("execute-ingame"));
            return;
        }

        EntityManager::getEntities()->spawnSoccerBall($sender);
        $sender->getLevel()->broadcastLevelSoundEvent($sender, LevelSoundEventPacket::SOUND_POP);
        $sender->sendMessage(Pickle::PICKLE_PREFIX . $this->pickle->utils->translateLang("spawned-soccerball"));
    }

    /**
     * @return Pickle|Plugin $pickle
     */
    public function getPlugin(): Plugin {
        return $this->pickle;
    }

}