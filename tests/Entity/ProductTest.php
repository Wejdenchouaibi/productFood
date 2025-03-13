<?php
namespace App\tests\Entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testDefault()
    {
        $product = new Product('Pomme', 'food', 1);
        $this->assertSame(0.055, $product->computeTVA());
    }

    public function testprod()
    {
        $product = new Product('Pomme', 'car', 1);
        $this->assertSame(0.196, $product->computeTVA());
    }

    public function pricesForFood()
    {
        return [[0.00, 0.00],[1.00, 0.055],[10.00, 0.55],[20.00, 1.10]];
    }

    /** 
     * @dataProvider pricesForFood
     */
    public function testlastFood($prix, $tva)
    {
        $p = new Product("product", "food", $prix);
        $this->assertSame($tva, $p->computeTVA());
    }
}
?>