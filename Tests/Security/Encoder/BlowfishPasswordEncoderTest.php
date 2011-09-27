<?php
namespace Elnur\BlowfishPasswordEncoderBundle\Tests\Security\Encoder;

use Elnur\BlowfishPasswordEncoderBundle\Security\Encoder\BlowfishPasswordEncoder;

class BlowfishPasswordEncoderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCostBelowRange()
    {
        new BlowfishPasswordEncoder(3);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCostAboveRange()
    {
        new BlowfishPasswordEncoder(32);
    }

    public function testCostInRange()
    {
        for ($cost = 4; $cost <= 31; $cost++) {
            new BlowfishPasswordEncoder($cost);
        }
    }
}
