<?php

namespace App\Form;

use App\Entity\LesOrdiGraff;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheGraffType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('nom_station_graff')
            ->add('utilisateur_graff', EntityType::class, [
                'class' => LesOrdiGraff::class,
                'required' => false,
                'label' => 'Utilisateur : ',
            ])
            /*->add('marque_station_graff')
            ->add('adresse_mac_graff')
            ->add('tag_graff')
            ->add('microsoft_graff')
            ->add('station_acceuil_graff')
            ->add('moniteur_graff')
            ->add('clavier_souris_graff')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LesOrdiGraff::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}
