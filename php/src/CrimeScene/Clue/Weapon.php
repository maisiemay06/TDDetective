<?php

declare(strict_types=1);

namespace TDDetective\CrimeScene\Clue;

final class Weapon
{
    public function __construct(
        public readonly string $name,
    ) {
    }
}
