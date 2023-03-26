<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use ReflectionClass;

/**
 * @author kabix09
 * Class to declare CRUD functions for API requests
 *
 * @OA\Info(
 *      version="3.0.0",
 *      title="WOSP API Documentation",
 *      description="WOSP API in Swagger OpenApi description",
 *      @OA\Contact(
 *          email="admin@admin.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="WOSP API Server"
 * )
 *
 * @OAS\SecurityScheme(
 *      securityScheme="sanctum",
 *      type="http",
 *      scheme="bearer",
 *      description="Laravel Sanctum token authentication"
 * )
 *
 * @link https://blog.quickadminpanel.com/laravel-api-documentation-with-openapiswagger/
 * @link https://github.com/DarkaOnLine/L5-Swagger/issues/318
 */
abstract class ApiController extends Controller
{
    private ReflectionClass $proxyClass;

    /**
     * @throws \ReflectionException
     */
    public function __construct(string $class)
    {
        $this->proxyClass = new ReflectionClass($class);

        dd($this->proxyClass->getExtension());
        //Model
    }

    public function getAll()
    {
        $boxes = ($this->proxyClass)::with('collector')->get(); // remove n+1 problem

    }

    public abstract function get(int $id);

    public abstract function update(Request $request, int $id);

    public abstract function create(Request $request, int $id);

    public abstract function delete(int $id);
}
