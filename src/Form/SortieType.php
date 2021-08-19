<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Entity\Sortie;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de la sortie :'
            ])
            ->add('date_heure_debut', DateTimeType::class, [
                'label'=> 'Date et heure de la sortie :'
            ])
            ->add('date_limite_inscription', DateTimeType::class, [
                'label' => 'Date limite d\'inscription :'
            ])
            ->add('nb_inscriptions_max', IntegerType::class,[
                'attr' => [
                    'Nombre de place :' => 10
                ]
            ])
            ->add('duree', IntegerType::class,[
                'attr' => [
                    'Durée :' => 10
                ]
            ])
            ->add('infos_sortie', TextareaType::class, [
                'label' => 'Description et infos :'
            ]);

        parent::buildForm($builder, $options);
    }
}