<?php

/**
 * @OA\Get(
 *      path="/cart",
 *      tags={"cart"},
 *      summary="Get all carts",
 *      @OA\Response(
 *          response=200,
 *          description="List of all carts"
 *      )
 * )
 */
Flight::route('GET /cart', function(){
    Flight::json(Flight::cartService()->getAll());
});


/**
 * @OA\Get(
 *      path="/cart/{id}",
 *      tags={"cart"},
 *      summary="Get cart by ID",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Cart ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Returns a specific cart"
 *      )
 * )
 */
Flight::route('GET /cart/@id', function($id){
    Flight::json(Flight::cartService()->getById($id));
});


/**
 * @OA\Get(
 *      path="/cart/user/{user_id}",
 *      tags={"cart"},
 *      summary="Get a cart by user ID",
 *      @OA\Parameter(
 *          name="user_id",
 *          in="path",
 *          required=true,
 *          description="User ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Returns the cart owned by the given user"
 *      )
 * )
 */
Flight::route('GET /cart/user/@user_id', function($user_id){
    Flight::json(Flight::cartService()->getCartByUserId($user_id));
});


/**
 * @OA\Post(
 *      path="/cart",
 *      tags={"cart"},
 *      summary="Create a new cart",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"user_id"},
 *              @OA\Property(property="user_id", type="integer", example=1),
 *              @OA\Property(property="created_at", type="string", example="2025-01-01 12:00:00")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Cart created successfully"
 *      )
 * )
 */
Flight::route('POST /cart', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::cartService()->create($data));
});


/**
 * @OA\Put(
 *      path="/cart/{id}",
 *      tags={"cart"},
 *      summary="Fully update a cart",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Cart ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"user_id"},
 *              @OA\Property(property="user_id", type="integer", example=2),
 *              @OA\Property(property="created_at", type="string", example="2025-01-15 10:30:00")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Cart updated successfully"
 *      )
 * )
 */
Flight::route('PUT /cart/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::cartService()->update($id, $data));
});


/**
 * @OA\Patch(
 *      path="/cart/{id}",
 *      tags={"cart"},
 *      summary="Partially update a cart",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Cart ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(property="user_id", type="integer", example=3),
 *              @OA\Property(property="created_at", type="string", example="2025-02-10 09:00:00")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Cart partially updated"
 *      )
 * )
 */
Flight::route('PATCH /cart/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::cartService()->update($id, $data));
});


/**
 * @OA\Delete(
 *      path="/cart/{id}",
 *      tags={"cart"},
 *      summary="Delete a cart",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Cart ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Cart deleted"
 *      )
 * )
 */
Flight::route('DELETE /cart/@id', function($id){
    Flight::json(Flight::cartService()->delete($id));
});

?>
