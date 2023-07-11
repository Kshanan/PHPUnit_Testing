<?php
namespace App\Support;
class Collection
{
    protected $items;

    public function __construct($item)
    {
        $this->items = $item;
    }


   //function returns collection data

   public function getData()
   {
        $data = [];
        
        foreach($this->items as $item)
        {
            $data[] = $item;
        }
        
        return $data;
   }

   
}

?>