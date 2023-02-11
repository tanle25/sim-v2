<?php

namespace App\Exports;

use App\Models\Sim;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportSelectedSim implements FromCollection, WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $sims;
    public function __construct($sims)
    {
        $this->sims = $sims;
    }
    public function collection()
    {
        return $this->sims;
    }

    public function headings(): array
    {
        return [
            'Số điện thoại',
            'ICCID',
            'ICCID cũ',
            'Nhà mạng',
            'Giá nhập',
            'Giá bán',
            'Khách hàng',
            'Loại khách hàng',
            'Ngày nhập',
            'Ngày cho thuê',
            'Ngày hết hạn',
            'Trạng thái',
        ];
    }

    public function map($sim): array
    {
        return [
            $sim->phone,
            $sim->iccid,
            $sim->old_iccid,
            $sim->network->name ?? '',
            $sim->price_in,
            $sim->owner->price ?? 0,
            $sim->owner->name ?? '',
            $sim->owner->type ?? '',
            $sim->imported_at ?? '',
            $sim->owner->created_at ?? '',
            $sim->owner->exprired_at ?? '',
            config("constrains.status.$sim->status"),

            // Date::dateTimeToExcel($invoice->created_at),
        ];
    }
}
