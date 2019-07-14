<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony \ Component \ Form \ Form;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\Employers;
use App\Entity\Services;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Repository\EmployersRepository;
use Symfony\Flex\Response;

//use Doctrine\DBAL\Types\DateType;


class EmployerController extends AbstractController
{
    /**
     * @Route("/employer", name="employer")
     */
    public function index()
    {
        $repo=$this->getDoctrine()->getRepository(Employers::class);
        $employers=$repo->findAll();
        return $this->render('employer/index.html.twig', [
            'controller_name' => 'EmployerController',
            'employers' => $employers
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(){
        return $this->render('employer/home.html.twig');
    }

    /**
     * @Route("/employer/new", name="employer_create")
     * @Route("/employer/{id}/edit", name="employer_edit")
     */
    
    public function form(Employers $employers=null,Request $request,ObjectManager $manager){
        
        if(!$employers){
            
            $employers= new Employers();
        }
                  
        $form = $this->createFormBuilder($employers)
                        ->add('Photo')
                        ->add('Matricule')
                        ->add('Nom')
                        ->add('Naissance',DateType::class, [
                            'widget' => 'single_text',
                            'format' => 'yyyy-MM-dd'
                        ])
                        ->add('Salaire')
                        ->add('services', EntityType::class,[
                            'class'=> Services::class, 'choice_label'=> 'libelle'
                        ])
                        ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($employers);
            $manager->flush();
            return $this->redirectToRoute('employer_show',[
            'id'=>$employers->getId()
            ]);
        }
        return $this->render('employer/create.html.twig',[
            'formEmployer' => $form->createView(),
            'editMode' => $employers->getId()!==null
        ]);
       
    }

    /**
     * @Route("employer/{id}", name="employer_show")
     */
    public function show(Employers $employers){

        return $this->render('employer/show.html.twig', [

            'employers' => $employers
        ]);
    }

    /**
     * @Route("/{id}", name="employer_delete")
     * @Method("DELETE")
     */
    public function delete(Request $request, Employers $employers){

        $form = $this->createDeleteForm($employers);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($employers);
            $em->flush();
        }
        return $this->redirectToRoute('employer_index');
    }
     /**
     * Creates a form to delete a employer entity.
     *
     * @param employer $employers The employer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Employers $employers)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('employer_delete', array('id' => $employers->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
 
    
}
