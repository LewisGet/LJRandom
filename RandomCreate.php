<?php

class RandomCreate
{
    public $nextProbability = 50;

    public $items = array();

    public $item = null;

    public $deep = 0;

    public $next = null;

    public $debugDeepChar = "_";
    public $debugNextLine = "\n";

    public function __construct(array $items, $deep = 0, $nextProbability = 50)
    {
        $this->items = $items;
        $this->item = $this->getItems();

        $this->deep = $deep;

        $this->nextProbability = $nextProbability;
        $this->createNext();
    }

    public function debugPrint()
    {
        for ($i = 0; $i < $this->deep; $i++)
        {
            echo $this->debugDeepChar;
        }

        echo $this->item . $this->debugNextLine;

        if ($this->next !== null)
        {
            $this->next->debugPrint();
        }
    }

    public function getItems()
    {
        $itemId = rand(0, intval(sizeof($this->items)) - 1);

        return $this->items[$itemId];
    }

    public function createNext()
    {
        $createProbability = rand(1, 100);

        if ($createProbability > $this->nextProbability)
        {
            $this->postCreateNext();
        }
    }

    public function postCreateNext()
    {
        $this->next = new RandomCreate($this->items, $this->deep + 1);
    }
}