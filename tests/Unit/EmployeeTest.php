<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Company;
use App\Models\Employee;

class EmployeeTest extends TestCase
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
        $company_id = Company::all()->pluck('id')->toArray();

        $key = array_rand($company_id);

        $data = Employee::create([
            "company_id" => $company_id[$key],
            "first_name" => "first",
            "last_name" => "last",
        ]);
        
        $this->assertDatabaseHas('employees', [
            "company_id" => $company_id[$key],
            "first_name" => "first",
            "last_name" => "last",
        ]);
        
        Employee::find($data->id)->update([
            "company_id" => $company_id[$key],
            "first_name" => "first update",
            "last_name" => "last update",
        ]);
        
        $this->assertDatabaseHas('employees', [
            "company_id" => $company_id[$key],
            "first_name" => "first update",
            "last_name" => "last update",
        ]);
        
        Employee::destroy($data->id);
        
        $this->assertDatabaseMissing('companies', [
            "name" => "Update Test",
        ]);
    }
}
