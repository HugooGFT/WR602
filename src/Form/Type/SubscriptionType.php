<?php

namespace App\Form\Type;

use App\Entity\Subscription;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubscriptionType extends AbstractType
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $subcriptions = $this->em->getRepository(Subscription::class)->findAll();
        dump($subcriptions);
        $subs = [];
        foreach ($subcriptions as $subcription) {
            $subs[$subcription->getTitle()] = $subcription->getId();
        }
        dump($subs);
        $builder
            ->add('title', ChoiceType::class, [
                'choices'  => $subs,
            ])
            ->add('save', SubmitType::class)
            ->getForm()
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Subscription::class,
        ]);
    }
}
