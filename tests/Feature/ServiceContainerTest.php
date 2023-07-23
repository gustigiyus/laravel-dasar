<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    public function testServiceContainer()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);
    
        self::assertEquals('Foo', $foo1->foo());
        self::assertEquals('Foo', $foo2->foo());
        self::assertNotSame($foo1, $foo2);
    }

    // MENGAMBALIKAN OBJEK YANG BARU TERUS MENERUS (MULTI OBJECT) 
    public function testBind()
    {
        $this->app->bind(Person::class, function ($app) {
            return new Person("Gusti", "Giustianto");
        });

        $person1 = $this->app->make(Person::class); // Closer()  // New Person("Gusti", "Giustianto")
        $person2 = $this->app->make(Person::class); // Closer()  // New Person("Gusti", "Giustianto")
    
        self::assertEquals('Gusti', $person1->firstName);
        self::assertEquals('Gusti', $person2->firstName);
        self::assertNotSame($person1, $person2);
    }


    // MENGAMBALIKAN OBJEK YANG SAMA MESKIPUN ANDA MAMBUAT BARU OBJECT (SINGLE)
    public function testSingelton()
    {
        $this->app->singleton(Person::class, function ($app) {
            return new Person("Gusti", "Giustianto");
        });

        $person1 = $this->app->make(Person::class); // New Person("Gusti", "Giustianto")  IF NOT EXISTS
        $person2 = $this->app->make(Person::class); // RETRUN EXISTING
    
        self::assertEquals('Gusti', $person1->firstName);
        self::assertEquals('Gusti', $person2->firstName);
        self::assertSame($person1, $person2);
    }


      // MENGAMBALIKAN OBJEK YANG SUDAH ADA LANGSUNG SEPERTI SINGELTON (SINGLE)
      public function testInstance()
      {
          
        $person = new Person("Gusti", "Giustianto");
        $this->app->instance(Person::class, $person);
 
  
        $person1 = $this->app->make(Person::class); // $person
        $person2 = $this->app->make(Person::class); // $person
        $person3 = $this->app->make(Person::class); // $person
        $person4 = $this->app->make(Person::class); // $person
    
        self::assertEquals('Gusti', $person1->firstName);
        self::assertEquals('Gusti', $person2->firstName);
        self::assertSame($person1, $person2);
      }
}
