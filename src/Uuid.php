<?php
/**
 * Uuid.php
 *
 * Uuid class
 *
 * php 8.0+
 *
 * @category  None
 * @package   Floor9design\LaravelCasts
 * @author    Rick Morice <rick@floor9design.com>
 * @copyright Floor9design Ltd
 * @license   MIT
 * @link      https://github.com/floor9design-ltd/laravel-casts-uuid
 * @version   1.0
 * @since     0.1
 */

namespace Floor9design\LaravelCasts;

use Exception;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Contracts\Database\Eloquent\SerializesCastableAttributes;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid as RamseyUuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Uuid class
 *
 * Uuid class for casting RamseyUuid uuids
 *
 * @category  None
 * @package   Floor9design\LaravelCasts
 * @author    Rick Morice <rick@floor9design.com>
 * @copyright Floor9design Ltd
 * @license   MIT
 * @link      https://github.com/floor9design-ltd/laravel-casts-uuid
 * @version   1.0
 * @since     0.1
 */
class Uuid implements CastsAttributes, SerializesCastableAttributes
{
    /**
     * Cast the given value.
     *
     * @param Model $model
     * @param string $key
     * @param string $value
     * @param array<mixed> $attributes
     * @return UuidInterface $uuid
     */
    public function get($model, string $key, $value, array $attributes)
    {
        $uuid = RamseyUuid::fromBytes($value);
        return $uuid;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param Model $model
     * @param string $key
     * @param UuidInterface $value
     * @param array<mixed> $attributes
     * @return string
     * @throws Exception
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if (!$value instanceof (UuidInterface::class)) {
            throw new Exception('The uuid property is not an instance of Ramsey - Uuid');
        }

        return $value->getBytes();
    }

    /**
     * Get the serialized representation of the value.
     *
     * @param Model $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return string
     */
    public function serialize($model, string $key, $value, array $attributes): string
    {
        return (string) $value;
    }
}
