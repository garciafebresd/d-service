<?php

use App\Models\Chat;
use App\Repositories\ChatRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChatRepositoryTest extends TestCase
{
    use MakeChatTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ChatRepository
     */
    protected $chatRepo;

    public function setUp()
    {
        parent::setUp();
        $this->chatRepo = App::make(ChatRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateChat()
    {
        $chat = $this->fakeChatData();
        $createdChat = $this->chatRepo->create($chat);
        $createdChat = $createdChat->toArray();
        $this->assertArrayHasKey('id', $createdChat);
        $this->assertNotNull($createdChat['id'], 'Created Chat must have id specified');
        $this->assertNotNull(Chat::find($createdChat['id']), 'Chat with given id must be in DB');
        $this->assertModelData($chat, $createdChat);
    }

    /**
     * @test read
     */
    public function testReadChat()
    {
        $chat = $this->makeChat();
        $dbChat = $this->chatRepo->find($chat->id);
        $dbChat = $dbChat->toArray();
        $this->assertModelData($chat->toArray(), $dbChat);
    }

    /**
     * @test update
     */
    public function testUpdateChat()
    {
        $chat = $this->makeChat();
        $fakeChat = $this->fakeChatData();
        $updatedChat = $this->chatRepo->update($fakeChat, $chat->id);
        $this->assertModelData($fakeChat, $updatedChat->toArray());
        $dbChat = $this->chatRepo->find($chat->id);
        $this->assertModelData($fakeChat, $dbChat->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteChat()
    {
        $chat = $this->makeChat();
        $resp = $this->chatRepo->delete($chat->id);
        $this->assertTrue($resp);
        $this->assertNull(Chat::find($chat->id), 'Chat should not exist in DB');
    }
}
