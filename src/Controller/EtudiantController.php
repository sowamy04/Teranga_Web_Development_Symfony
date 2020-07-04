<?php



    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use App\Entity\Etudiant;

    use App\Form\EtudiantType;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class EtudiantController extends AbstractController
    {
        /**
         * @Route("/etudiant", name="student")
         */
        public function index() 
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
        public function create(Request $request) 
        {
            $student = new Etudiant();
            $form = $this->createForm(EtudiantType::class,$student);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                dd($student);
            }
            return $this->render('etudiant/etudiant.html.twig', [
                'formCreateStudent' => $form->createView(),
            ]);
        }
    }
