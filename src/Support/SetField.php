<?php
namespace Phooty\Support;

use Phooty\MatchConfiguration;

class SetField
{
    public function __construct(
        private array $positions,
        private array $matchUps
    ) {
        
    }

    public function prepare(MatchConfiguration $match)
    {
        [$width, $length] = $match->field()->dimensions();

        $lines = count($this->positions);

        $posPerLine = count($this->positions[0]) + 1;

        $gridW = (int) round($width / $posPerLine);
        $gridL = (int) round($length / $lines);

        $padL = $length - ($gridL * $lines);
        $padW = $width - ($gridW * 4);

        // $padL === 0 ?: $gridL += $padL / 2;
        // $padW === 0 ?: $gridW += $padW / 2;

        [$homePlayers, $awayPlayers] = $match->allPlayers();

        foreach ($this->positions as $lineNo => $line) {
            $positions = array_keys($line);
            foreach ($positions as $index => $pos) {
                if (is_callable($line[$pos])) {
                    [$x, $y] = call_user_func($line[$pos], $width, $length);
                } else {
                    $x = $gridW + ($index * $gridW);
                    $y = $gridL + ($lineNo * $gridL);
                }

                $match->field()->at(
                    $x,
                    $y,
                    [
                        $homePlayers[$pos],
                        $awayPlayers[$this->matchUps[$pos]]
                    ]
                );
            }
        }
    }
}
