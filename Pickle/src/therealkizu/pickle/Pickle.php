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

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Pickle extends PluginBase {

    /** @var Config $config */
    public $config;

    public function onLoad() {
        if (!is_dir($this->getDataFolder())) {
            @mkdir($this->getDataFolder());
        }

        if (!is_file($this->getDataFolder() . "config.yml")) {
            $this->saveResource("config.yml");
        }
    }

    public function onEnable() {
        $this->getLogger()->info("Pickle is now enabled!");

        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);

        $this->checkLanguages($this->config);
    }

    /**
     * This checks what language the plugin will be using.
     *
     * @param Config $config
     * @return void
     */
    public function checkLanguages(Config $config): void {
        if (!is_dir($this->getDataFolder() . "languages/")) {
            @mkdir($this->getDataFolder() . "languages/");
        }

        $language = $config->get("language", "en_US");
        //TODO: Finish this.
    }

}