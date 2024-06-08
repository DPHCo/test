<?php

namespace App\Tests\Service;

use App\Service\CalcService;
use PHPUnit\Framework\TestCase;

class CalcServiceTest extends TestCase {
    public function testAdd() {
        $calcService = new CalcService();
        $result = $calcService->add(2, 3);
        
        $this->assertEquals(5, $result);
    }
}