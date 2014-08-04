<?php
/**
 * Created by PhpStorm.
 * User: young1
 * Date: 14-8-4
 * Time: 下午1:53
 */

namespace Tony\UserBundle;

use Doctrine\ORM\EntityRepository;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

/**
 * Class UserRepository
 * @package Tony\UserBundle
 */
class UserRepository extends EntityRepository implements UserProviderInterface
{
    /** Implements UserProviderInterface */
    public function loadUserByUsername($username)
    {
        return $this->findOneByUsername($username);
    }

    /** Implements UserProviderInterface */
    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(
                sprintf(
                    'Instances of "%s" are not supported.',
                    $class
                )
            );
        }

        return $this->find($user->getUserId());
    }

    /** Implements UserProviderInterface */
    public function supportsClass($class)
    {
        return $this->getEntityName() === $class
        || is_subclass_of($class, $this->getEntityName());
    }
} 