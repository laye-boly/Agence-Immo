<?php
namespace App\Listeners;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent; 

class ResponseListener 
{ 
    const ROUTES_NOT_TO_CACHE = ['admin.immeuble.index', 'admin.immeuble.create', 'admin.immeuble.edit',
    'admin.immeuble.delete', 'admin.immeuble.search', 'admin.cite.index', 'admin.cite.create', 
    'admin.cite.edit', 'admin.cite.delete', 'admin.cite.search', 'admin.centre.index', 'admin.centre.create', 
    'admin.centre.edit', 'admin.centre.delete', 'admin.centre.search', 'admin.index'
    ];

    public function onKernelResponse(FilterResponseEvent $event)
    {
        if(in_array($event->getRequest()->attributes->get('_route'), self::ROUTES_NOT_TO_CACHE)) {
            $headers = $event->getResponse()->headers;

            $headers->set(
                'Cache-Control',
                'no-cache, no-store, max-age=0, must-revalidate'
            );
            $headers->set('Pragma', 'no-cache'); // HTTP 1.0. 
            $headers->set('Expires', '0'); 
            


        }
    }
}