<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPartnerSim implements FromCollection,  WithHeadings,WithMapping
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
        //
        return $this->sims;
    }
    public function headings(): array
    {
        return [
            'Số điện thoại',
            'ICCID',
            'Nhà mạng',
            'Giá nhập',
            'Giá cho thuê',
            'Ngày thuê',
            'Ngày hết hạn',
        ];
    }

    public function map($sim): array
    {
        return [
            $sim->sim->phone,
            $sim->sim->iccid,
            $sim->sim->network->name ?? '',
            $sim->sim->price_in,
            $sim->price,
            $sim->created_at,
            $sim->exprired_at
            // Date::dateTimeToExcel($invoice->created_at),
        ];
    }
}
