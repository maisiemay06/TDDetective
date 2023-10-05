class Crime {
    constructor(victim, ...suspects) {
        this.victim = victim;
        this.suspects = suspects;
    }
}

module.exports = Crime;