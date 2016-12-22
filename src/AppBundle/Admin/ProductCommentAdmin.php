<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use AppBundle\Entity\ProductComment;

class ProductCommentAdmin extends AbstractAdmin
{
	public function toString($object)
	{
		return $object instanceof ProductComment ? $object->getId() : 'Comment';
	}
	/**
	 * Configure fields which are displayed on the edit and create actions
	 */
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
					->add('body', 'textarea')
					->add('product', 'sonata_type_model', array(
						'class'    => 'AppBundle\Entity\Product',
						'property' => 'name'))
					->add('created', 'datetime');
	}

	/**
	 * Configure the filters, used to filter and sort the list of models
	 */
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
						->add('body')
						->add('product', null, array(), 'entity', array(
							'class' => 'AppBundle\Entity\Product',
							'choice_label' => 'name'))
						->add('created');
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
					->addIdentifier('created')
					->add('product.name')
					->add('body');
	}

}