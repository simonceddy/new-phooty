<?php
namespace Phooty\Actions;

class BallUp implements Action
{
    use Support\EmptyAction;

    public function duration(): int
    {
        return 800;
    }

    public function type(): string
    {
        return 'ballUp';
    }
}
