<?php
namespace Phooty\Plugins;

use Evenement\EventEmitterInterface;
use Phooty\Actions\Action;
use Phooty\Actions\PlayerAction;
use Phooty\Plugins\RoboDennis\Commentate;
use Phooty\Plugins\RoboDennis\GetMessage;
use Symfony\Component\Console\Output\OutputInterface;

class RoboDennisPlugin implements Plugin
{
    private GetMessage $getMessage;

    public function __construct(
        private Commentate $commentate
    ) {
        $this->getMessage = new GetMessage();
    }

    private function handlePlayerAction(PlayerAction $playerAction)
    {
        $message = $this->getMessage->forPlayerAction($playerAction);
        !$message ?: $this->commentate->say($message);
    }

    private function handleAction(Action $action)
    {
        if (null === $action->type()) {
            return;
        }
        if ($action instanceof PlayerAction) {
            // Handle player action
            return $this->handlePlayerAction($action);
        }

        if ($type = $action->type() === 'stoppage') {
            $this->commentate->say('The umpire will come in and ball it up.');
        }
    }

    public function register(EventEmitterInterface $emitter)
    {
        $emitter->on(
            'action',
            fn(Action $action) => $this->handleAction($action)
        );
    }

}
