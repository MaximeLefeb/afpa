<?php 

namespace models;

use Phalcon\Mvc\Model;

Class Jobs {
    private int $id;
    private string $status;

    public function getId():?int {
        return $this->id;
    }
    public function setId(int $id) {
        $this->id = $id;
        return $this;
    }

    public function getStatus():?string {
        return $this->status;
    }
    public function setStatus(string $status) {
        $this->status = $status;
        return $this;
    }
}