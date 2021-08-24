<?php

namespace App\Form;

use App\Entity\Site;
use App\Entity\Participant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;

class AccueilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('sites', EntityType::class, [
        'class' => Site::class,
        'choice_label' => 'nom',
        'label' => 'Site :',
        'attr' => ['readonly' => true
        ]])
        ->add('organisateur', CheckboxType::class, [
        'label'    => 'Sortie dont je suis l\'organisateur/trice',
        'required' => false,
        ])
        ->add('organisateur', CheckboxType::class, [
        'label'    => 'Sortie dont je suis l\'organisateur/trice',
        'required' => false,
    ]);
        parent::buildForm($builder, $options);

        
    }


}

