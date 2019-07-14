<?php

namespace App\Form;

use App\Entity\Employers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployerSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Photo')
            ->add('Matricule')
            ->add('Nom')
            ->add('Naissance')
            ->add('Salaire')
            ->add('services')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employers::class,
        ]);
    }
}
