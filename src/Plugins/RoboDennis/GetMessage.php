<?php
namespace Phooty\Plugins\RoboDennis;

use Phooty\Actions\{Action, PlayerAction};
use Phooty\Entities\Player;
use Phooty\Util\Ray;

class GetMessage
{
    private array $playerComments;

    public function __construct()
    {
        $this->playerComments = include_once 'data/playerComments.php';
    }

    private function playerName(Player $player)
    {
        $names = $player->name();
        $names[] = $player->name(true);

        return Ray::randVal($names);
    }

    private function playerComment(
        string $message,
        PlayerAction $playerAction
    ) {
        return sprintf(
            $message,
            $this->playerName($playerAction->player())
        );
    }

    public function forAction(Action $action)
    {
        # code...
    }

    public function forPlayerAction(PlayerAction $playerAction)
    {
        $type = $playerAction->type();
        if (isset($this->playerComments[$type])) {
            return $this->playerComment(
                Ray::randVal($this->playerComments[$type]),
                $playerAction
            );
        }
        
        return false;
    }
}
