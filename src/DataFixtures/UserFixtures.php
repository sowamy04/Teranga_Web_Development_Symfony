<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;
    
    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $roles = ["ROLE_ADMIN","ROLE_USER"];
        $user->setEmail("admin@admin.com")
            ->setPassword($this->encoder->encodePassword($user,"admin"))
            ->setRoles($roles);
        $manager->persist($user);
        $manager->flush();
    }
}
