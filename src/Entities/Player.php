<?php
namespace Phooty\Entities;

interface Player
{
    /**
     * Return the players full name either as an array or a string.
     * 
     * By default an array must be returned containing [firstname, surname].
     *
     * @param bool $asString If true the method should return a string
     *
     * @return array|string
     */
    public function name(bool $asString = false);

    /**
     * Returns the players position as a Position object. May return false if
     * no position is set.
     *
     * @return Position|bool
     */
    public function position();

    /**
     * Assigns a position to an existing Player. Should return a new instance
     * with appropriate constructor arguments.
     *
     * @param Position $position
     *
     * @return Player
     */
    public function assignPos(Position $position): Player;

    /**
     * Returns the TeamData the player is assigned to. May return false is the
     * player does not have a team.
     *
     * @return TeamData|bool
     */
    public function team();
}
