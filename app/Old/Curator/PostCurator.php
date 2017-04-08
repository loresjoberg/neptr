<?php

namespace Lore\Neptr\Model\Curator;

use Exception;
use PDO;
use stdClass;

class PostCurator implements Curator
{

    public function exhume() : array
    {
        $query = $this->db->prepare('SELECT * FROM posts WHERE id = ?');
        $query->execute([$postId]);

        if ($query === false) {
            throw new Exception('Post not found');
        }

        return $query->fetch(PDO::FETCH_OBJ);
    }
}