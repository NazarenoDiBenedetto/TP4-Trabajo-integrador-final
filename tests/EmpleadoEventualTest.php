<?php

require_once 'EmpleadoTest.php';

class EmpleadoEventualTest extends EmpleadoTest {

 public function crear($nombre = "Neno", $apellido = "Dibe", $dni = 42142347, $salario = 2000, $fecha = null, Array $montos = [100, 200, 300, 400])

    {
        $r = new \App\EmpleadoEventual($nombre, $apellido, $dni, $salario, $montos);
        return $r;
    }

    public function testCalculaComision()

    {
        $r= $this->crear("Neno", "Dibe", 42142347, 2000);
        $this->assertEquals(12.5, $r->calcularComision());

    }

    public function testCalculaComisionConMontoCeroONegativo()

    {   $this->expectException(\Exception::class);
        $r= $this->crear("Neno", "Dibe", 42142347, 2000, null, [0,-200, 300, 400]);

    }

    public function testCalculaIngresoTotal()
    {
       $r= $this->crear("Neno" , "Dibe", 42142347, 2000);
        $this->assertEquals(1012.5, $r->calcularIngresoTotal());

    }
}