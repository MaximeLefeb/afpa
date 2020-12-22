<?php

namespace App\tests\EntityTest;

class UserTest extends KernelTestCase {
    private $getClient;
    private $validator;

    protected function setUp() {
        self::bootKernel();
        $this->validator = self::$container->get("validator");
    }

    public function getClient(string $email = null) {
        $client = (new User())->setEmail($email);
        return $client;
    }

    public function testIsValidNotBlankEmail() {
        $client = $this->getClient('Tapir@amazon.com');
        $errors = $this->validator->validate($client);
        $this->assertCount(1, $errors);
        $this->assertEquals('Le prénom est obligatoire', $errors[0]->getMessage(), 'Test echec sur la methode : testIsValidNotBlankEmail');
    }
}