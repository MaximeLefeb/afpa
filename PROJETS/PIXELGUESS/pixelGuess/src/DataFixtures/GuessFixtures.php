<?php

namespace App\DataFixtures;

use App\Entity\Guess;
use Symfony\Component\Finder\Finder;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class GuessFixtures extends Fixture {
    protected array $types = [
        'cinema',
        'marque',
        'serie',
        'anime',
        'jeux'
    ];

    public function load(ObjectManager $manager):void {
        foreach ($this->types as $type) {
            $finder = new Finder();
            $files  = $finder->in("public/assets/img/$type");

            foreach ($files as $file) {
                $guess = new Guess();
                $guess->setImg(substr($file->getPath(), 7) . "/" . $file->getFilename());
                $guess->setType(ucfirst($type));
                $guess->setKeyword($this->getKeywordByFilename($file->getFilename()));

                $manager->persist($guess);
            }
        }

        $manager->flush();
    }

    protected function getKeywordByFilename(string $file):string {
        return ucfirst(implode(' ', explode('_', explode('.', $file)[0])));
    }
}
