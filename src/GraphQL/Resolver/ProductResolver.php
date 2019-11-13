<?php


namespace App\GraphQL\Resolver;


use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class ProductResolver implements ResolverInterface, AliasedInterface
{

    /**
     * @var EntityManager
     */private $em;

    /**
     *
     * @param EntityManager $em
     */public function __construct(EntityManager $em){
        $this->em = $em;
    }

    /**
     * @param int $id
     * @return null|object
     */public function resolve(Argument $argument){
        return $this->em->getRepository('App:Product')->find($argument['id']);
    }

    /**
     * {@inheritdoc}
     */public static function getAliases(): array{
        return [
            'resolve' => 'Product',
        ];
    }

}