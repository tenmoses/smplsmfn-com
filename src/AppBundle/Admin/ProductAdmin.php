<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use AppBundle\Entity\Product;

class ProductAdmin extends AbstractAdmin
{
	public function toString($object)
	{
		return $object instanceof Product ? $object->getName() : 'Product';
	}
	/**
	 * Configure fields which are displayed on the edit and create actions
	 */
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
					->add('name', 'text')
					->add('description', 'textarea')
					->add('price', 'number')
					->add('amount', 'number')
					->add('category', 'sonata_type_model', array(
						'class'    => 'AppBundle\Entity\Category',
						'property' => 'name'));
	}

	/**
	 * Configure the filters, used to filter and sort the list of models
	 */
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
						->add('name')
						->add('category', null, array(), 'entity', array(
							'class' => 'AppBundle\Entity\Category',
							'choice_label' => 'name'))
						->add('price');
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
					->addIdentifier('name')
					->add('category.name')
					->add('description')
					->add('price')
					->add('amount')
					->add('draft');
	}

}