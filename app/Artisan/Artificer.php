<?php


namespace Lore\Neptr\Artisan;


use Lore\Neptr\Config\Config;
use Lore\Neptr\Entity\Entity;
use Lore\Neptr\Receptacle\Coffer;

abstract class Artificer
{

    protected $codex;

    public function craft(Coffer $coffer) : Entity
    {
        $pod = $this->constructCompoundObject($coffer, $this->codex);
        return $pod[0];
    }

    protected function constructCompoundObject(Coffer $coffer, $sheaf)
    {
        $entity = [];

        foreach ($sheaf as $label => $requisite) {
            $entity[] = $this->constructObject($coffer, $requisite, Config::ENTITY_PREFIX . $label);
        }

        return $entity;
    }

    /**
     * @param $coffer
     * @param $requisite
     * @param $label
     * @return mixed
     */
    protected function constructObject(Coffer $coffer, $requisite, $label)
    {

        if (is_array($requisite)) {
            $parameters = $this->constructCompoundObject($coffer, $requisite);
            return new $label(...$parameters);
        }

        return $this->constructMonocot($coffer, Config::MONOCOT_PREFIX . $requisite);
    }

    protected function constructMonocot(Coffer $coffer, $requisite)
    {
        return new $requisite($coffer[$requisite]);
    }
}