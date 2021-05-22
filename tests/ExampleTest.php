<?php

use App\Models\User;
use App\Models\Contacts;
use Illuminate\Support\Str;
use App\Models\PersonalCollection;

class ExampleTest extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();

        $this->user    = User::factory()->create(['api_token' =>  base64_encode(Str::random(40))]);
        $this->contact = Contacts::factory()->create();
        $this->item    = PersonalCollection::factory()->create();
    }

    /**
     * @test
     */
    public function testLoginAPI()
    {
        $response = $this->call('GET', 'api/authenticate', [
            'email'    => $this->user->email,
            'password' => '123456'
        ])->assertStatus(200);

        $this->assertEquals(200, $response->status());

        $response->assertJsonStructure([
            'api_token',
        ]);
    }

    /**
     * @test
     */
    public function testAPIlistCollection()
    {
        $this->call('GET', 'api/personalCollection/allCollection', [
            'header' => ['Authorization'=>$this->user->api_token],
        ])->assertStatus(200);
    }

    /**
     * @test
     */
    public function testAPIlistContacts()
    {
        $this->call('GET', 'api/contacts/allContacts', [
            'header' => ['Authorization'=>$this->user->api_token],
        ])->assertStatus(200);
    }

    /**
     * @test
     */
    public function testAPIFindItemCollection()
    {
        $this->call('GET', 'api/personalCollection/find?personal_collection_id='.$this->item->id, [
            'header' => ['Authorization'=>$this->user->api_token],
        ])->assertStatus(200);
    }

    /**
     * @test
     */
    public function testAPIFindContact()
    {
        $this->call('GET', 'api/contacts/find?contact_id='.$this->contact->id, [
            'header' => ['Authorization'=>$this->user->api_token],
        ])->assertStatus(200);
    }
}
