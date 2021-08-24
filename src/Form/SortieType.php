<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Entity\Sortie;
use App\Entity\Lieu;
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
            ])

            ->add('lieux', EntityType::class, [
                'class' => Lieu::class,
                'choice_label' => 'nom',
                'label' => 'Lieu :',
                'attr' => ['readonly' => true
                ]]);
        parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }



}
