<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChatApiTest extends TestCase
{
    use MakeChatTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateChat()
    {
        $chat = $this->fakeChatData();
        $this->json('POST', '/api/v1/chats', $chat);

        $this->assertApiResponse($chat);
    }

    /**
     * @test
     */
    public function testReadChat()
    {
        $chat = $this->makeChat();
        $this->json('GET', '/api/v1/chats/'.$chat->id);

        $this->assertApiResponse($chat->toArray());
    }

    /**
     * @test
     */
    public function testUpdateChat()
    {
        $chat = $this->makeChat();
        $editedChat = $this->fakeChatData();

        $this->json('PUT', '/api/v1/chats/'.$chat->id, $editedChat);

        $this->assertApiResponse($editedChat);
    }

    /**
     * @test
     */
    public function testDeleteChat()
    {
        $chat = $this->makeChat();
        $this->json('DELETE', '/api/v1/chats/'.$chat->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/chats/'.$chat->id);

        $this->assertResponseStatus(404);
    }
}
