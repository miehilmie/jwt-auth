<?php

namespace Tymon\JWTAuth\Claims;

class Factory
{
    /**
     * @var array
     */
    private static $classMap = [
        'aud' => Audience::class,
        'exp' => Expiration::class,
        'iat' => IssuedAt::class,
        'iss' => Issuer::class,
        'jti' => JwtId::class,
        'nbf' => NotBefore::class,
        'sub' => Subjec::class
    ];

    /**
     * Get the instance of the claim when passing the name and value
     *
     * @param  string  $name
     * @param  mixed   $value
     *
     * @return \Tymon\JWTAuth\Claims\Claim
     */
    public function get($name, $value)
    {
        if ($this->has($name)) {
            return new self::$classMap[$name]($value);
        }

        return new Custom($name, $value);
    }

    /**
     * Check whether the claim exists
     *
     * @param  string  $name
     *
     * @return boolean
     */
    public function has($name)
    {
        return array_key_exists($name, self::$classMap);
    }
}
