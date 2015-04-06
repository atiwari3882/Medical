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
     * Creates a new Symptom entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Symptom();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if (($condition = $form->get('condition')->getData())) {
                $entity->getConditions()->add($condition);
            }
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('symptom_show', array('id' => $entity->getId())));
        }

        return $this->render('MedicalBundle:Symptom:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Symptom entity.
     *
     * @param Symptom $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Symptom $entity)
    {
        $form = $this->createForm(new SymptomType(), $entity, array(
            'action' => $this->generateUrl('symptom_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Symptom entity.
     *
     */
    public function newAction()
    {
        $entity = new Symptom();
        $form   = $this->createCreateForm($entity);

        return $this->render('MedicalBundle:Symptom:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
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
     * Displays a form to edit an existing Symptom entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MedicalBundle:Symptom')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Symptom entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MedicalBundle:Symptom:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Symptom entity.
    *
    * @param Symptom $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Symptom $entity)
    {
        $form = $this->createForm(new SymptomType(), $entity, array(
            'action' => $this->generateUrl('symptom_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Symptom entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MedicalBundle:Symptom')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Symptom entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            if (($condition = $editForm->get('condition')->getData())) {
                $entity->getConditions()->add($condition);
            }
            $em->flush();

            return $this->redirect($this->generateUrl('symptom_edit', array('id' => $id)));
        }

        return $this->render('MedicalBundle:Symptom:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
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
