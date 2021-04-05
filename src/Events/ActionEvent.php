<?php
namespace Phooty\Events;

use Phooty\Actions\Action;
use Phooty\Actions\PlayerAction;
use Phooty\Data\Scoreboard;

class ActionEvent
{
    public function __construct(private Scoreboard $scoreboard)
    {}

    public function __invoke(Action $action)
    {
        $type = $action->type();
        echo PHP_EOL . "Emitted action: {$type}";

        if ($type === 'goal' && $action instanceof PlayerAction) {
            $this->scoreboard->goal($action->player());
        }
        if ($type === 'behind' && $action instanceof PlayerAction) {
            $this->scoreboard->behind($action->player());
        }
    }
}
