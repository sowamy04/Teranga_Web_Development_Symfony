<?php

namespace App\Form;

use App\Entity\Chambre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ChambreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numChambre', HiddenType::class)
            ->add('numBatiment', ChoiceType::class, [
            'choices' => [
                'Choisir un numéro de batiment' => null,
                '01' => '01',
                '02' => '02',
                '03' => '03',
                '04' => '04',
                '05' => '05'
            ] 
            ]) 
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Choisir le type de chambre' => null,
                'individuelle' => 'individuelle',
                'commune' => 'commune'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chambre::class,
        ]);
    }
}
