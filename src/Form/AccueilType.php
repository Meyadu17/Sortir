<?php

namespace App\Form;

use App\Entity\Site;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
        ]]);
        parent::buildForm($builder, $options);

        
    }


}

