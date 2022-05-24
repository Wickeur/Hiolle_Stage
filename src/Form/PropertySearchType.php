<?php

namespace App\Form;

use App\Entity\LesOrdinateurs;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //Formulaire de recherche avancée
        $builder
            //Recherche mot en écrivant en complet
                /*
            ->add('Nom_de_la_station', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nom de la station'
                ]
            ])*/
            /*
            ->add('Nom_de_la_station', EntityType::class, [
                'class' => LesOrdinateurs::class,
                'required' => false,
                'label' => 'Nom de la station',
            ])*/

            ->add('Utilisateur_habituel', EntityType::class, [
                'class' => LesOrdinateurs::class,
                'required' => false,
                'label' => 'Utilisateur : ',
            ])
            /*
            ->add('Marque_de_la_station', EntityType::class, [
                'class' => LesOrdinateurs::class,
                'required' => false,
                'label' => 'Marque de la station',
            ])
            ->add('Adresse_Mac', EntityType::class, [
                'class' => LesOrdinateurs::class,
                'required' => false,
                'label' => 'Adresse Mac',
            ])
            ->add('TAG', EntityType::class, [
                'class' => LesOrdinateurs::class,
                'required' => false,
                'label' => 'TAG',
            ])
            ->add('Microsoft_Office', EntityType::class, [
                'class' => LesOrdinateurs::class,
                'required' => false,
                'label' => 'Microsoft Office',
            ])
            ->add('Station_Acceuil', EntityType::class, [
                'class' => LesOrdinateurs::class,
                'required' => false,
                'label' => 'Station Acceuil',
            ])
            ->add('Moniteur', EntityType::class, [
                'class' => LesOrdinateurs::class,
                'required' => false,
                'label' => 'Moniteur',
            ])
            ->add('Clavier_Souris', EntityType::class, [
                'class' => LesOrdinateurs::class,
                'required' => false,
                'label' => 'Clavier + Souris',
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LesOrdinateurs::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    /*

    buildForm()
        Il ajoute et configure d'autres types dans ce type.
        C'est la même méthode que celle utilisée lors de la création des classes de formulaire Symfony .
    buildView()
        Il définit toutes les variables supplémentaires dont vous aurez besoin lors du rendu du champ dans un modèle.
    configureOptions()
        Il définit les options configurables lors de l'utilisation du type de formulaire, qui sont également les options utilisables dans les méthodes buildForm()et . buildView()Les options sont héritées des types parents et des extensions de type parent, mais vous pouvez créer n'importe quelle option personnalisée dont vous avez besoin.
    finishView()
        Lors de la création d'un type de formulaire composé de plusieurs champs,
        cette méthode permet de modifier la "vue" de n'importe lequel de ces champs.
        Pour tout autre cas d'utilisation, il est recommandé d'utiliser à la place la buildView()méthode.
    getParent()
        Si votre type personnalisé est basé sur un autre type (c'est-à-dire qu'ils partagent certaines fonctionnalités),
        ajoutez cette méthode pour renvoyer le nom de classe complet de ce type d'origine.
        N'utilisez pas l'héritage PHP pour cela. Symfony appellera toutes les méthodes de type formulaire ( buildForm(), buildView(), etc.)
         du type parent et il appellera toutes ses extensions de type avant d'appeler celles définies dans votre type personnalisé.

Par défaut, la AbstractTypeclasse renvoie le type FormType générique ,
    qui est le parent racine de tous les types de formulaire dans le composant Form.*/
}
