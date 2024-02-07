<?php
// tests/Entity/UserTest.php
namespace App\Tests\Entity;

use App\Entity\Pdf;
use App\Entity\Subscription;
use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiTest extends WebTestCase
{
    public function testGetterAndSetter()
    {
        // Création d'une instance de l'entité User
        $user = new User();

        // Définition de données de test
        $email = 'test@test.com';
        $roles = ['ROLE_USER', 'ROLE_ADMIN'];
        $password = 'password123';
        $firstname = 'John';
        $lastname = 'Doe';
        $subscriptionEndAt = new \DateTimeImmutable('+1 year');
        $createdAt = new \DateTimeImmutable('now');
        $updateAt = new \DateTimeImmutable('now');
        $subscription = new Subscription(); // Assuming Subs is another Entity
        $pdf = new Pdf(); // Assuming Pdf is another Entity

        // Utilisation des setters
        $user->setEmail($email)
            ->setRoles($roles)
            ->setPassword($password)
            ->setFirstname($firstname)
            ->setLastname($lastname)
            ->setRoles($roles)
            ->setSubscriptionEndAt($subscriptionEndAt)
            ->setCreatedAt($createdAt)
            ->setUpdatedAt($updateAt)
            ->setSubscription($subscription)
            ->addPdf($pdf);

        // Vérification des getters
        $this->assertEquals($email, $user->getEmail());
        $this->assertEquals($roles, $user->getRoles());
        $this->assertEquals($password, $user->getPassword());
        $this->assertEquals($firstname, $user->getFirstname());
        $this->assertEquals($lastname, $user->getLastname());
        $this->assertEquals($subscriptionEndAt, $user->getSubscriptionEndAt());
        $this->assertEquals($createdAt, $user->getCreatedAt());
        $this->assertEquals($updateAt, $user->getUpdatedAt());
        $this->assertEquals($subscription, $user->getSubscription());

        // Pour vérifier les PDFs, on s'attend à ce qu'ils soient stockés dans une Collection
        $this->assertInstanceOf(ArrayCollection::class, $user->getPdf());
        $this->assertTrue($user->getPdf()->contains($pdf));

        // Test removePdf
        $user->removePdf($pdf);
        $this->assertFalse($user->getPdf()->contains($pdf));
    }
}
?>