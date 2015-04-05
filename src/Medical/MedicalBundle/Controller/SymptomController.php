<?php

namespace Medical\MedicalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Medical\MedicalBundle\Entity\Symptom;
use Medical\MedicalBundle\Form\SymptomType;

/**
 * Symptom controller.
 *
 */
class SymptomController extends Controller
{

    /**
     * Lists all Symptom entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MedicalBundle:Symptom')->findAll();

        return $this->render('MedicalBundle:Symptom:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Symptom entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MedicalBundle:Symptom')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Symptom entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MedicalBundle:Symptom:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Symptom entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MedicalBundle:Symptom')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Symptom entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('symptom'));
    }

    /**
     * Creates a form to delete a Symptom entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('symptom_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
