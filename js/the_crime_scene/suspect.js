class Suspect {
    weapon = null;
    location = null;

    constructor(name) {
        this.name = name;
    }

    seenHolding(weapon) {
        this.weapon = weapon;
    }

    seenIn(location) {
        this.location = location;
    }
}

module.exports = Suspect;
