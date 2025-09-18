<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserSalesPlan extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
           'id'                            => $this->id,
           'user_id'                       => $this->user_id,
           'revenue_per_sale_amount'       => round($this->revenue_per_sale_amount),
           'user_annual_income_target'     => round($this->user_annual_income_target),
           'total_annual_sales_needed'     => round($this->total_annual_sales_needed),
           'total_work_week_left_to_sell'  => round($this->total_work_week_left_to_sell),
           'average_commission_per_sale'   => round($this->average_commission_per_sale),
           'total_contracts_needed'        => round($this->total_contracts_needed),
           'total_work_month_left_to_sell' => round($this->total_work_month_left_to_sell),
           'created_at'                    => $this->created_at,
           'updated_at'                    => $this->updated_at,
        ];
    }
}