<?php
/**
 * UuidTest.php
 *
 * UuidTest class
 *
 * php 8.0+
 *
 * @category  None
 * @package   Floor9design\LaravelCasts\Tests\Unit;
 * @author    Rick Morice <rick@floor9design.com>
 * @copyright Floor9design Ltd
 * @license   MIT
 * @link      https://github.com/floor9design-ltd/laravel-casts-uuid
 * @version   0.1
 * @since     0.1
 */

namespace Floor9design\LaravelCasts\Tests\Unit;

use Exception;
use Floor9design\LaravelCasts\Uuid as UuidCasts;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid as RamseyUuid;
use Ramsey\Uuid\UuidInterface;

/**
 * UuidTest
 *
 * This test file tests the UuidTest.
 *
 * @category  None
 * @package   Floor9design\LaravelCasts\Tests\Unit;
 * @author    Rick Morice <rick@floor9design.com>
 * @copyright Floor9design Ltd
 * @license   MIT
 * @link      https://github.com/floor9design-ltd/laravel-casts-uuid
 * @version   0.1
 * @since     0.1
 */
class UuidTest extends TestCase
{
    /**
     * test get()
     *
     * @return void
     */
    public function testGet()
    {
        $uuid = new UuidCasts();
        $model = $this->createUuidModel();
        $ramsey_uuid = RamseyUuid::uuid4();
        $model->uuid = $ramsey_uuid;

        $response = $uuid->get($model, 'uuid', $ramsey_uuid->getBytes(), []);

        $this->assertInstanceOf(UuidInterface::class, $response, 'Class was not the expected type');
        $this->assertEquals($ramsey_uuid->toString(), $response->toString(), 'Uuid did not load correctly');
    }

    /**
     * test set()
     *
     * @return void
     */
    public function testSet()
    {
        $model = $this->createUuidModel();
        $uuid = RamseyUuid::uuid4();

        $model->uuid = $uuid;
        $this->assertInstanceOf(UuidInterface::class, $model->uuid, 'Class was not the expected type');

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The uuid property is not an instance of Ramsey - Uuid');
        $model->uuid = 'a string';
    }

    private function createUuidModel()
    {
        return new class extends Model {
            protected $casts = [
                'uuid' => UuidCasts::class
            ];
        };
    }

}
