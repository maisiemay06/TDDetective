<?php

declare(strict_types=1);

namespace TDDetective\CrimeScene;

use TDDetective\CrimeScene\Clue\Location;
use TDDetective\CrimeScene\Clue\Weapon;

final class Suspect
{
    /** @var Location[] */
    private array $locations = [];

    /** @var Weapon[] */
    private array $weapons = [];

    public function __construct(
        public readonly string $name,
    ) {
    }

    public function seenHolding(Weapon $weapon): void
    {
        $this->weapons[] = $weapon;
    }

    public function seenIn(Location $location): void
    {
        $this->locations[] = $location;
    }

    public function checkReports(): array
    {
        return [
            'locations' => $this->locations,
            'weapons' => $this->weapons,
        ];
    }
}
