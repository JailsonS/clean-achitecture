<?php
namespace Src\domain;

abstract class EventListner
{   
    public function execEvent(Event $event)
    {
        if($this->hasExecEvent($event)) {
            $this->reactTo($event);
        }
    }

    abstract public function hasExecEvent(Event $event): bool;
    abstract public function reactTo(Event $event): void;
}