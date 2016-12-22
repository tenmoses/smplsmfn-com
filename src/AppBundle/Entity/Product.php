<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="ProductComment", mappedBy="product")
     */
    private $product_comments;

    /**
     * @var int
     */
    private $amount_of_product_comments;

    /**
     * @var bool
     *
     * @ORM\Column(name="draft", type="boolean")
     */
    private $draft = false;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Product
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set category
     *
     * @param string Category $category
     *
     * @return
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return string
     **/
    public function getCategory()
    {
        return $this->category;
    }



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product_comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set draft
     *
     * @param boolean $draft
     *
     * @return Product
     */
    public function setDraft($draft)
    {
        $this->draft = $draft;

        return $this;
    }

    /**
     * Get draft
     *
     * @return boolean
     */
    public function getDraft()
    {
        return $this->draft;
    }

    /**
     * Add productComment
     *
     * @param \AppBundle\Entity\ProductComment $productComment
     *
     * @return Product
     */
    public function addProductComment(\AppBundle\Entity\ProductComment $productComment)
    {
        $this->product_comments[] = $productComment;

        return $this;
    }

    /**
     * Remove productComment
     *
     * @param \AppBundle\Entity\ProductComment $productComment
     */
    public function removeProductComment(\AppBundle\Entity\ProductComment $productComment)
    {
        $this->product_comments->removeElement($productComment);
    }

    /**
     * Get productComments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductComments()
    {
        return $this->product_comments;
    }

    /**
     * Get amount of productComments
     *
     * @return int
     */
    public function getAmountOfProductComments()
    {
        return count($this->product_comments);
    }
}
