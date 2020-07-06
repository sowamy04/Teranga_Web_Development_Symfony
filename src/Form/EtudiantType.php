<?php

namespace App\Form;

use App\Entity\Chambre;
use App\Entity\Etudiant;
use App\Form\ChambreType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
                'widget' => 'single_text'
            ])
            ->add('dateInscription', DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text'
            ])
            ->add('typeEtudiant',ChoiceType::class,[
                "choices" => [
                    "Boursier Loge" => "boursier logé",
                    "Boursier Non Loge" => "boursier non logé",
                    "Non Boursier" => "non boursier",
                ]
            ])
            ->add('pension',ChoiceType::class,[
                "choices" => [
                    "20000" => "20000",
                    "40000" => "40000",
                ]
            ])
            ->add('adresse',TextType::class,[
                "attr" => ["placeholder" => "Votre adresse"]
            ])
            ->add("chambre",EntityType::class,[
                "class" => Chambre::class,
                "choice_label" => "numChambre"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
            'csrf_protection' => false,
        ]);
    }
}
