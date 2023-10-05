<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Repository\Promotion\PromotionInterface;

class PromotionController extends Controller
{
    protected $promotions;

    public function __construct(PromotionInterface $promotions){
        $this->promotions = $promotions;
    }

    public function index()
    {
        return $this->promotions->getAllPromotions();
    }

    public function create()
    {
        return $this->promotions->CreatePromotions();
    }

    public function store(Request $request)
    {
        return $this->promotions->StorePromotions($request);
    }

    public function undo(Request $request)
    {
        return $this->promotions->UndoPromotions($request);
    }

}
