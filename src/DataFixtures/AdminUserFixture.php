<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminUserFixture extends Fixture
{
    private $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager)
    {
        /* Get email and password from environment variables */
        $email = $_ENV['APP_ADMIN_EMAIL'];
        $password = $_ENV['APP_ADMIN_PASSWORD'];

        /* Create a new user with the admin role */
        $user = new User();
        $user->setEmail($email);
        $user->setRoles(['ROLE_ADMIN']);

         /* Encrypt the password before storing it in the database */
        $user->setPassword($this->userPasswordHasher->hashPassword($user, $password));

        $manager->persist($user);
        $manager->flush();
    }
}
