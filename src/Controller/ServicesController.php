<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony \ Component \ Form \ Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Services;

class ServicesController extends AbstractController
{
    /**
     * @Route("/services", name="services")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Services::class);
        $services = $repo->findAll();

        return $this->render('services/index.html.twig', [
            'controller_name' => 'ServicesController',
            'services' => $services,
            ]);
    }

    /**
     * @Route("/services/new", name="services_serviceadd")
     * @Route("/services/{id}/edit", name="services_edit")
     */
    public function form(Services $services = null, Request $request, ObjectManager $manager)
    {
        if (!$services) {
            $services = new Services();
        }

        $form = $this->createFormBuilder($services)
                        ->add('Libelle')
                        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($services);
            $manager->flush();

            return $this->redirectToRoute('employer_show');
        }

        return $this->render('services/serviceadd.html.twig', [
            'formservices' => $form->createView(),
            'editMode' => $services->getId() !== null,
        ]);
    }
}
