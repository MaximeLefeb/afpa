<?php 

namespace App\Controller;

use App\Service\UserService;
use FOS\RestBundle\View\View;
use OpenApi\Annotations as OA;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Response;
use App\Service\Exception\UserServiceException;
use FOS\RestBundle\Controller\AbstractFOSRestController;

/**
 * @OA\Info(
 *      title="User Management",
 *      description="User manager (GET)",
 *      version="0.01",
 * )
 */
class UserRestController extends AbstractFOSRestController {
    private $UserService;
    private $entityManager;

    const URI_USER_INSTANCE = "/user/{email}";

    public function __construct(UserService $UserService, EntityManagerInterface $entityManager) {
        $this->UserService      = $UserService;
        $this->entityManager    = $entityManager;
    }

    /**
     * @OA\Get(
     *   path="/user/{email}",
     *   tags={"User"},
     *   summary="Return a UserDTO object",
     *   description="Return information about a UserDTO",
     *   @OA\Parameter(
     *     name="email",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Response(
     *     response="200",
     *     description="The User",
     *   ),
     *   @OA\Response(
     *     response="500",
     *     description="Internal server Error. Please contact us",
     *   ),
     *   @OA\Response(
     *     response="404",
     *     description="No user found for this email",
     *   )
     * )  
     * @Get(UserRestController::URI_USER_INSTANCE)
     * @return void
     */
    public function searchByEmail(String $email) {
        try {
            $userDTO = $this->UserService->searchByEmail($email);
        }catch (UserServiceException $e){
            return View::create($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, ["Content-type" => "application/json"]);
        } 

        if($userDTO){
            return View::create($userDTO, Response::HTTP_OK, ["Content-type" => "application/json"]);
        } else {
            return View::create([], Response::HTTP_NOT_FOUND, ["Content-type" => "application/json"]);
        }
    }
}
