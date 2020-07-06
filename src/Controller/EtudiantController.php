<?php

    namespace App\Controller;
    use App\Repository\EtudiantRepository;
    use Doctrine\ORM\EntityManagerInterface;
    use App\Form\EtudiantType;
    use Symfony\Component\HttpFoundation\Request;
    use App\Entity\Etudiant;
    use App\Entity\Chambre;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class EtudiantController extends AbstractController
    {
        /**
         * @Route("/etudiant", name="student")
         */
        public function index(EtudiantRepository $studentRepository) 
        {
            $student = new Etudiant();
            $form = $this->createForm(EtudiantType::class,$student);
            return $this->render('etudiant/etudiant.html.twig', [
                'formCreateStudent' => $form->createView(),
            ]);
        }
        /**
         * @Route("/etudiant/create", name="create_student")
         */
        public function create(Request $request,EntityManagerInterface $em,EtudiantRepository $studentRepository) 
        {

            $students = $studentRepository->findAll();
            $student = new Etudiant();
            $form = $this->createForm(EtudiantType::class,$student);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $year = $student->getDateInscription()->format("Y");
                $lastname = substr($student->getNom(),0,2);
                $firstname = substr($student->getPrenom(),-2);
                $unique = time();
                $unique = "$unique";
                $matricule = $year.''.$lastname.''.$firstname.''.substr($unique,-4);
                $student->setMatricule($matricule);
                $em->persist($student);
                $em->flush();
                return $this->redirectToRoute("student");
            }
            return $this->render('etudiant/etudiant.html.twig', [
                'formCreateStudent' => $form->createView(),
            ]);
        }
    }
