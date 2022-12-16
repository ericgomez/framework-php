<?php
namespace Application\Models\Entities;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Application\Models\Repositories\PostRepository")
 * @ORM\Table(name="posts")
 */
class Post extends Entity {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string")
	 * @Assert\NotBlank(
	 *     message = "El título no puede estar vacío"
	 * )
	 * @Assert\Length(
	 *     min = 10,
	 *     minMessage = "El título debe tener al menos 10 caracteres"
	 * )
	 * @var string
	 **/
	protected $title;

	/**
	 * @ORM\Column(type="string")
	 * @Assert\NotBlank(
	 *     message = "El contenido del post no puede estar vacío"
	 * )
	 * @var string
	 **/
	protected $body;

	/**
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="posts")
	 */
	protected $user;
}