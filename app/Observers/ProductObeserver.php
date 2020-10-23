<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Product;

class ProductObeserver
{
    /**
     * Handle the product "creating" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function creating(Product $product)
    {

        
        $data = $product->name;

        $product->slug = Str::kebab($this->replaceWord($data));

    }

    /**
     * Handle the product "updating" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updating(Product $product)
    {
        $data = $product->name;

        $product->slug = Str::kebab($this->replaceWord($data));
    }

    private function replaceWord($string)
    {
        $search = explode(",","ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ã,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,ø,Ø,Å,Á,À,Â,Ä,È,É,Ê,Ë,Í,Î,Ï,Ì,Ò,Ó,Ô,Ö,Ú,Ù,Û,Ü,Ÿ,Ç,Æ,Œ");
        $replaced = explode(",","c,ae,oe,a,e,i,o,u,a,e,i,o,a,u,a,e,i,o,u,y,a,e,i,o,u,a,o,O,A,A,A,A,A,E,E,E,E,I,I,I,I,O,O,O,O,U,U,U,U,Y,C,AE,OE");

        return str_replace($search, $replaced, $string);
    }

   
}
