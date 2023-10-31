const Witness = require("./witness.js");

class Crime {
  constructor(victim, ...suspects) {
    this.victim = victim;
    this.suspects = suspects;

    // if (suspects.length > 3) {
    // this.witness = this.suspects[this.suspects.length - 1];
    // }

    // this.witness = witness;

    this.suspects.forEach((suspect, index) => {
      if (suspect instanceof Witness) {
        this.witness = suspects[index];
        this.suspects.pop(index);
      }
    });
  }
}

module.exports = Crime;
