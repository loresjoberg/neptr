<?php


use Lore\Neptr\Model\DataType\Person\PersonalInfo;
use Lore\Neptr\Model\DataType\PublicationData;
use Lore\Neptr\Tome\UserApothecary;
use Lore\Neptr\Tome\UserArtificer;
use Lore\Neptr\Tome\UserCurator;

require_once '../autoloader.php';
require_once '../vendor/autoload.php';

$db = new PDO('mysql:dbname=neptr;host=localhost', 'neptr', 'neptr');

/***---***/

$userId = 1;
$user = makeUser($db, $userId);
$post = makePost($db, $postId);

$postId = 1;

function makePost($db, $postId)
{
    $sqlStatement = 'SELECT * FROM posts WHERE id = ?';
    $dataRow = getDataRow($db, $postId, $sqlStatement);

    $postTitle = new PostTitle($dataRow->title);
    $postBody = new PostBody($dataRow->content);
    $id = new Identifier($dataRow->id);
    $postAuthor = makeUser($db, $dataRow->user_id);
    $postDate = new DateTime($dataRow->published_date);
    $postContent = new PostContent($postTitle, $postBody);
    $publicationData = new PublicationData($postAuthor, $postDate);
    return new Post($postContent, $publicationData);
}

/**
 * @param $db
 * @param $id
 * @return mixed
 * @throws Exception
 */
function getDataRow($db, $id)
{
    $query = $db->prepare();
    $query->execute([$id]);

    if ($query === false) {
        throw new Exception('User not found');
    }

    $dataRow = $query->fetch(PDO::FETCH_OBJ);
    return $dataRow;
}


