const Suspect = require("./the_crime_scene/suspect.js");
const Victim = require("./the_crime_scene/victim.js");
const Crime = require("./the_crime_scene/crime.js");
const Detective = require("./detective.js");
const Witness = require("./the_crime_scene/witness.js");

test("The case with only one suspect", () => {
  let fryingPan = "frying pan";
  let clockTower = "clock tower";

  let victim = new Victim(fryingPan, clockTower);

  let professorPan = new Suspect("Professor Pan");
  professorPan.seenHolding(fryingPan);
  professorPan.seenIn(clockTower);

  let crime = new Crime(victim, professorPan);

  let detective = new Detective();

  expect(professorPan).toBe(detective.solve(crime));
});

test("The case with two suspects in the same location", () => {
  let fryingPan = "frying pan";
  let clockTower = "clock tower";

  let victim = new Victim(fryingPan, clockTower);

  let professorPan = new Suspect("Professor Pan");
  professorPan.seenHolding(fryingPan);
  professorPan.seenIn(clockTower);

  let captainCustard = new Suspect("Captain Custard");
  captainCustard.seenIn(clockTower);

  let crime = new Crime(victim, professorPan, captainCustard);

  let detective = new Detective();

  expect(professorPan).toBe(detective.solve(crime));
});

test("The case where three suspects held the murder weapon", () => {
  let saucePan = "sauce pan";
  let cafe = "cafe";

  let victim = new Victim(saucePan, cafe);

  let professorPan = new Suspect("Professor Pan");
  professorPan.seenHolding(saucePan);
  professorPan.seenIn("clock tower");

  let sergeantSaucepan = new Suspect("Sergeant Saucepan");
  sergeantSaucepan.seenHolding(saucePan);
  sergeantSaucepan.seenIn(cafe);

  let wizardWok = new Suspect("Wizard Wok");
  wizardWok.seenHolding(saucePan);
  wizardWok.seenIn("observatory");

  let crime = new Crime(victim, professorPan, sergeantSaucepan, wizardWok);

  let detective = new Detective();

  expect(sergeantSaucepan).toBe(detective.solve(crime));
});

test("The case with a Witness", () => {
  let wok = "wok";
  let observatory = "observatory";

  let victim = new Victim(wok, observatory);

  let professorPan = new Suspect("Professor Pan");
  let sergeantSaucepan = new Suspect("Sergeant Saucepan");
  let wizardWok = new Suspect("Wizard Wok");

  let witness = new Witness(wizardWok.name, wok, observatory);

  let crime = new Crime(victim, professorPan, sergeantSaucepan, wizardWok, witness);

  let detective = new Detective();

  expect(wizardWok).toBe(detective.solve(crime));
});
