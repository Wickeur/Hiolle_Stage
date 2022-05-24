<?php

namespace App\Form;

use App\Entity\LesOrdiHiolleTechnologies;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheHiolleTechnologiesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('nom_station_h_tech')
            ->add('utilisateur_h_tech', EntityType::class, [
                'class' => LesOrdiHiolleTechnologies::class,
                'required' => false,
                'label' => 'Utilisateur : ',
            ])
            /*->add('marque_station_h_tech')
            ->add('adresse_mac_h_tech')
            ->add('tag_h_tech')
            ->add('microsoft_h_tech')
            ->add('station_acceuil_h_tech')
            ->add('moniteur_h_tech')
            ->add('clavier_souris_h_tech')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LesOrdiHiolleTechnologies::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}
