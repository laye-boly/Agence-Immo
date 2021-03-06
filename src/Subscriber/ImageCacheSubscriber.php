<?php

namespace App\Subscriber;

use App\Entity\Image;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;
use Doctrine\ORM\Events;

class ImageCacheSubscriber implements EventSubscriber
{

    /**
     * @var CacheManager
     */
    private $cacheManager;

    /**
     * @var UploaderHelper
     */
    private $uploaderHelper;

    public function __construct(CacheManager $cacheManager, UploaderHelper $uploaderHelper)
    {
        $this->cacheManager = $cacheManager;
        $this->uploaderHelper = $uploaderHelper;
    }

    public function getSubscribedEvents()
    {
        return [
            Events::preRemove,
            Events::preUpdate
        ];
    }

    public function preRemove(LifecycleEventArgs $args) {
        $entity = $args->getEntity();
        if (!$entity instanceof Image ) {
            return;
        }
        
            // dd($this->uploaderHelper->asset($image, 'imageFile'));
        $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'imageFile'));
        
        
    }

    public function preUpdate(PreUpdateEventArgs $args) {
        $entity = $args->getEntity();
        if (!$entity instanceof Image ) {
            return;
        }
        if ($entity->getImageFile() instanceof UploadedFile) {
            
            
                $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'imageFile'));
            
            // $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'imageFile'));
        }
    }

}
