<?php


namespace Lore\Neptr\Artisan;


use Lore\Neptr\Config\Config;
use Lore\Neptr\Receptacle\Coffer;

abstract class Artificer
{

    protected $codex;

    public function craft(Coffer $coffer)
    {
        $pod = $this->assemble($coffer, $this->codex);
        return $pod[0];
    }

    protected function assemble(Coffer $coffer, $sheaf)
    {
        $entity = [];

        foreach ($sheaf as $label => $requisite) {
            $entity[] = $this->fabricate($coffer, $requisite, $label);
        }

        return $entity;
    }

    /**
     * @param $coffer
     * @param $requisite
     * @param $label
     * @return mixed
     */
    protected function fabricate(Coffer $coffer, $requisite, $label)
    {

        if (is_array($requisite)) {
            return $this->constructEntity($coffer, $requisite, Config::ENTITY_PREFIX . $label);
        }

        return $this->constructMonocot($coffer, Config::MONOCOT_PREFIX . $requisite);
    }

    protected function constructEntity(Coffer $coffer, $requisite, $label)
    {
        $parameters = $this->assemble($coffer, $requisite);
        return new $label(...$parameters);
    }

    protected function constructMonocot(Coffer $coffer, $requisite)
    {
        return new $requisite($coffer[$requisite]);
    }
}