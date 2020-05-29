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

use pocketmine\entity\Creature;

class SoccerBall extends Creature {

    const NETWORK_ID = 42;

    /** @var float $height */
    public $height = 1.01;
    /** @var float $width */
    public $width = 1.01;

    public function getName(): string {
        return "Soccer Ball";
    }

}