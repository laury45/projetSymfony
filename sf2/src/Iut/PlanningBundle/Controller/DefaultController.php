<?php

namespace Iut\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
   


    
	/**
     * @Route("/bye/{name}")
     * @Template()
     */
    public function byeAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/ajouteruti/{id}", defaults={"id" = null}, name="iut_person_edit")
     * @Template()
     */
    public function utilisateurAction($id)
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
        return $this->render('PlanningBundle:Default:ajouteruti.html.twig',
                             array('form'=>$form->createView()));
    }


    /**
     * @Route("/ajouteract/{id}", defaults={"id" = null}, name="iut_activite_edit")
     * @Template()
     */
    public function activiteAction($id)
    {
        $activite = empty($id)
                  ? new \Iut\PlanningBundle\Entity\activites()
                  : $this->getDoctrine()->getManager()
                  ->getRepository('PlanningBundle:activites')->find($id);

        $form = $this->createForm(new \Iut\PlanningBundle\Form\activitesType(),$activite);

        $request = $this->get('request'); // $this->getRequest():

        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($activite);
                $em->flush();
                // on conserve dans la session le form précédent et on le rappellera si nécessaire
                $this->get('session')->getFlashBag()
                ->add('info','$activite correctement modifié');
                return $this->redirect(
                           $this->generateUrl('iut_activite_edit',array('id' => $activite->getId())));
            } else {            //ERRREUR
            }
        }
        return $this->render('PlanningBundle:Default:ajouteract.html.twig',
                             array('form'=>$form->createView()));
    }
    /**
     * @Route("/ajouterh/{id}", defaults={"id" = null}, name="iut_heure_edit")
     * @Template()
     */

    public function heureAction($id)
    {
        $heure = empty($id)
                  ? new \Iut\PlanningBundle\Entity\heures()
                  : $this->getDoctrine()->getManager()
                  ->getRepository('PlanningBundle:heures')->find($id);

        $form = $this->createForm(new \Iut\PlanningBundle\Form\heuresType(),$heure);

        $request = $this->get('request'); // $this->getRequest():

        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($heure);
                $em->flush();
                // on conserve dans la session le form précédent et on le rappellera si nécessaire
                $this->get('session')->getFlashBag()
                ->add('info','$heure correctement modifié');
                return $this->redirect(
                           $this->generateUrl('iut_heure_edit',array('id' => $heure->getId())));
            } else {            //ERRREUR
            }
        }
        return $this->render('PlanningBundle:Default:ajouterh.html.twig',
                             array('form'=>$form->createView()));
    }
}
