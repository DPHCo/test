<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloControllerTest extends WebTestCase
{
    public function testSaludo() {
        $client = static::createClient();
        $client->request('GET', '/hello/John');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString('Hello John', $client->getResponse()->getContent());
    }

    public function testSaludoSinNombre() {
        $client = static::createClient();
        $client->request('GET', '/hello');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString('Hello World', $client->getResponse()->getContent());
    }
}
