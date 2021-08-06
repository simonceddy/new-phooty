# PHOOTY

AFL sim written in PHP, because why not.

## Summary Of Project

I love footy and I love PHP, so combining them was almost neccessary.

I have been working on this project on and off for several years now. It's been refactored so much that I can't remember what it looked like at the start, but the result is basically always the same:

- A match settings object defines the parameters of the simulation,
- Entity objects for players and the sherrin are placed on a grid representing physical dimensions,
- The simulation runs inside a basic loop,
- A match clock object determines if the simulation has started, finished, or is running,
- A match state object is passed through the simulation loop where various processors determine what action is taking place, and how long the action takes,
- Entity positions on the grid are updated accordingly,
- The match state is updated accordingly,
- When the simulation loop has finished, a match result object is returned
- Extra processors/plugins can be added to the simulation to run additional tasks during each loop (e.g. providing expert commentary on each action from BT and DigitalDarce)

## Current State

Currently the simulation can:

- perform a basic simulation for a given clock duration
- output the result to console
- determine actions and their results by Player position and likely intended targets,
- keep several player stats including disposals, hitouts, marks and scores,
- turnovers can occur so possession chains can be broken,
- plugins can be added to the simulation, currently as event listeners

Currently phooty is being refactored again for something different. This usually happens when it becomes way too big, but this time will be different for sure.

Current limitations and missing features include:

- Player AI is very limited at present:
  - Entity movement is not currently implemented as I'm undecided how I want to go about it,
  - Subsequently, the targets of actions are currently decided by position only,
  - Awareness of surroundings is also limited to position,
  - This also means that turnovers can only give possession to a targets opponent, aka no help defense,
  - There is currently no awareness of match situation,
- Not all actions are properly implemented,
- The structure of Entities is a bit of a mess,
- The grid is rectangular, which we all know is ludicrous

## Requirements

Phooty requires at least PHP 8 because I use constructor property assignment on my whole life.

## Usage

Phooty can be run as command line app with the index.php file:

```sh
php your/path/to/phooty/index.php
```

This will bring up a Symfony/Console application with various options.

To run the simulation add the run command:

```sh
php your/path/to/phooty/index.php run
```

This will run a simulation with random teams and players and output the result to the console.

As is, the simulation also includes a RoboDennis commentator, who will provide insight into the action straight to the console while the simulation is running.
