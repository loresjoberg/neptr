<?php


namespace Lore\Neptr\Model\Core;


use Lore\Neptr\Model\Curator\PostCurator;

use Lore\Neptr\Model\Curator\UserCurator;
use Lore\Neptr\Model\DataType\Content;
use Lore\Neptr\Model\DataType\Identity;
use Lore\Neptr\Model\DataType\Moniker;
use Lore\Neptr\Model\DataType\Person\Access;
use Lore\Neptr\Model\DataType\Person\EmailAddress;
use Lore\Neptr\Model\DataType\Person\LoginData;
use Lore\Neptr\Model\DataType\Person\Password;
use Lore\Neptr\Model\DataType\Person\PersonalInfo;
use Lore\Neptr\Model\DataType\Person\Role;
use Lore\Neptr\Model\DataType\PublicationData;
use Lore\Neptr\Model\DataType\SimpleName;
use Lore\Neptr\Model\Entity\User;
use Lore\Neptr\Model\Manifest\PostManifest;
use Lore\Neptr\Model\DataType\Metadata;
use Lore\Neptr\Model\Entity\Post;
use Lore\Neptr\Model\Manifest\UserManifest;
use Lore\Neptr\Model\Wrangler\PostWrangler;
use Lore\Neptr\Model\Wrangler\UserWrangler;
use PDO;

class EntityFactory
{
    private $db;
    private $dataMap;

    public function __construct(PDO $db, DataMap $dataMap)
    {
        $this->db = $db;
        $this->dataMap = $dataMap;
    }

    public function assembleUser(int $userId) {
        $userCurator = new UserCurator($this->db);
        $userWrangler = new UserWrangler($userCurator, $userId);
        $emailAddress = new EmailAddress('lore@lungfish.com');
        $password = new Password('heckamecka');
        $role = new Role('admin');
        $name = new SimpleName('Lore Sjoberg');
        $username = new Moniker('loresjoberg');
        $personalInfo = new PersonalInfo($name, $emailAddress);
        $loginData = new LoginData($username, $password);
        $access = new Access($role,$loginData);
        $userManifest = new UserManifest($personalInfo,$access);
        $user = new User($userManifest, $userWrangler);
        return $user;
    }

    public function assemblePost(int $postId): Post
    {
        // Dependency injection madness...
        $postCurator = new PostCurator($this->db);
        $postWrangler = new PostWrangler($postCurator, $postId);
        $user = $this->assembleUser(1);
        $dateTime = new \DateTime('now');
        $publicationData = new PublicationData($user, $dateTime);
//        /** @var PublicationData $publicationData */
//        $publicationData = $postWrangler->assemble('PublicationData', $this->dataMap->getMapFor('PublicationData'));

        /** @var Content $content */
        $content = $postWrangler->assemble('Content', $this->dataMap->getMapFor('Content'));

        /** @var Moniker $moniker */
        $moniker = $postWrangler->assemble('Moniker', $this->dataMap->getMapFor('Moniker'));

        $identity = new Identity($postId, $moniker);
        $metadata = new Metadata($identity,$publicationData);
        $manifest = new PostManifest($content, $metadata);

        $post = new Post($manifest, $postWrangler);
        return $post;
    }

}