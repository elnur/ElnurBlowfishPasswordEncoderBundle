<?php
namespace Elnur\BlowfishPasswordEncoderBundle\Security\Encoder;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class BlowfishPasswordEncoder implements PasswordEncoderInterface
{
    private $cost;

    public function __construct($cost = 15)
    {
        $this->cost = $cost;
    }

    public function encodePassword($raw, $salt)
    {
        return crypt($raw, '$2a$' . $this->cost . '$'. $salt . '$');
    }

    public function isPasswordValid($encoded, $raw, $salt)
    {
        return $encoded == $this->encodePassword($raw, $salt);
    }
}
