<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Formation', ChoiceType::class, ['label_attr' => ['class'=> 'fw-bold'],
            'choices'  => [
                'Informatique' => "informatique@sgi-groupe.fr",
                'Développement' => "extranet@sgi-groupe.fr",
                'Systèmes et réseaux' => "christian.sorace@sgi-groupe.fr",
                'Autres'=> "florian.bouchez@sgi-groupe.fr ", 
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
