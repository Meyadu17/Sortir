<?php

namespace App\Form;

use App\Entity\Site;
use App\Entity\Participant;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo : ',
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom : '
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom : '
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Téléphone : '
            ])
            ->add('mail', EmailType::class, [
                'label' => 'Email : '
            ])
            ->add('motDePasse', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les champs du mot de passe doivent correspondre',
              'required' => true,

                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmation'
                ],
            ])
            ->add('sites', EntityType::class, [
                'class' => Site::class,
                'choice_label' => 'nom',
                'label' => 'Site de rattachement : ',
                'attr' => ['readonly' => true
                ]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Participant::class,
        ]);
    }
}