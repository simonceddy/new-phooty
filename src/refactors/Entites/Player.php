<?php
namespace RePhooty\Entites;

class Player implements ObservableEntity
{
    /**
     * Array of observers
     * 
     * @var \SplObserver[] $observers
     */
    private array $observers = [];

    public function attach(\SplObserver $observer)
    {
        $h = spl_object_hash($observer);
        $this->observers[$h] = $observer;
    }

    public function detach(\SplObserver $observer)
    {
        $h = spl_object_hash($observer);
        unset($this->observers[$h]);
    }

    public function notify()
    {
        foreach ($this->observers as $o) {
            $o->update($this);
        }
    }
}
