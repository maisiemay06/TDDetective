class Detective {
  solve(crime) {
    const { suspects, victim, witness } = crime;

    if (suspects.length === 1) return crime.suspects[0];
    else {
      for (let index = 0; index < suspects.length; index++) {
        const suspect = suspects[index];
        if (suspect.weapon === victim.weapon && suspect.location === victim.location) {
          console.log(witness);
          if (!witness) return suspect;
          else if (witness.suspect === suspect) return suspect;
        }
      }
    }
  }
}

module.exports = Detective;
