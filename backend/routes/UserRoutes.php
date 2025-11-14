<?php

/**
 * @OA\Get(
 *      path="/user",
 *      tags={"users"},
 *      summary="Get all users",
 *      @OA\Response(
 *          response=200,
 *          description="List of all users"
 *      )
 * )
 */
Flight::route('GET /user', function(){
    Flight::json(Flight::userService()->getAll());
});


/**
 * @OA\Get(
 *      path="/user/{id}",
 *      tags={"users"},
 *      summary="Get user by ID",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="User ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Returns a user with the given ID"
 *      )
 * )
 */
Flight::route('GET /user/@id', function($id){
    Flight::json(Flight::userService()->getById($id));
});


/**
 * @OA\Get(
 *      path="/user/email/{email}",
 *      tags={"users"},
 *      summary="Get user by email",
 *      @OA\Parameter(
 *          name="email",
 *          in="path",
 *          required=true,
 *          description="User email address",
 *          @OA\Schema(type="string", example="test@example.com")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Returns the user with the given email"
 *      )
 * )
 */
Flight::route('GET /user/email/@email', function($email){
    Flight::json(Flight::userService()->getUserByEmail($email));
});


/**
 * @OA\Post(
 *      path="/user",
 *      tags={"users"},
 *      summary="Create a new user",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"username","email","password"},
 *              @OA\Property(property="username", type="string", example="johndoe"),
 *              @OA\Property(property="email", type="string", example="johndoe@example.com"),
 *              @OA\Property(property="password", type="string", example="secret123"),
 *              @OA\Property(property="created_at", type="string", example="2025-01-01 10:00:00")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="User created successfully"
 *      )
 * )
 */
Flight::route('POST /user', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::userService()->create($data));
});


/**
 * @OA\Put(
 *      path="/user/{id}",
 *      tags={"users"},
 *      summary="Fully update a user",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="User ID",
 *          @OA\Schema(type="integer", example=2)
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"username","email","password"},
 *              @OA\Property(property="username", type="string", example="updatedUser"),
 *              @OA\Property(property="email", type="string", example="updated@example.com"),
 *              @OA\Property(property="password", type="string", example="newpassword123"),
 *              @OA\Property(property="created_at", type="string", example="2025-02-01 12:00:00")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="User fully updated"
 *      )
 * )
 */
Flight::route('PUT /user/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::userService()->update($id, $data));
});


/**
 * @OA\Patch(
 *      path="/user/{id}",
 *      tags={"users"},
 *      summary="Partially update a user",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="User ID",
 *          @OA\Schema(type="integer", example=2)
 *      ),
 *      @OA\RequestBody(
 *          required=false,
 *          @OA\JsonContent(
 *              @OA\Property(property="username", type="string", example="patchedUser"),
 *              @OA\Property(property="email", type="string", example="patched@example.com"),
 *              @OA\Property(property="password", type="string", example="patchedPassword"),
 *              @OA\Property(property="created_at", type="string", example="2025-02-15 11:20:00")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="User partially updated"
 *      )
 * )
 */
Flight::route('PATCH /user/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::userService()->update($id, $data));
});


/**
 * @OA\Delete(
 *      path="/user/{id}",
 *      tags={"users"},
 *      summary="Delete a user by ID",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="User ID",
 *          @OA\Schema(type="integer", example=2)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="User deleted successfully"
 *      )
 * )
 */
Flight::route('DELETE /user/@id', function($id){
    Flight::json(Flight::userService()->delete($id));
});

?>
