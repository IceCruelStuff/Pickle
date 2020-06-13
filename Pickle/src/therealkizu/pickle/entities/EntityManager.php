<?php

/**
 * Pickle (c) 2020
 * This project is licensed under GNU LESSER GENERAL PUBLIC LICENSE v3.0
 * It is free to use, and copyright free.
 *
 * @author TheRealKizu
 */

declare(strict_types=1);

namespace therealkizu\pickle\entities;

use pocketmine\entity\Entity;
use pocketmine\Player;

class EntityManager {

    /** @var EntityManager $entities */
    private static $entities;

    public function __construct() {
        self::$entities = $this;
    }

    public static function getEntities(): self {
        return self::$entities;
    }

    /**
     * This spawns the soccer ball
     *
     * @param Player $player
     */
    public function spawnSoccerBall(Player $player): void {
        $level = $player->getLevel();
        $ballNBT = Entity::createBaseNBT($player, null, $player->getYaw(), $player->getPitch());
        $soccerBall = new SoccerBall($level, $ballNBT);
        $soccerBall->setScale(1.3);
        $soccerBall->spawnToAll();
    }

}