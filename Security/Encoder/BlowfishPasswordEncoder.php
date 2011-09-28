<?php
namespace Elnur\BlowfishPasswordEncoderBundle\Security\Encoder;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class BlowfishPasswordEncoder implements PasswordEncoderInterface
{
    private $cost;

    public function __construct($cost)
    {
        $cost = (int) $cost;

        if ($cost < 4 || $cost > 31) {
            throw new \InvalidArgumentException('Cost must be in the range of 4-31');
        }

        $this->cost = sprintf("%02d", $cost);
    }

    public function encodePassword($raw, $salt)
    {
        if (strlen($salt) < 22) {
            throw new \InvalidArgumentException('Salt must be at least 22 characters long');
        }

        if (!preg_match('|^[/\.0-9A-Za-z]+$|', $salt)) {
            throw new \InvalidArgumentException('Salt must consist of characters in the range of /.0-9A-Za-z');
        }

        return crypt($raw, '$2a$' . $this->cost . '$'. $salt . '$');
    }

    public function isPasswordValid($encoded, $raw, $salt)
    {
        return $encoded == $this->encodePassword($raw, $salt);
    }
}
