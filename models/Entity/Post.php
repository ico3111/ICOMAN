<?php

namespace Model\Entity;

use Model\ChannelModel;
use Model\UserModel;

final class Post extends Entity {
    
    private string $title;
    private string $content;
    private string $date;
    private User $user;
    private Channel $channel;
    
    public function __construct(int $id, string $title, string $content, string $date, User $user, Channel $channel) 
    {
        parent::__construct($id);
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
        $this->user = $user;
        $this->channel = $channel;
    }

    public static function fromArray(array $data) : Post
    {
        $userModel = new UserModel();
        $channelModel = new ChannelModel();
        
        return new Post(
            $data['id'], 
            $data['post_title'], 
            $data['post_content'], 
            $data['post_date'], 
            $userModel->selectOne($data['user_id']),
            $channelModel->selectOne($data['channel_id'])
        );
    }

    public static function fromCollection(array $data): array
    {
        $arrayData = [];
        foreach($data as $row) {
            $arrayData[] = self::fromArray($row);
        }

        return $arrayData;
    }

    public function getTitle(): string { return $this->title; }
    public function setTitle(string $title): void { $this->title = $title; }

    public function getContent(): string { return $this->content; }
    public function setContent(string $content): void { $this->content = $content; }

    public function getDate(): string { return $this->date; }
    public function setDate(string $date): void { $this->date = $date; }

    public function getUser(): User { return $this->user; }
    public function setUser(User $user): void { $this->user = $user; }

    public function getChannel(): Channel { return $this->channel; }
    public function setChannel(Channel $channel): void { $this->channel = $channel; }
}
