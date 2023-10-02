<?php

declare(strict_types=1);

namespace TDDetective\CrimeScene\Clue;

final class Location
{
    public function __construct(
        public readonly string $name,
    ) {
    }
}
