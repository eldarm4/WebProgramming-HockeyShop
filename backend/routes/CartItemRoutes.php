<?php

/**
 * @OA\Get(
 *      path="/cartitem",
 *      tags={"cart items"},
 *      summary="Get all cart items",
 *      @OA\Response(
 *          response=200,
 *          description="List of all cart items"
 *      )
 * )
 */
Flight::route('GET /cartitem', function(){
    Flight::json(Flight::cartItemService()->getAll());
});


/**
 * @OA\Get(
 *      path="/cartitem/{id}",
 *      tags={"cart items"},
 *      summary="Get cart item by ID",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Cart item ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Returns a single cart item"
 *      )
 * )
 */
Flight::route('GET /cartitem/@id', function($id){
    Flight::json(Flight::cartItemService()->getById($id));
});


/**
 * @OA\Get(
 *      path="/cartitem/cart/{cart_id}",
 *      tags={"cart items"},
 *      summary="Get all items inside a specific cart",
 *      @OA\Parameter(
 *          name="cart_id",
 *          in="path",
 *          required=true,
 *          description="Cart ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Returns all items inside the given cart"
 *      )
 * )
 */
Flight::route('GET /cartitem/cart/@cart_id', function($cart_id){
    Flight::json(Flight::cartItemService()->getItemsByCartId($cart_id));
});


/**
 * @OA\Post(
 *      path="/cartitem",
 *      tags={"cart items"},
 *      summary="Create a new cart item",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"cart_id", "product_id", "quantity"},
 *              @OA\Property(property="cart_id", type="integer", example=1),
 *              @OA\Property(property="product_id", type="integer", example=2),
 *              @OA\Property(property="quantity", type="integer", example=3),
 *              @OA\Property(property="created_at", type="string", example="2025-01-01 12:00:00")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Cart item created successfully"
 *      )
 * )
 */
Flight::route('POST /cartitem', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::cartItemService()->create($data));
});


/**
 * @OA\Put(
 *      path="/cartitem/{id}",
 *      tags={"cart items"},
 *      summary="Update cart item completely",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Cart item ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"cart_id", "product_id", "quantity"},
 *              @OA\Property(property="cart_id", type="integer", example=1),
 *              @OA\Property(property="product_id", type="integer", example=2),
 *              @OA\Property(property="quantity", type="integer", example=5),
 *              @OA\Property(property="created_at", type="string", example="2025-02-10 14:00:00")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Cart item fully updated"
 *      )
 * )
 */
Flight::route('PUT /cartitem/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::cartItemService()->update($id, $data));
});


/**
 * @OA\Patch(
 *      path="/cartitem/{id}",
 *      tags={"cart items"},
 *      summary="Partially update a cart item",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Cart item ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(property="cart_id", type="integer", example=1),
 *              @OA\Property(property="product_id", type="integer", example=2),
 *              @OA\Property(property="quantity", type="integer", example=4),
 *              @OA\Property(property="created_at", type="string", example="2025-03-01 10:00:00")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Cart item partially updated"
 *      )
 * )
 */
Flight::route('PATCH /cartitem/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::cartItemService()->update($id, $data));
});


/**
 * @OA\Delete(
 *      path="/cartitem/{id}",
 *      tags={"cart items"},
 *      summary="Delete cart item by ID",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Cart item ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Cart item deleted"
 *      )
 * )
 */
Flight::route('DELETE /cartitem/@id', function($id){
    Flight::json(Flight::cartItemService()->delete($id));
});

?>
