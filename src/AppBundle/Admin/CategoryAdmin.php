<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use AppBundle\Entity\Category;

class CategoryAdmin extends AbstractAdmin
{
	public function toString($object)
	{
		return $object instanceof Category ? $object->getName() : 'Category';
	}
	/**
	 * Configure fields which are displayed on the edit and create actions
	 */
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper->add('name', 'text');
	}

	/**
	 * Configure the filters, used to filter and sort the list of models
	 */
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('name');
	}

	/**
	 * Configure fields in list
	 */
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper->addIdentifier('name');
	}
}