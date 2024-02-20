<?php

namespace App\Form;

use App\Entity\Band;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du groupe',
            ])
            ->add('origin', TextType::class, [
                'label' => 'Origine',
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
            ])
            ->add('startYear', TextType::class, [
                'label' => 'Année de début',
            ])
            ->add('separationYear', TextType::class, [
                'label' => 'Année de séparation',
            ])
            ->add('founders', TextType::class, [
                'label' => 'Fondateurs',
            ])
            ->add('members', TextType::class, [
                'label' => 'Membres',
            ])
            ->add('musicalStyle', TextType::class, [
                'label' => 'Courant musical',
            ])
            ->add('introduction', TextareaType::class, [
                'label' => 'Présentation',
                'attr' => [
                    'rows' => 5,
                ],
            ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Band::class,
        ]);
    }
}
