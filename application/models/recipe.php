<?php

class Recipe extends Model {

    private $id;
    private $name;
    private $description;
    private $user_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param $id
     * Simply queries the database for recipe with a specific id
     * @return recipe object
     */
    public function getRecipe($id)
    {
        $id = $this->escapeString($id);
        $result = $this->query('SELECT * FROM `recipes` WHERE `id`="'. $id .' " LIMIT 1', 'recipe', 1);
        return $result;
    }

    /**
     * @param int $limit
     * @param int $user_id
     *
     * Queries the database for all the recipes, with the optionality to query for a limited number of record,
     * or specific recipes created by a single user.
     * @return array|recipe
     */
    public function getRecipes($limit = 0, $user_id = 0)
    {
        $limit = $this->escapeString($limit);
        if($user_id !== 0 && $limit == 0) {
            $results = $this->query('SELECT * FROM `recipes` WHERE `user_id` = '. $user_id, 'recipe');
        } else if($user_id !== 0 && $limit !== 0) {
            $results = $this->query('SELECT * FROM `recipes` WHERE `user_id` = '. $user_id . ' LIMIT ' . $limit, 'recipe');
        } else if($limit == 0 && $user_id == 0) {
            $results = $this->query('SELECT * FROM `recipes`', 'recipe');
        } else {
            $results = $this->query('SELECT * FROM `recipes` LIMIT ' . $limit, 'recipe');
        }
        return $results;
    }

    /**
     * @param $name
     * @param $description
     * @param $uid
     *
     * Writes an insert statement into the database to create a new recipe with the information provided.
     */
    public function create($name, $description, $uid) {
        $name = $this->escapeString($name);
        $description = $this->escapeString($description);
        $this->execute('INSERT INTO `recipes` (`name`, `description`, `user_id`) VALUES ("' . $name . '", "'. $description . '", ' . $uid . ')');
    }
}

?>
