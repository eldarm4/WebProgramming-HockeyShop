<?php

/**
 * @OA\Get(
 *      path="/product",
 *      tags={"products"},
 *      summary="Get all products",
 *      @OA\Response(
 *          response=200,
 *          description="List of all products"
 *      )
 * )
 */
Flight::route('GET /product', function(){
    Flight::json(Flight::productService()->getAll());
});


/**
 * @OA\Get(
 *      path="/product/{id}",
 *      tags={"products"},
 *      summary="Get a product by its ID",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="The ID of the product",
 *          @OA\Schema(type="integer", example=5)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Product details"
 *      )
 * )
 */
Flight::route('GET /product/@id', function($id){
    Flight::json(Flight::productService()->getById($id));
});


/**
 * @OA\Get(
 *      path="/product/category/{category_id}",
 *      tags={"products"},
 *      summary="Get all products belonging to a category",
 *      @OA\Parameter(
 *          name="category_id",
 *          in="path",
 *          required=true,
 *          description="Category ID",
 *          @OA\Schema(type="integer", example=2)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="List of products filtered by category"
 *      )
 * )
 */
Flight::route('GET /product/category/@category_id', function($category_id){
    Flight::json(Flight::productService()->getProductsByCategory($category_id));
});


/**
 * @OA\Post(
 *      path="/product",
 *      tags={"products"},
 *      summary="Create a new product",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"category_id","name","description","price_cents","stock_qty"},
 *              @OA\Property(property="category_id", type="integer", example=1),
 *              @OA\Property(property="name", type="string", example="Pro Hockey Stick"),
 *              @OA\Property(property="description", type="string", example="High-quality carbon fiber premium hockey stick."),
 *              @OA\Property(property="price_cents", type="integer", example=12999),
 *              @OA\Property(property="image_url", type="string", example="stick.jpg"),
 *              @OA\Property(property="stock_qty", type="integer", example=50),
 *              @OA\Property(property="is_active", type="integer", example=1),
 *              @OA\Property(property="created_at", type="string", example="2025-01-01 10:00:00")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Product created"
 *      )
 * )
 */
Flight::route('POST /product', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::productService()->create($data));
});


/**
 * @OA\Put(
 *      path="/product/{id}",
 *      tags={"products"},
 *      summary="Fully update an existing product",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Product ID",
 *          @OA\Schema(type="integer", example=7)
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"category_id","name","description","price_cents","stock_qty"},
 *              @OA\Property(property="category_id", type="integer", example=2),
 *              @OA\Property(property="name", type="string", example="Updated Hockey Stick"),
 *              @OA\Property(property="description", type="string", example="Updated description here."),
 *              @OA\Property(property="price_cents", type="integer", example=14999),
 *              @OA\Property(property="image_url", type="string", example="stick_updated.jpg"),
 *              @OA\Property(property="stock_qty", type="integer", example=40),
 *              @OA\Property(property="is_active", type="integer", example=1),
 *              @OA\Property(property="created_at", type="string", example="2025-01-15 14:00:00")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Product updated successfully"
 *      )
 * )
 */
Flight::route('PUT /product/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::productService()->update($id, $data));
});


/**
 * @OA\Patch(
 *      path="/product/{id}",
 *      tags={"products"},
 *      summary="Partially update a product",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Product ID",
 *          @OA\Schema(type="integer", example=7)
 *      ),
 *      @OA\RequestBody(
 *          required=false,
 *          @OA\JsonContent(
 *              @OA\Property(property="category_id", type="integer", example=3),
 *              @OA\Property(property="name", type="string", example="Only name changed"),
 *              @OA\Property(property="description", type="string", example="Only description changed"),
 *              @OA\Property(property="price_cents", type="integer", example=15999),
 *              @OA\Property(property="image_url", type="string", example="stick_patch.jpg"),
 *              @OA\Property(property="stock_qty", type="integer", example=35),
 *              @OA\Property(property="is_active", type="integer", example=1),
 *              @OA\Property(property="created_at", type="string", example="2025-02-02 11:11:11")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Product partially updated"
 *      )
 * )
 */
Flight::route('PATCH /product/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::productService()->update($id, $data));
});


/**
 * @OA\Delete(
 *      path="/product/{id}",
 *      tags={"products"},
 *      summary="Delete a product",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Product ID",
 *          @OA\Schema(type="integer", example=10)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Product deleted"
 *      )
 * )
 */
Flight::route('DELETE /product/@id', function($id){
    Flight::json(Flight::productService()->delete($id));
});

?>
