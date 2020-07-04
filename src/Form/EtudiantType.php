<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,[
                "attr" => ["placeholder" => "Nom"]
            ])
            ->add('prenom',TextType::class,[
                "attr" => ["placeholder" => "Nom"]
            ])
            ->add('email',EmailType::class,[
                "attr" => ["placeholder" => "example@example.com"]
            ])
            ->add('telephone',TelType::class,[
                "attr" => ["placeholder" => "002217xxxxxxxx"]
            ])
            ->add('dateNaissance', DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
            ->add('dateInscription', DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
            ->add('typeEtudiant',ChoiceType::class,[
                "choices" => [
                    "Choisir le Status de l'etudiant" => null,
                    "Boursier Loge" => "boursier logé",
                    "Boursier Non Loge" => "boursier non logé",
                    "Non Boursier" => "non boursier",
                ]
            ])
            // ->add('pension')
            // ->add('adresse')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
