<?php

namespace Task\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Task\TestBundle\Entity\Search;
// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;




class DefaultController extends Controller
{
  /**
   * @Route("/", name="_task_index")
   * @Template()
   */
  public function indexAction(){
    return $this->render('TaskTestBundle:Default:index.html.twig');
  }
   /**
   * @Route("/userform", name="task_pegas")
   * @Template()
   */
  public function taskAction(){
    $request = $this->get('request');
    $search = new Search();
    $form = $this->createFormBuilder($search)
      ->add('expresion', 'text')
      ->getForm();
    if ($request->query->get('form')) {
      $form->bind($request);
    }
    return $this->render('TaskTestBundle:Default:search.html.twig', array(
      'form' => $form->createView(),
      'data' => $search->getGeneralResult()
    ));
  }
}
