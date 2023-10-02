<?php

declare(strict_types=1);

namespace TDDetective\CrimeScene;

use TDDetective\CrimeScene\Clue\Location;
use TDDetective\CrimeScene\Clue\Weapon;

final class Victim
{
    public function __construct(
        public readonly Weapon $killedBy,
        public readonly Location $in
    ) {
    }
}
