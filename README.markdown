ElnurBlowfishPasswordEncoderBundle
==================================

This bundle provides a password encoder based on the Blowfish algorithm for
Symfony 2. You can find out why this algorithm should be used to encode
passwords [here](http://yorickpeterse.com/articles/use-bcrypt-fool).

Installation
------------

1.  Add this to the `deps` file:

        [ElnurBlowfishPasswordEncoderBundle]
            git=http://github.com/elnur/ElnurBlowfishPasswordEncoderBundle.git
            target=/bundles/Elnur/BlowfishPasswordEncoderBundle

    And run `bin/vendors install`.

2.  Register the namespace in the `app/autoload.php` file:

        $loader->registerNamespaces(array(
            // ...
            'Elnur\\BlowfishPasswordEncoderBundle' => __DIR__.'/../vendor/bundles',
        ));

3.  Enable the service by adding this to the `app/config/config.yml` file:

        services:
            # ...
            blowfish.password.encoder:
                class: Elnur\BlowfishPasswordEncoderBundle\Security\Encoder\BlowfishPasswordEncoder

4.  And enable the encoder in the `app/config/security.yml` file:

        security:
            encoders:
                Symfony\Component\Security\Core\User\User:
                    id: blowfish.password.encoder

Configuration
-------------

By default the encoder uses a cost factor of `15`, which is pretty reasonable,
but you can change it to a different value in the range `04-31` by adding an
argument:

    services:
        # ...
        blowfish.password.encoder:
            class: Elnur\BlowfishPasswordEncoderBundle\Security\Encoder\BlowfishPasswordEncoder
            arguments: { cost: 10 }

The higher you set the factor, the longer it will take to encode a password.

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE

Acknowledgement
---------------

I'm thankful to [asm89](https://github.com/asm89) for enlightening me by giving
the link you see above and answering my other related questions on the
`#symfony` channel.
