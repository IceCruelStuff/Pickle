<?php

/**
 * Pickle (c) 2020
 * This project is licensed under GNU LESSER GENERAL PUBLIC LICENSE v3.0
 * It is free to use, and copyright free.
 *
 * @author EncatedLands
 */

declare(strict_types=1);

namespace therealkizu\pickle\items;

use pocketmine\Player;
use pocketmine\block\Block;
use pocketmine\math\Vector3; 
use pocketmine\item\Item;

class Boat extends Item {
  
	public function __construct($meta = 0){
		parent::__construct(self::BOAT, $meta, "Oak Boat");

		if ($this->meta === 1) {
		    $this->name = "Spruce Boat";
        } elseif ($this->meta === 2) {
		    $this->name = "Birch Boat";
        } elseif ($this->meta === 3) {
		    $this->name = "Jungle Boat";
        } elseif ($this->meta === 4) {
		    $this->name = "Acacia Boat";
        } elseif ($this->meta === 5) {
		    $this->name = "Dark Oak Boat";
        }
	}

	public function getFuelTime(): int {
		return 1200;
	}

	public function getMaxStackSize(): int {
		return 1;
	}

	public function onActivate(Player $player, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector): bool {
	    // TODO: Finish this
		return true;
	}

}