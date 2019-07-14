<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Migrations\Version\Factory;

class EmployerFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker= \Faker\Factory::create('fr_Fr');
        
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
