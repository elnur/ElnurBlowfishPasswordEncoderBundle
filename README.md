ElnurBlowfishPasswordEncoderBundle
==================================

[![Build Status](https://secure.travis-ci.org/elnur/ElnurBlowfishPasswordEncoderBundle.png)](http://travis-ci.org/elnur/ElnurBlowfishPasswordEncoderBundle)

Still using `MD5` or `SHA` family hashing algorithms for password “encryption”?
If you are, read [this](http://codahale.com/how-to-safely-store-a-password) and
[that](http://yorickpeterse.com/articles/use-bcrypt-fool) and then come back to
get yourself a copy of this bundle.

Installation
------------

1.  Add this to the `composer.json`:

        {
            "require": {
                "elnur/blowfish-password-encoder-bundle": "~0.5"
            }
        }

    And run:

        composer update elnur/blowfish-password-encoder-bundle

2.  Enable the bundle in `app/AppKernel.php`:

        public function registerBundles()
        {
            $bundles = array(
                // ...
                new Elnur\BlowfishPasswordEncoderBundle\ElnurBlowfishPasswordEncoderBundle(),
            );
        }

3.  And, finally, set the encoder in `app/config/security.yml`:

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

You can change the cost factor at *any time* — even if you already have some
passwords encoded using a different cost factor. New passwords will be encoded
using the new cost factor, while the already encoded ones will be validated
using a cost factor that was used back when they were encoded.

Usage
-----

A salt for each new password is generated automatically and need not be
persisted. Since an encoded password contains the salt used to encode it,
persisting the encoded password alone is enough.

All the encoded passwords are `60` characters long, so make sure to allocate
enough space for them to be persisted.

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE

Acknowledgements
----------------

I thank [asm89](https://github.com/asm89) for enlightening me by giving the
links you see above and answering my other related questions on the `#symfony`
channel.

And I thank [dustin10](https://github.com/dustin10) for suggesting to add the
extension class to make the bundle easier to install and configure.
