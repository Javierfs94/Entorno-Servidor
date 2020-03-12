<?php
namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        $designCategory = new Category();
        $designCategory->setName('Design');
        $designCategory->setSlug('Design');

        $programmingCategory = new Category();
        $programmingCategory->setName('Programming');
        $programmingCategory->setSlug('Programming');

        $managerCategory = new Category();
        $managerCategory->setName('Manager');
        $managerCategory->setSlug('Manager');

        $administratorCategory = new Category();
        $administratorCategory->setName('Administrator');
        $administratorCategory->setSlug('Administrator');


        $manager->persist($designCategory);
        $manager->persist($programmingCategory);
        $manager->persist($managerCategory);
        $manager->persist($administratorCategory);

        $manager->flush();

        $this->addReference('category-design', $designCategory);
        $this->addReference('category-programming', $programmingCategory);
        $this->addReference('category-manager', $managerCategory);
        $this->addReference('category-administrator', $administratorCategory);
    }
}