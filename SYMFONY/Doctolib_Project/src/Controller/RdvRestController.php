<?php 

namespace App\Controller;

use App\DTO\RdvDTO;
use App\Entity\Rdv;
use App\Mapper\RdvMapper;
use App\Service\RdvService;
use FOS\RestBundle\View\View;
use App\Controller\RdvRestController;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\Exception\RdvServiceException;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class RdvRestController extends AbstractFOSRestController {
    private $rdvService;
    private $entityManager;
    private $rdvMapper;

    const URI_RDV_COLLECTION         = "/rdvs";
    const URI_RDV_INSTANCE           = "/rdv/{id}";
    const URI_RDV_PATIENT_INSTANCE   = "/rdv/patient/{idPatient}";
    const URI_RDV_PRATICIEN_INSTANCE = "/rdv/praticien/{idPraticien}";

    public function __construct(RdvService $rdvService, EntityManagerInterface $entityManager, RdvMapper $mapper) {
        $this->rdvService       = $rdvService;
        $this->entityManager    = $entityManager;
        $this->rdvServiceMapper = $mapper;
    }

    /**
     * @Get(RdvRestController::URI_RDV_COLLECTION)
     */
    public function searchAll() {
        try {
            $rdvs = $this->rdvService->searchAll();
        } catch(RdvServiceException $e){
            return View::create($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, ["Content-type" => "application/json"]);
        }

        if($rdvs) {
            return View::create($rdvs, Response::HTTP_OK, ["Content-type" => "application/json"]);
        } else {
            return View::create($rdvs, Response::HTTP_NOT_FOUND, ["Content-type" => "application/json"]);
        }
    }

    /**
     * @Post(RdvRestController::URI_RDV_COLLECTION)
     * @ParamConverter("rdvDTO", converter="fos_rest.request_body")
     * @return void
     */
    public function create(RdvDTO $rdvDTO) {
        try {
            $rdv = new Rdv();
            $this->rdvService->persist($rdv, $rdvDTO);
            return View::create([], Response::HTTP_CREATED, ["Content-type" => "application/json"]);
        } catch (PraticienServiceException $e) {
            return View::create($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, ["Content-type" => "application/json"]);
        }
    }

    /**
     * @Delete(RdvRestController::URI_RDV_INSTANCE)
     * @param [type] $id
     * @return void
     */
    public function remove(Rdv $rdv) {
        try {
            $this->rdvService->delete($rdv);
            return View::create([], Response::HTTP_NO_CONTENT, ["Content-type" => "application/json"]);
        } catch(RdvServiceException $e){
            return View::create($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, ["Content-type" => "application/json"]);
        }
    }

    /**
     * @Get(RdvRestController::URI_RDV_INSTANCE)
     * @return void
     */
    public function searchById(int $id) {
        try {
            $rdvDTO = $this->rdvService->searchById($id);
        }catch (RdvServiceException $e){
            return View::create($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, ["Content-type" => "application/json"]);
        }

        if($rdvDTO){
            return View::create($rdvDTO, Response::HTTP_OK, ["Content-type" => "application/json"]);
        } else {
            return View::create([], Response::HTTP_NOT_FOUND, ["Content-type" => "application/json"]);
        }
    }

    /**
     * @Get(RdvRestController::URI_RDV_PATIENT_INSTANCE)
     * @return void
     */
    public function searchRdvByIdPatient(int $idPatient) {
        try {
            $rdvDTO = $this->rdvService->searchByIdPatient($idPatient);
        }catch (RdvServiceException $e){
            return View::create($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, ["Content-type" => "application/json"]);
        }

        if($rdvDTO){
            return View::create($rdvDTO, Response::HTTP_OK, ["Content-type" => "application/json"]);
        } else {
            return View::create([], Response::HTTP_NOT_FOUND, ["Content-type" => "application/json"]);
        }
    }

    /**
     * @Get(RdvRestController::URI_RDV_PRATICIEN_INSTANCE)
     * @return void
     */
    public function searchRdvByIdPraticien(int $idPraticien) {
        try {
            $rdvDTO = $this->rdvService->searchByIdPraticien($idPraticien);
        }catch (RdvServiceException $e){
            return View::create($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, ["Content-type" => "application/json"]);
        }

        if($rdvDTO){
            return View::create($rdvDTO, Response::HTTP_OK, ["Content-type" => "application/json"]);
        } else {
            return View::create([], Response::HTTP_NOT_FOUND, ["Content-type" => "application/json"]);
        }
    }
}