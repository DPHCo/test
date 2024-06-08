<?php

namespace App\Entity;

use App\Validator\NoSpecificDomain as NoSpecificDomainConstraint;
/**
 * Debido a que solo será para la solución de una pregunta no considero necesario el empleo de Doctrine ORM para llevarla a cabo
 * Aquí se declara la entidad User que será usada en el formulario
 */
class User {
    
    private string $username;
    /**
     * @NoSpecificDomainConstraint
     */
    private string $email;

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }
}