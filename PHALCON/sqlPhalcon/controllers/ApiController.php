<?php 

use Phalcon\Mvc\Micro;
use Phalcon\Http\Response;
use Phalcon\Db\Adapter\Pdo\Mysql as MysqlConnection;

class ApiController {
    private $db;
    private $app;

    public function __construct() {
        $this->db = new MysqlConnection([
            "host"     => "localhost",
            "username" => "root",
            "password" => "R00t//v3",
            "dbname"   => "test",
            "port"     => "3306",
        ]);
        $this->app = new Micro();
    }

   public function insert(stdClass $job):Response {
        if($this->checkIfExist($job) === null) {
            try {
                $phql = "INSERT INTO `Jobs` (id, status) VALUES (:id, :status)";

                $this->db->query(
                    $phql,
                    [
                        'id'     => $job->id,
                        'status' => $job->status,
                    ]
                );
    
                return $this->throwResponse(201, 'Created')->setJsonContent([
                    'status'   => 'OK',
                    'data'     => $job
                ]);
            } catch (Exception $e) {
                return $this->throwResponse(409, 'Conflict')->setJsonContent([
                    'status'   => 'ERROR',
                    'messages' => $e->getMessage()
                ]);
            }
        } else {
            return $this->checkIfExist($job);
        }
   }

   public function checkIfExist(stdClass $job):?Response {
       try {
            $id = $job->id;
            $phql = $this->db->fetchAll("SELECT * FROM Jobs WHERE `id` = $id");

            if (count($phql) > 0) {
                $jobFound = new models\Jobs();
                $jobFound
                    ->setId($phql[0]["id"])
                    ->setStatus($phql[0]["status"])
                ;

                //* SI STATUS DIFFERENT & MEME ID => UPDATE IN DB
                if (($jobFound->getStatus() != $job->status) && ($jobFound->getId() == $job->id)) {
                    return $this->updateJob($jobFound);
                } else {
                    return $this->throwResponse(409, 'Conflict')->setJsonContent([
                        'status'   => 'ERROR',
                        'messages' => 'Id must be unique'
                    ]);
                }
            } else {
                return null;
            }
       } catch (Exception $e) {
            return $this->throwResponse(409, 'Conflict')->setJsonContent([
                'status'   => 'ERROR',
                'messages' => $e->getMessage()
            ]);
       }
   }
   
   public function updateJob(models\Jobs $jobFound):Response {
       $idFound    = $jobFound->getId();
       $newStatus  = $jobFound->getStatus();
       
       try {
            $sql = "UPDATE `Jobs` SET `status` = :status  WHERE `id` = :id";

            $this->db->updateAsDict(
                "Jobs",
                [
                    "status" => $newStatus
                ],
                "id = {$idFound}"
            );
;
            return $this->throwResponse(204, 'Updated')->setJsonContent([
                'status' => 'OK',
                'data'   => [
                    $idFound,
                    $newStatus
                ]
            ]);
        } catch (Exception $e) {
            return $this->throwResponse(409, 'Conflict')->setJsonContent([
                'status'   => 'ERROR',
                'messages' => $e->getMessage()
            ]);
       }
   }

    public function getAll():string {
        try {           
            $Jobs = $this->db->fetchAll("SELECT * FROM Jobs");

            $data = [];

            foreach ($Jobs as $job) {
                $data[] = [
                    'id'     => $job["id"],
                    'status' => $job["status"]
                ];
            }

            return json_encode($data);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteById(int $id):Response {
        try {
            $phql = "DELETE FROM Jobs WHERE id = :id";
    
            $this->db->query(
                $phql,
                [
                    'id' => $id
                ]
            );

            return $this->throwResponse(200, 'Deleted')->setJsonContent([
                'status'   => 'DELETED'
            ]);
        } catch (Exception $e) {
            return $this->throwResponse(409, 'Conflict')->setJsonContent([
                'status'   => 'ERROR',
                'messages' => $e->getMessage()
            ]);
        }
    }

    protected function throwResponse(int $statusCode, string $statusMessage):Response {
        $response = new Response();
        $response->setStatusCode($statusCode, $statusMessage);

        return $response;
    }
}