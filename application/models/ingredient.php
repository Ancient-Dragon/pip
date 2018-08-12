<?php

class Ingredient extends Model {

    private $id;
    private $name;
    private $amount;
    private $recipe_id;

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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getRecipeId()
    {
        return $this->recipe_id;
    }

    /**
     * @param mixed $recipe_id
     */
    public function setRecipeId($recipe_id)
    {
        $this->recipe_id = $recipe_id;
    }

    /**
     * @param $recipe_id
     * @return array|object|stdClass
     * Gets all the ingredients from the database which have the recipe id.
     */
    public function getIngredients($recipe_id) {
        $results = $this->query('SELECT * FROM `ingredients` WHERE `recipe_id` =' . $recipe_id, 'ingredient');
        return $results;
    }

    /**
     * @param $name
     * @param $amount
     * @param $recipeId
     *
     * Runs an insert into query using the data passed to it.
     */
    public function create($name, $amount, $recipeId) {
        $name = $this->escapeString($name);
        $this->execute('INSERT INTO `ingredients` (`name`, `amount`, `recipe_id`) VALUES ("' . $name . '", "'. $amount . '",' . intval($recipeId) . ')');
    }
}

?>
