<?php

/**
 * @OA\Get(
 *      path="/review",
 *      tags={"reviews"},
 *      summary="Get all reviews",
 *      @OA\Response(
 *          response=200,
 *          description="List of all reviews"
 *      )
 * )
 */
Flight::route('GET /review', function(){
    Flight::json(Flight::reviewService()->getAll());
});


/**
 * @OA\Get(
 *      path="/review/{id}",
 *      tags={"reviews"},
 *      summary="Get review by ID",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Review ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Returns a single review"
 *      )
 * )
 */
Flight::route('GET /review/@id', function($id){
    Flight::json(Flight::reviewService()->getById($id));
});


/**
 * @OA\Get(
 *      path="/review/product/{product_id}",
 *      tags={"reviews"},
 *      summary="Get all reviews for a product",
 *      @OA\Parameter(
 *          name="product_id",
 *          in="path",
 *          required=true,
 *          description="Product ID",
 *          @OA\Schema(type="integer", example=5)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="List of reviews for a product"
 *      )
 * )
 */
Flight::route('GET /review/product/@product_id', function($product_id){
    Flight::json(Flight::reviewService()->getReviewsByProductId($product_id));
});


/**
 * @OA\Post(
 *      path="/review",
 *      tags={"reviews"},
 *      summary="Create a new review",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"product_id", "user_id", "rating"},
 *              @OA\Property(property="product_id", type="integer", example=5),
 *              @OA\Property(property="user_id", type="integer", example=2),
 *              @OA\Property(property="rating", type="integer", example=5),
 *              @OA\Property(property="title", type="string", example="Amazing product!"),
 *              @OA\Property(property="body", type="string", example="Really great quality."),
 *              @OA\Property(property="created_at", type="string", example="2025-01-01 14:22:00")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Review created"
 *      )
 * )
 */
Flight::route('POST /review', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::reviewService()->create($data));
});


/**
 * @OA\Put(
 *      path="/review/{id}",
 *      tags={"reviews"},
 *      summary="Fully update a review",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Review ID",
 *          @OA\Schema(type="integer", example=3)
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"product_id", "user_id", "rating"},
 *              @OA\Property(property="product_id", type="integer", example=5),
 *              @OA\Property(property="user_id", type="integer", example=2),
 *              @OA\Property(property="rating", type="integer", example=4),
 *              @OA\Property(property="title", type="string", example="Updated title"),
 *              @OA\Property(property="body", type="string", example="Updated review body."),
 *              @OA\Property(property="created_at", type="string", example="2025-02-01 09:45:00")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Review updated successfully"
 *      )
 * )
 */
Flight::route('PUT /review/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::reviewService()->update($id, $data));
});


/**
 * @OA\Patch(
 *      path="/review/{id}",
 *      tags={"reviews"},
 *      summary="Partially update a review",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Review ID",
 *          @OA\Schema(type="integer", example=3)
 *      ),
 *      @OA\RequestBody(
 *          required=false,
 *          @OA\JsonContent(
 *              @OA\Property(property="rating", type="integer", example=5),
 *              @OA\Property(property="title", type="string", example="Only title changed"),
 *              @OA\Property(property="body", type="string", example="Only body changed"),
 *              @OA\Property(property="created_at", type="string", example="2025-02-20 10:00:00")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Review partially updated"
 *      )
 * )
 */
Flight::route('PATCH /review/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::reviewService()->update($id, $data));
});


/**
 * @OA\Delete(
 *      path="/review/{id}",
 *      tags={"reviews"},
 *      summary="Delete a review",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Review ID",
 *          @OA\Schema(type="integer", example=3)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Review deleted"
 *      )
 * )
 */
Flight::route('DELETE /review/@id', function($id){
    Flight::json(Flight::reviewService()->delete($id));
});

?>
