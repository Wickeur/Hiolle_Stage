<?php

namespace App\Form;

use App\Entity\LesOrdiHiolleIndustries;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheHiolleIndustriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('nom_station_h_indu')
            ->add('utilisateur_h_indu', EntityType::class, [
                'class' => LesOrdiHiolleIndustries::class,
                'required' => false,
                'label' => 'Utilisateur : ',
            ])
            /*
            ->add('marque_station_h_indu')
            ->add('adresse_mac_h_indu')
            ->add('tag_h_indu')
            ->add('microsoft_h_indu')
            ->add('station_acceuil_h_indu')
            ->add('moniteur_h_indu')
            ->add('clavier_souris_h_indu')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LesOrdiHiolleIndustries::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}