function makeUser($db, $userId)
{
    // Each entity will have a unique SQL statement, possibly even
    // multiple statements run in a row to get a data row representing
    // the entity

    // According to OC, we shouldn't have a string here. At the same
    // time, we don't want to feed what could potentially be several
    // lines of SQL directly into the constructor. Even more so, we
    // may want to run two or three statements and combine the results
    // in some say. So this gives us two options that I can think of:
    // First, we could wrap the SQL statements in an object, probably
    // a collection. Or, we could create an object with all the logic
    // in actual methods.

    // In my parlance, this would be something like a UserCurator($db, $id)
    // which has a craft() statement that returns the DataRow/Reliquary.
    // There wouldn't be a Grimoire, or any cutesy attempt to turn behavior
    // into data, just a different method or set of methods for each entity.

    // My thought is that only one flat DataRow/Reliquary should be sufficient
    // for a given object, so there isn't a need to have a Curator for
    // each basic object.

    $sqlStatement = 'SELECT * FROM users WHERE id = ?';

    // According to OC, a stdClass made up of a bunch of public properties
    // breaks at least two rules: It's has more than two properties,
    // and it has a getter (worse than a getter, actually). And
    // we can't have a raw associative array, so Curator needs to
    // return a collection, our Reliquary. I'm not certain there's
    // any value to having it be an array of DataColumn basic objects
    // rather than an array of strings.

    // That leaves the question of whether it's acceptable to have
    // an object that returns a value from an array when given a
    // key.

    // Argument against: If an object can have an associative
    // array with an arbitrary number key-value pairs, and
    // it can return a value given a key, then we don't even
    // need this hierarchy of basic objects. We can just
    // give User an array of six or more properties, and have
    // it hand out the values with a "dispenser" rather than
    // a getter. And even if we outlaw the getter, we're
    // still working with an object with, effectively six-plus
    // properties to use internally.

    // Argument for: The author of OC clearly didn't intend collections
    // to be outlawed, he specifically tells how to deal with them
    // and gives an indexed array as an example. So my interpretation
    // of the rule is that an collection can't anticipate its own indexes.

    // That means that a Reliquary could contain an associative array
    // of six basic objects, because as far as the Reliquary class
    // is concerned, those items could be FullName, Password, EmailAddress
    // and so forth, or it could be PotatoEyeCount, CatNickname, and
    // VolcanoTemperature. It would treat them all the same. Meanwhile,
    // a User object would presumably have behavior that expects to find an
    // EmailAddress, and would be confounded if it found a VolcanoTemperature
    // instead.

    // As far as my limited understanding goes, this is how Collections work
    // in Java. They're similar to associative and indexed arrays, except
    // that the functions for manipulating them are internal to the
    // class rather than being language functions.

    // This still raises the question of whether returning values from
    // our collection objects violates the no-getter rule. On one hand,
    // the purpose of the no-getter rule appears to be to enforce "Tell,
    // Don't Ask," and asking a collection for a value clearly violates
    // that. On the other hand, it's frustrating to try to do anything
    // with data -- or metadata -- if it can never leave its own object.

    // We can't keep the data in the Curator, because it violates
    // the one-collection-property rule to have both an array of
    // SQL statements (or a single SQL statement) and an array of
    // data. And if we move a SQL statement into its own object,
    // then we have the problem of how to send that statement to
    // the PDO without having to write our own SQL interface.

    /*
    Wrong:
    $apothecary->craft($reliquary->getContents());

    Right?:
    $apothecary->craft($reliquary);

    public function craft(Reliquary $reliquary) {
        $this->craftFullName($reliquary);
    }

    public function craftFullName(Reliquary $reliquary) {
        $reliquary->incoporate($aClosureIGuess);
    }
    */

    // That brings us back to closure shenanigans.
    // You know the easiest way to do this might be to make Apothecary the
    // collection, and then it can act on the values in the collection as much as it wants.
    $dataRow = getDataRow($db, $userId, $sqlStatement);

    // Each entity will have a selection of different basic objects
    // that make up the basic building blocks of its data. Some
    // basic objects may require compound statements to create them.

    // Example: Perhaps the database will have a birthdate, and
    // the object an age. The birthdate will have to be subtracted
    // from the current date, and perhaps formatted or rounded.

    // This is potentially tricky. Each basic object will have a different
    // method of being filled, and the same basic object may have different
    // methods when applied to different entities.

    // I'm not thrilled about having five or more customized basic objects
    // for each entity. At the same time, a Formulary with an array of
    // closures ended up being very awkward.

    // Another option would be to have the Apothecary have five-plus
    // methods called by the craft() method. That certainly seems to
    // make the most sense. In that context, my pidgin might work fine,
    // because an entry of any complexity can contain a method name,
    // which is less awkward than a closure.

    // The Apothecary would then return, as before, a Coffer, which
    // would be an associative array of object names and the
    // basic objects they refer to.

    $fullName = new FullName($dataRow->first_name . ' ' . $dataRow->last_name);
    $emailAddress = new EmailAddress($dataRow->email);
    $userName = new UserName($dataRow->login);
    $password = new Password($dataRow->passwd);
    $identifier = new Idenfitier($dataRow->id);
    $role = new Role($dataRow->role);

    // Each entity will have a different hierarchy of basic
    // and compound objects. I think, but am not completely
    // certain, that this assemblage won't require any
    // additional computation. By the rules of Object Calisthenics,
    // there shouldn't be any naked scalars or arrays, so
    // the above block should do the heavy lifting.

    // This one seems like it would best make use of a pidgin.
    // If I'm right, any object can be described as a simple
    // multi-dimensional array of strings, so creating a Compendium
    // might actually make sense. Or, alternatively, putting
    // the array in a UserArtificer and having the UserArtificer
    // instantiate a Forge object, feed it the array and the , and
    // receive the finished object. That's functionally equivalent
    // to a
    $personalInfo = new PersonalInfo($fullName, $emailAddress);
    $loginCredentials = new LoginCredentials($userName, $password);
    $accessData = new AccessData($role, $loginCredentials);
    $systemInfo = new SystemInfo($identifier, $accessData);
    return new User($personalInfo, $systemInfo);
}


$codex = [
    'User' => [
        'PersonalInfo' => [
            'FullName',
            'EmailAddress'
        ],
        'SystemInfo' => [
            'Identifier',
            'AccessData' => [
                'Role',
                'LoginCredentials' => [
                    'UserName',
                    'Password'
                ]
            ]
        ]
    ]
];

/***---***/

$db = new PDO('whatever');
$curator = new UserCurator($db, 1);
$apothecary = new UserApothecary($curator->craft()); // Passes an associative array of scalars
$artificer = new UserArtificer($apothecary->craft()); // Passes an associative array of Monocots
$user = $artificer->craft();