<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Company;

class CompanyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_crud()
    {
        $data = Company::create([
            "name" => "Test",
        ]);
        
        $this->assertDatabaseHas('companies', [
            "name" => "Test",
        ]);
        
        Company::find($data->id)->update([
            "name" => "Update Test",
        ]);
        
        $this->assertDatabaseHas('companies', [
            "name" => "Update Test",
        ]);
        
        Company::destroy($data->id);
        
        $this->assertDatabaseMissing('companies', [
            "name" => "Update Test",
        ]);
    }
}
