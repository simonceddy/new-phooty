<?php
namespace Phooty\Entities;

use Phooty\Geometry\Movable;

interface Footy extends Movable
{
    /**
     * Sets the player in possession as $player.
     *
     * @param Player $player
     *
     * @return void
     */
    public function gain(Player $player);

    /**
     * Set the footy as loose, removing the current player in possession.
     *
     * @return void
     */
    public function loose();

    /**
     * Check if the footy is loose.
     *
     * @return bool
     */
    public function isLoose();

    /**
     * Get the current player in possession, if any.
     * 
     * Can return null if loose.
     *
     * @return Player|null
     */
    public function heldBy();
}
