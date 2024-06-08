<?php

namespace App\EventSubscriber;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class RequestLoggerSubscriber implements EventSubscriberInterface {
    private $logger;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public static function getSubscribedEvents() {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }

    public function onKernelRequest(RequestEvent $event) {
        $request = $event->getRequest();
        $message = sprintf(
            'New request: %s %s',
            $request->getMethod(),
            $request->getRequestUri()
        );

        $this->logger->info($message);
    }
}
