<?php

declare(strict_types=1);

namespace TDDetective\CrimeScene;

final class Crime
{
    /** @var Suspect[] */
    public readonly array $suspects;

    public function __construct(
        public readonly Victim $victim,
        Suspect ...$suspects,
    ) {
        $this->suspects = $suspects;
    }
}
