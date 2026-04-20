<?php

namespace App\Form;

use App\Entity\Artiste;
use App\Entity\Soiree;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SoireeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('dateSoiree', null, [
                'widget' => 'single_text',
            ])
            ->add('dateCreation', null, [
                'widget' => 'single_text',
            ])
            ->add('statut')
            ->add('email')
            ->add('artistes', EntityType::class, [
                'class' => Artiste::class,
                'choice_label' => 'nom',  
                'multiple' => true,
                'expanded' => true,      
                'required' => false,
                'by_reference' => false, 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Soiree::class,
        ]);
    }
}
