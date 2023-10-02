<?php

declare(strict_types=1);

namespace TDDetective\Case;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use TDDetective\CrimeScene\Clue\Location;
use TDDetective\CrimeScene\Clue\Weapon;
use TDDetective\CrimeScene\Crime;
use TDDetective\CrimeScene\Suspect;
use TDDetective\CrimeScene\Victim;
use TDDetective\Detective;

#[CoversClass(Detective::class)]
#[UsesClass(Victim::class), UsesClass(Suspect::class)]
#[UsesClass(Weapon::class), UsesClass(Victim::class)]
class DetectiveTest extends TestCase
{
    #[Test]
    #[TestDox('This should be easy.')]
    public function theCaseWithOnlyOneSuspect(): void
    {
        $fryingPan = new Weapon('frying pan');
        $clockTower = new Location('clock tower');

        $professorPan = new Suspect('Professor Pan');
        $professorPan->seenHolding($fryingPan);
        $professorPan->seenIn($clockTower);

        $crime = new Crime(
            new Victim($fryingPan, $clockTower),
            $professorPan
        );

        $whoDunnit = (new Detective())->solve($crime);

        self::assertSame($professorPan, $whoDunnit);
    }

    #[Test]
    #[TestDox('It was them I swear!')]
    public function theCaseWithTwoSuspectsInTheSameLocation(): void
    {
        $fryingPan = new Weapon('frying pan');
        $clockTower = new Location('clock tower');

        $professorPan = new Suspect('Professor Pan');
        $professorPan->seenHolding($fryingPan);
        $professorPan->seenIn($clockTower);

        $captainCustard = new Suspect('Captain Custard');
        $captainCustard->seenIn($clockTower);

        $crime = new Crime(
            new Victim($fryingPan, $clockTower),
            $professorPan,
            $captainCustard
        );

        $whoDunnit = (new Detective())->solve($crime);

        self::assertSame($professorPan, $whoDunnit);
    }

    #[Test]
    #[TestDox('They like to share.')]
    public function theCaseWhereThreeSuspectsHeldTheMurderWeapon(): void
    {
        $saucePan = new Weapon('sauce pan');
        $cafe = new Location('cafe');

        $professorPan = new Suspect('Professor Pan');
        $professorPan->seenHolding($saucePan);
        $professorPan->seenIn(new Location('clock tower'));

        $sergeantSaucepan = new Suspect('Sergeant Saucepan');
        $sergeantSaucepan->seenHolding($saucePan);
        $sergeantSaucepan->seenIn($cafe);

        $wizardWok = new Suspect('Wizard Wok');
        $wizardWok->seenHolding($saucePan);
        $wizardWok->seenIn(new Location('observatory'));

        $crime = new Crime(
            new Victim($saucePan, $cafe),
            $professorPan,
            $sergeantSaucepan,
            $wizardWok
        );

        $whoDunnit = (new Detective())->solve($crime);

        self::assertSame($sergeantSaucepan, $whoDunnit);
    }

    #[Test]
    #[TestDox('The detective will only be able to solve this with the help of a witness')]
    public function theCaseWithAWitness(): void
    {
        $bowl = new Weapon('a bowl of custard');
        $clockTower = new Location('clock tower');

        $professorPan = new Suspect('Professor Pan');
        $sergeantSaucepan = new Suspect('Sergeant Saucepan');
        $wizardWok = new Suspect('Wizard Wok');
        $captainCustard = new Suspect('Captain Custard');

        $witness = new Witness($captainCustard, $bowl, $clockTower);

        $crime = new Crime(
            new Victim($bowl, $clockTower),
            $professorPan,
            $sergeantSaucepan,
            $wizardWok,
            $witness
        );

        $whoDunnit = (new Detective())->solve($crime);

        self::assertSame($professorPan, $whoDunnit);
    }
}
