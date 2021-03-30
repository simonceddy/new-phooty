<?php
namespace Phooty\Events;

use Phooty\Actions\Action;
use Phooty\Entities\TeamPlayer;

class ActionEvent
{
    public function __invoke(Action $action)
    {
        echo PHP_EOL . "Emitted action: {$action->type()}";
    }
}
