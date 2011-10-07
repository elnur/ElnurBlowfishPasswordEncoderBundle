ElnurBlowfishPasswordEncoderBundle
==================================

This bundle provides a Blowfish based password encoder for Symfony 2.
You can find out why this algorithm should be preferred over hashing
[here](http://yorickpeterse.com/articles/use-bcrypt-fool).

Installation
------------

1.  Add this to the `deps` file:

        [ElnurBlowfishPasswordEncoderBundle]
            git=http://github.com/elnur/ElnurBlowfishPasswordEncoderBundle.git
            target=/bundles/Elnur/BlowfishPasswordEncoderBundle

    And run `bin/vendors install`.

2.  Register the `Elnur` namespace in the `app/autoload.php` file:

        $loader->registerNamespaces(array(
            // ...
            'Elnur'            => __DIR__.'/../vendor/bundles',
        ));

3.  Register the bundle in the `app/AppKernel.php` file:

        public function registerBundles()
        {
            $bundles = array(
                // ...
                new Elnur\BlowfishPasswordEncoderBundle\ElnurBlowfishPasswordEncoderBundle(),
            );
        }

4.  And, finally, set the encoder in the `app/config/security.yml` file:

        security:
            encoders:
                Symfony\Component\Security\Core\User\User:
                    id: security.encoder.blowfish

Configuration
-------------

By default the encoder uses a cost factor of `15`, which is pretty reasonable,
but you can change it to a different value in the range of `4-31` by editing
the `config.yml` file:

    elnur_blowfish_password_encoder:
        cost: 10

Each increment of the cost *doubles* the time it takes to encode a password.

Usage
-----

In order for this bundle to work, your user class has to return a salt of at
least `22` characters in length and consist of the characters in the range of
`./0-9A-Za-z`. These are the Blowfish algorithm requirements.

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE

Acknowledgements
----------------

I'm thankful to [asm89](https://github.com/asm89) for enlightening me by giving
the link you see above and answering my other related questions on the
`#symfony` channel.

And I'm thankful to [dustin10](https://github.com/dustin10) for suggesting
to add the extension class to make the bundle easier to install and configure.
