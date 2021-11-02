<?php 

abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase {
 

    public function testArrojaNombreApellido()
    {
        $r = $this->crear("Neno", "Dibe");
        $this->assertEquals("Neno Dibe", $r->getNombreApellido());
    }

    public function testNoArrojaNombreSiEstaVacio()
    {
        $this->expectException(\Exception::class);
        $r = $this->crear("", "Dibe");
    }

    public function testNoArrojaApellidoSiEstaVacio()
    {
        $this->expectException(\Exception::class);
        $r = $this->crear("Neno" , "");
    }

    public function testArrojaDNI()
    {
        $r = $this->crear(42142347);
        $this->assertEquals(42142347, $r->getDNI());
    }

    public function testNoArrojaDNISiEstaVacio()
    {
        $this->expectException(\Exception::class);
        $r = $this->crear("Neno", "Dibe", null, 9999);
    }

    public function testNoArrojaDNISiHayUnaLetra()
    {
        $this->expectException(\Exception::class);
        $r = $this->crear("Neno", "Dibe", "a", 9999);
    }

    public function testArrojaSalario()
    {
        $r = $this->crear(2000);
        $this->assertEquals(2000, $r->getSalario());
    }

    public function testNoArrojaSalario()
    {
        $this->expectException(\Exception::class);
        $r = $this->crear("Neno", "Dibe", 9999, null);
    }


    public function testSeleccionaSector() 
    {
        $sector = "Permanente";
        $this->assertTrue(true);
    }

    public function testObtieneSector() 
    {
    $s = $this->crear("Neno", "Dibe", 9999, 2000, null);
    $s->setSector("Permanente");
    $this->assertEquals("Permanente",$s->getSector()); 
    }


    public function test__toString()
    {
      $r = $this->crear("Neno", "Dibe", 42142347, 9999);
      $this->assertEquals("Neno Dibe 42142347 9999", $r->__toString());
    }
    
}
