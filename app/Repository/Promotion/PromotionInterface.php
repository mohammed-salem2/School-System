<?php

namespace App\Repository\Promotion;

interface PromotionInterface
{
    public function getAllPromotions();

    public function CreatePromotions();

    public function StorePromotions($request);

    public function UndoPromotions($request);

}
