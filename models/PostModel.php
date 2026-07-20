<?php

namespace Model;

use Model\Entity\Post;

final class PostModel extends Model
{
    public function selectAll(int $channelId): array
    {
        $query = "SELECT posts.*
                    FROM posts
                   WHERE channel_id = :id";

        $data = $this->db->select($query, [':id' => $channelId]);

        return Post::fromCollection($data);
    }

    public function selectOne(int $postId): ?Post
    {
        $query = "SELECT posts.*
                    FROM posts
                   WHERE posts.id = :id";

        $data = $this->db->select($query, [':id' => $postId]);

        if (empty($data)) { return null; }

        return Post::fromArray($data[0]);
    }

    public function insert($post): void
    {
        $query = "INSERT
                    INTO posts(post_title, post_content, post_date, user_id, channel_id)
                  VALUES (:post_title, :post_content, :post_date, :user_id, :channel_id)";

        $binds = [
            ':post_title' => $post->getTitle(),
            ':post_content' => $post->getContent(),
            ':post_date' => $post->getDate(),
            ':user_id' => $post->getUser()->getId(),
            ':channel_id' => $post->getChannel()->getId()
        ];

        $this->db->execute($query, $binds);
    }

    public function update($post): void
    {
        $query = "UPDATE posts
                     SET post_title = :post_title,
                         post_content = :post_content,
                         post_date = :post_date
                   WHERE id = :id";

        $binds = [
            ':post_title' => $post->getTitle(),
            ':post_content' => $post->getContent(),
            ':post_date' => $post->getDate(),
            ':id' => $post->getId()
        ];

        $this->db->execute($query, $binds);
    }

    public function delete(int $postId): void
    {
        $query = "DELETE
                    FROM posts
                   WHERE id = :id";

        $this->db->execute($query, [':id' => $postId]);
    }
}