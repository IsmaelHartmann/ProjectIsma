<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Mov;

class disponibilidadeTest2 extends TestCase
{
    use RefreshDatabase;

    public function testMovimentacoesIndex()
    {
        $response = $this->get('/movimentacoes');

        $response->assertStatus(200);

    }

    public function testMovimentacoesCreate()
    {
        $response = $this->get('movimentacoes/create');

        $response->assertStatus(200);
    }

    public function testMovimentacoesViewEdit()
    {
        $this->objMov = new Mov();

        $result = $this->objMov->create([
             'descricao'=>'mov'
         ]);

       $response = $this->get("/movimentacoes/".$result->id);
       $response->assertStatus(200);

       $response = $this->get("/movimentacoes/". $result->id . "/edit");

       $response->assertStatus(200);

       $this->assertEquals("mov",$result->descricao);

    }
}
