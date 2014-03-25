<?php

namespace Iut\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name." coucou");
    }

    
	/**
     * @Route("/bye/{name}")
     * @Template()
     */
    public function byeAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/edit/{id}", defaults={"id" = null}, name="iut_person_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $person = empty($id)
                  ? new \Iut\PlanningBundle\Entity\utilisateurs()
                  : $this->getDoctrine()->getManager()
                  ->getRepository('PlanningBundle:utilisateurs')->find($id);

        $form = $this->createForm(new \Iut\PlanningBundle\Form\utilisateursType(),$person);

        $request = $this->get('request'); // $this->getRequest():

        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($person);
                $em->flush();
                // on conserve dans la session le form précédent et on le rappellera si nécessaire
                $this->get('session')->getFlashBag()
                ->add('info','$person correctement modifié');
                return $this->redirect(
                           $this->generateUrl('iut_person_edit',array('id' => $person->getId())));
            } else {	      	//ERRREUR
            }
        }
        return $this->render('PlanningBundle:Default:edit.html.twig',
                             array('form'=>$form->createView()));
    }
}
