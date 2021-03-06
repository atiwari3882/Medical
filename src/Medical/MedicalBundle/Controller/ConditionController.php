<?php

namespace Medical\MedicalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Medical\MedicalBundle\Entity\Condition;
use Medical\MedicalBundle\Form\ConditionType;

/**
 * Condition controller.
 *
 */
class ConditionController extends Controller
{

    /**
     * Lists all Condition entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MedicalBundle:Condition')->findAll();

        return $this->render('MedicalBundle:Condition:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Condition entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Condition();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            foreach ($entity->getSymptoms() as $symptom) {
                $symptom->getConditions()->add($entity);
            }
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('condition_show', array('id' => $entity->getId())));
        }

        return $this->render('MedicalBundle:Condition:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Condition entity.
     *
     * @param Condition $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Condition $entity)
    {
        $form = $this->createForm(new ConditionType(), $entity, array(
            'action' => $this->generateUrl('condition_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Condition entity.
     *
     */
    public function newAction()
    {
        $entity = new Condition();
        $form   = $this->createCreateForm($entity);

        return $this->render('MedicalBundle:Condition:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Condition entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MedicalBundle:Condition')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Condition entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MedicalBundle:Condition:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Condition entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MedicalBundle:Condition')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Condition entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MedicalBundle:Condition:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Condition entity.
    *
    * @param Condition $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Condition $entity)
    {
        $form = $this->createForm(new ConditionType(), $entity, array(
            'action' => $this->generateUrl('condition_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Condition entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MedicalBundle:Condition')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Condition entity.');
        }


        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $previousSymptoms = $em->getRepository('MedicalBundle:Symptom')
                ->getElements(['by_condition' => $id, 'by_action' => 'execute']);

            foreach ($previousSymptoms as $previousSymptom) {
                if ($entity->getSymptoms()->contains($previousSymptom) == false) {
                    $previousSymptom->removeCondition($entity);
                }
            }
            foreach ($entity->getSymptoms() as $symptom) {
                if ($symptom->getConditions()->contains($entity) == false) {
                    $symptom->getConditions()->add($entity);
                }
            }
            $em->flush();

            return $this->redirect($this->generateUrl('condition_edit', array('id' => $id)));
        }

        return $this->render('MedicalBundle:Condition:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Condition entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MedicalBundle:Condition')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Condition entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('condition'));
    }

    /**
     * Creates a form to delete a Condition entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('condition_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
