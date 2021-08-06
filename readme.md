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
