<?php

 

$shoppingCart = [
    ['product' => 'Телефон', 'price' => 1200],  
    ['product' => 'Наушники', 'price' => 800],  
    ['product' => 'Ноутбук', 'price' => 1500],   
];


function calculatePrice($cart) {
    
    $totalSum = 0;

    // наличие дорогого продукта
    $hasExpensiveProduct = false;  
    
    // количество товаров
    $countProducts = count($cart); 


    foreach($cart as $item) {
        // нашли сумму товаров
        $totalSum += $item['price'];
        
        // если есть дорогой продукт меняем значение переменной hasExpensiveProduct
        if ($item['price'] > 1000) {
            $hasExpensiveProduct = true;
        }
    }

    // доступные проценты скидок
    $discount1 = $hasExpensiveProduct ? 10 : 0;  
    $discount2 = ($countProducts > 3) ? 5 : 0;   

    //находим максимальный процент
    $maxDiscount = max($discount1, $discount2);

    // считаем финальную сумму
    $finalPrice = $totalSum - ($totalSum * ($maxDiscount / 100));

    // показали значение на страничке
    echo "Сумма к оплате : " . $finalPrice;

    // вернули резултат работы функции
    return $finalPrice;
}

calculatePrice($shoppingCart);

?>


 