<?php

/**
 * Pickle (c) 2020
 * This project is licensed under GNU LESSER GENERAL PUBLIC LICENSE v3.0
 * It is free to use, and copyright free.
 *
 * @author TheRealKizu
 */

declare(strict_types=1);

namespace therealkizu\pickle;

use pocketmine\entity\Entity;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use therealkizu\pickle\commands\SoccerCommand;
use therealkizu\pickle\entities\SoccerBall;
use therealkizu\pickle\items\ItemManager;
use therealkizu\pickle\utils\Utils;

class Pickle extends PluginBase {

    public const PICKLE_PREFIX = "§l§aPIC§bKLE §r§6| ";

    /** @var Config $config */
    public $config;
    /** @var Config $lang */
    public $lang;
    /** @var Utils $utils */
    public $utils;

    public function onLoad() {
        if (!is_dir($this->getDataFolder())) {
            @mkdir($this->getDataFolder());
        }

        if (!is_dir($this->getDataFolder() . "languages/")) {
            @mkdir($this->getDataFolder() . "languages/");
        }

        if (!is_file($this->getDataFolder() . "config.yml")) {
            $this->saveResource("config.yml");
        }
    }

    public function onEnable() {
        $this->getLogger()->info("Pickle is now enabled!");
        $this->getLogger()->info("Pickle is licensed under LGPL-3.0");

        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        $this->utils = new Utils($this);

        $this->registerCommands();
        $this->registerEntities();
        $this->registerManagers();
    }

    /**
     * This registers every custom command on the plugin
     *
     * @return void
     */
    public function registerCommands(): void {
        $this->getServer()->getCommandMap()->registerAll("Pickle", [
           new SoccerCommand($this, "soccer", "Summon a soccer ball!")
        ]);
    }

    /**
     * This registers every custom entity on the plugin
     *
     * @return void
     */
    public function registerEntities(): void {
        Entity::registerEntity(SoccerBall::class, true);
    }

    /**
     * This registers the Block, Item Managers
     *
     * @return void
     */
    public function registerManagers(): void {
        new ItemManager();
    }

}
