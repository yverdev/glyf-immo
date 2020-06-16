<?php


namespace App\Event;


use App\Entity\User;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserPasswordSubscriber implements EventSubscriber
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * UserPasswordSubscriber constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
            Events::preUpdate
        ];
    }

    public function preSave(LifecycleEventArgs $eventArgs){
        if ($eventArgs ->getObject() instanceof User ) {
            $user = $eventArgs->getObject();
            $password = $user->getPassword();
            $totoPassword = $this->passwordEncoder->encodePassword($user, 'Toto');
            if ($password && substr($password, 0, 10) != substr($totoPassword, 0, 10)){
                $passwordEncoded = $this->passwordEncoder->encodePassword($user, $password);
                $user->setPassword($passwordEncoded);
            }
        }
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $this->preSave($eventArgs);
    }

    public function preUpdate(LifecycleEventArgs $eventArgs)
    {
        $this->preSave($eventArgs);
    }
}