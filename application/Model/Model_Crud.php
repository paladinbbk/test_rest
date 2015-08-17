<?php

class Model_Crud extends Model
{
    public function getDashboard()
    {
        return [
            'category' => 'Категории',
            'product' => 'Товары',
            'photo' => 'Фотографии',
            'sale' => 'Скидки'
        ];
    }

    protected function getListProduct()
    {
        return ['id' => 'Id',
                'name' => 'Название',
                'category'=> 'Категория'
            ];
    }
    
    protected function getFormProduct()
    {
        return ['id' => '',
                'name' => '',
                'category_id'=> ''
            ];
    }

    protected function getListCategory()
    {
        return ['id' => 'Id',
                'name' => 'Название',
                'category'=> 'Родительская категория'
            ];
    }
    
    protected function getFormCategory()
    {
        return ['id' => '',
                'name' => '',
                'category_id'=> ''
            ];
    }
    
    protected function getListPhoto()
    {
        return ['id' => 'Id',
                'path' => 'Адресс',
                'product'=> 'Товар'
            ];
    }
    protected function getFormPhoto()
    {
        return ['id' => '',
                'path' => '',
                'product_id'=> ''
            ];
    }
    
    protected function getListSale()
    {
        return ['id' => 'Id',
                'product'=> 'Товар',
                'quantity' => 'От количества',
                'sale' => 'Скидка',
            ];
    }
    
    protected function getFormSale()
    {
        return ['id' => '',
                'product_id'=> '',
                'quantity' => '',
                'sale' => '',
            ];
    }
}
