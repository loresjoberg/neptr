<?php


namespace Lore\Neptr\Artisan;


use Exception;
use Lore\Neptr\Config\Config;
use Lore\Neptr\Entity\Entity;
use Lore\Neptr\Receptacle\Coffer;

abstract class Artificer
{

    protected $codex;

    public function craft(Coffer $coffer) : Entity
    {
        $pod = $this->constructCompoundObject($coffer);
        return $pod[0];
    }

    protected function constructCompoundObject(Coffer $coffer, $sheaf = null)
    {
        if (empty($sheaf)) {
            $sheaf = $this->codex;
        }

        $entity = [];

        foreach ($sheaf as $label => $requisite) {
            $entity[] = $this->constructObject($coffer, $requisite, $label);
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
        $className = Config::COMPONENT_PREFIX . $label;

        if ($label = key($this->codex)) {
            $className = Config::ENTITY_PREFIX . $label;
        }

        if (is_array($requisite)) {
            $parameters = $this->constructCompoundObject($coffer, $requisite);
            return new $className(...$parameters);
        }

        return $this->constructMonocot($coffer, Config::MONOCOT_PREFIX . $requisite);
    }

    protected function constructMonocot(Coffer $coffer, $requisite)
    {
        if (empty($coffer[$requisite])) {
            throw new Exception('Coffer for' . $requisite . 'is empty');
        }

        print $coffer[$requisite];
        return new $requisite($coffer[$requisite]);
    }
}