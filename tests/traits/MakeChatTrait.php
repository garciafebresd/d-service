<?php

use Faker\Factory as Faker;
use App\Models\Chat;
use App\Repositories\ChatRepository;

trait MakeChatTrait
{
    /**
     * Create fake instance of Chat and save it in database
     *
     * @param array $chatFields
     * @return Chat
     */
    public function makeChat($chatFields = [])
    {
        /** @var ChatRepository $chatRepo */
        $chatRepo = App::make(ChatRepository::class);
        $theme = $this->fakeChatData($chatFields);
        return $chatRepo->create($theme);
    }

    /**
     * Get fake instance of Chat
     *
     * @param array $chatFields
     * @return Chat
     */
    public function fakeChat($chatFields = [])
    {
        return new Chat($this->fakeChatData($chatFields));
    }

    /**
     * Get fake data of Chat
     *
     * @param array $postFields
     * @return array
     */
    public function fakeChatData($chatFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'viewed_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word,
            'text' => $fake->word,
            'calendar_service_id' => $fake->randomDigitNotNull,
            'employee_id' => $fake->randomDigitNotNull,
            'client_id' => $fake->randomDigitNotNull,
            'json_info' => $fake->text,
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $chatFields);
    }
}
