<?php
namespace Src\shared\domain\event;

use Src\domain\Event;
use Src\domain\EventListner;

class EventPublisher 
{
    private array $listners = [];

    public function addListner(EventListner $listner): void
    {
        $this->listners[] = $listner;
    }

    public function publish(Event $event)
    {
        foreach ($this->listners as $listner) {
            $listner->execEvent($event);
        }
    }       
}