<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Institution;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Format;
use App\Entity\Price;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@my-email.dev');
        $password = $this->hasher->hashPassword($user, 'pass_1234');
        $user->setPassword($password);
        $manager->persist($user);


        $institution = new Institution();
        $institution->setName('Pizza Club');
        $institution->setUser($user);
        $institution->setRoute('/pizza-club');
        $institution->setAddress('9 Rue de la couche salle');
        $institution->setZipcode(81792);
        $institution->setCity('Merdeville');
        $institution->setPhone('0838308430');
        $institution->setWebsite('www.pizza-club.fr');
        $manager->persist($institution);

        $categProds = array(
        'Entrée' => [
            'Roulades de jambon à la macédoine',
            'Crème de maïs au gouda',            
            'Cake salé',
            'Carpaccio de dorade à la coriandre',            
            'Tartare de saumon',
            'Mousse de truite à l\'estragon',
            'Saumon fumé - asperges',
            'Foie gras aux poires et quatre épices',
            'Foie gras aux pruneaux à l\'armagnac',
            'Crème d\'avocat au thon',
            'Verrines saumon fumé - avocat',
            'Boulettes de thon',
            'Crème de betterave',
            'Mayonnaise',
            ],
        'Plat' => [
            'Le ch\'ti steak au maroilles',
            'Rôti de porc à la sauge et au citron',
            'Porc au caramel facile',
            'Agneau au miel et aux herbes',
            'Tajine de boulettes kefta',
            'Hamburger maison, comme aux USA',
            'Meat Pie (tourte au boeuf)',
            'Poulet au cidre',
            'Blancs de poulet gratinés au four',
            'Farce pour volaille',
            'Lapin au thym',
            'Purée Chipolatas',
            'Bien cuire un rôti - les astuces'
            ],
        'Dessert' => [
            'Gâteau rapide à l\'ananas',
            'Tiramisu - la recette originale',
            'Cake chocolat-pimendou',
            'Pudding aux groseilles',
            'Gâteau aux pommes façon grand-mère',
            'Gâteau de riz au caramel',
            'Gâteau léger vanillé aux groseilles',
            'Clafoutis léger aux mûres',
            'Financiers',
            'Cannelés bordelais',
            'Madeleines aux fraises à la cardamome',
            'Brioche et briochettes',
            'Génoise au chocolat',
            'Carré framboise-chocolat blanc',
            'CheeseCake à la framboise' 
            ]
        );

        foreach ($categProds as $category => $products) {
            $cat = new Category();
            $cat->setName($category);
            $cat->setInstitution($institution);
            $cat->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($cat);

            foreach ($products as $product) {
                $prod = new Product();
                $prod->setCategory($cat);
                $prod->setLabel($product);
                $prod->setCreatedAt(new \DateTimeImmutable());
                $prod->setStatus('En stock');
                $manager->persist($prod);

                $price = new Price();
                $price->setProduct($prod);
                $price->setAmount(mt_rand(10, 100));
                $manager->persist($price);
            }
        }
        $manager->flush();
    }
}
