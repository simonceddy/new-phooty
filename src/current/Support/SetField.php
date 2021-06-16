<?php
namespace Phooty\Support;

use Phooty\Entities\Team;
use Phooty\Geometry\PlayingField;

class SetField
{
    public function __construct(
        private array $positions,
        private MatchUp $matchUp
    ) {}

    /**
     * Place Player entities at initial positions on the playing field
     *
     * @param Team $homeTeam
     * @param Team $awayTeam
     * @param PlayingField $field
     *
     * @return PlayingField
     */
    public function prepare(
        Team $homeTeam, Team $awayTeam, PlayingField $field
    ) {
        [$width, $length] = $field->dimensions();


        $lines = count($this->positions);

        $posPerLine = count($this->positions[0]) + 1;

        $gridW = (int) round($width / $posPerLine);
        $gridL = (int) round($length / $lines);

        $padL = $length - ($gridL * $lines);
        $padW = $width - ($gridW * 4);

        // $padL === 0 ?: $gridL += $padL / 2;
        // $padW === 0 ?: $gridW += $padW / 2;

        $homePlayers = $homeTeam->players();
        $awayPlayers = $awayTeam->players();

        // TODO tidy
        foreach ($this->positions as $lineNo => $line) {
            $positions = array_keys($line);
            foreach ($positions as $index => $pos) {
                if (is_callable($line[$pos])) {
                    [$x, $y] = call_user_func($line[$pos], $width, $length);
                } else {
                    $x = $gridW + ($index * $gridW);
                    $y = $gridL + ($lineNo * $gridL);
                }

                $field->at($x, $y, [
                    $homePlayers[$pos],
                    $awayPlayers[$this->matchUp->resolve($pos)]
                ]);
            }
        }

        return $field;
    }
}
