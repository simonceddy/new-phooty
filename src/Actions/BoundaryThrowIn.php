<?php
namespace Phooty\Actions;

class BoundaryThrowIn implements Action
{
    use Support\EmptyAction;

    public function type():string
    {
        return 'throwIn';
    }

    public function duration(): int
    {
        return 1500;
    }
}
