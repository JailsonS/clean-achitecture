<?php
namespace Src\shared\domain\event;

abstract class EventListner
{   
    public function execEvent(Event $event)
    {
        # verifica se a classe filha pode executar o evento
        if($this->hasExecEvent($event)) {
            $this->reactTo($event);
        }
    }

    abstract public function hasExecEvent(Event $event): bool;
    abstract public function reactTo(Event $event): void;
}