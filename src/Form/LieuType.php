<?php

namespace App\Form;


use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LieuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Ville organisatrice :'
            ])
            ->add('villes', TextType::class, [
                'label' => 'Lieu :'
            ])
            ->add('rue', TextType::class, [
                'label' => 'Rue :'
            ])
            ->add('latitude', IntegerType::class, [
                'label' => 'Latitude :'
            ])
            ->add('longitude', IntegerType::class, [
                'label' => 'Longitude :'
            ]);
        parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lieu::class,
        ]);
    }
}
