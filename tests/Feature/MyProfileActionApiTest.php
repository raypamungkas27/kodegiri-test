<?php

use App\Models\Document;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\UploadedFile;

class MyProfileActionApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_user_can_update_profile_with_valid_data()
    {
        $user = User::factory()->create([
            'id' => (string) Str::uuid(),
            'name' => $this->faker->name,
            'email' => 'testin333g@testing.com',
            'password' => bcrypt('Kodegiri123!'),
            'nohp' => '081234567890',
        ]);

        $token = auth()->login($user);

        $data = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'nohp' => '987654321',
            'company' => 'Updated Company',
            'divisi' => 'Updated Divisi',
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('POST', 'api/admin/my-profile/action', $data);


        $response->assertStatus(200);
    }

    public function test_index_documents()
    {
        $user = User::factory()->create([
            'id' => (string) Str::uuid(),
            'name' => $this->faker->name,
            'email' => 'testin333g@testing.com',
            'password' => bcrypt('Kodegiri123!'),
            'nohp' => '081234567890',
        ]);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('GET', '/api/admin/document');

        $response->assertStatus(200);
    }

    public function test_create_documents()
    {
        $user = User::factory()->create([
            'id' => (string) Str::uuid(),
            'name' => $this->faker->name,
            'email' => 'testin333g@testing.com',
            'password' => bcrypt('Kodegiri123!'),
            'nohp' => '081234567890',
        ]);

        $token = auth()->login($user);

        $file = UploadedFile::fake()->create('document.png', 1024);
        $data = [
            'title' => 'Updated Name',
            'content' => 'updated@example.com',
            'tanggal_signing' => '987654321',
            'jabatan_signing' => 'Updated Company',
            'nama_signing' => 'Updated Divisi',
            'signing' => $file
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('POST', '/api/admin/document', $data);

        $response->assertStatus(200);
    }

    public function test_show_documents()
    {
        $user = User::factory()->create([
            'id' => (string) Str::uuid(),
            'name' => $this->faker->name,
            'email' => 'testin333g@testing.com',
            'password' => bcrypt('Kodegiri123!'),
            'nohp' => '081234567890',
        ]);

        $token = auth()->login($user);

        $file = UploadedFile::fake()->create('document.png', 1024);
        $id = (string) Str::uuid();

        $data = Document::factory()->create([
            'id' => $id,
            'title' => 'Updated Name',
            'content' => 'updated@example.com',
            'tanggal_signing' => '987654321',
            'jabatan_signing' => 'Updated Company',
            'nama_signing' => 'Updated Divisi',
            'signing' => $file
        ]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('GET', '/api/admin/document/' . $id);


        $response->assertStatus(200);
    }

    public function test_edit_documents()
    {
        $user = User::factory()->create([
            'id' => (string) Str::uuid(),
            'name' => $this->faker->name,
            'email' => 'testin333g@testing.com',
            'password' => bcrypt('Kodegiri123!'),
            'nohp' => '081234567890',
        ]);

        $token = auth()->login($user);

        $file = UploadedFile::fake()->create('document.png', 1024);
        $id = (string) Str::uuid();

        $data = Document::factory()->create([
            'id' => $id,
            'title' => 'Updated Name',
            'content' => 'updated@example.com',
            'tanggal_signing' => '987654321',
            'jabatan_signing' => 'Updated Company',
            'nama_signing' => 'Updated Divisi',
            'signing' => $file
        ]);


        $edit = [
            'title' => 'Updated Name',
            'content' => 'updated@example.com',
            'tanggal_signing' => '987654321',
            'jabatan_signing' => 'Updated Company',
            'nama_signing' => 'Updated Divisi',
            '_method' => 'put'
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('POST', '/api/admin/document/' . $id, $edit);


        $response->assertStatus(200);
    }

    public function test_delete_documents()
    {
        $user = User::factory()->create([
            'id' => (string) Str::uuid(),
            'name' => $this->faker->name,
            'email' => 'testin333g@testing.com',
            'password' => bcrypt('Kodegiri123!'),
            'nohp' => '081234567890',
        ]);

        $token = auth()->login($user);

        $file = UploadedFile::fake()->create('document.png', 1024);
        $id = (string) Str::uuid();

        $data = Document::factory()->create([
            'id' => $id,
            'title' => 'Updated Name',
            'content' => 'updated@example.com',
            'tanggal_signing' => '987654321',
            'jabatan_signing' => 'Updated Company',
            'nama_signing' => 'Updated Divisi',
            'signing' => $file
        ]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('DELETE', '/api/admin/document/' . $id);


        $response->assertStatus(200);
    }

    public function test_send_email_documents()
    {
        $user = User::factory()->create([
            'id' => (string) Str::uuid(),
            'name' => $this->faker->name,
            'email' => 'testin333g@testing.com',
            'password' => bcrypt('Kodegiri123!'),
            'nohp' => '081234567890',
        ]);

        $token = auth()->login($user);

        $file = UploadedFile::fake()->create('document.png', 1024);
        $id = (string) Str::uuid();

        $data = Document::factory()->create([
            'id' => $id,
            'title' => 'Updated Name',
            'content' => 'updated@example.com',
            'tanggal_signing' => '987654321',
            'jabatan_signing' => 'Updated Company',
            'nama_signing' => 'Updated Divisi',
            'signing' => $file
        ]);

        $input = [
            'email[]' => 'pamungkasray229@gmail.com'
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('POST', '/api/admin/document/send-email/' . $id, $input);


        $response->assertStatus(200);
    }
}
