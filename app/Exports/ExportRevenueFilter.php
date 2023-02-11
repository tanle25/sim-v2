<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportRevenueFilter implements FromCollection,  WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $invoices;

    public function __construct($invoices)
    {
        $this->invoices = $invoices;
    }
    public function collection()
    {
        //
        return $this->invoices;
    }
    public function headings(): array
    {
        return [
            'Khách hàng',
            'Số điện thoại',
            'Loại khách hàng',
            'Loại',
            'Giá nhập',
            'Giá cho thuê',
            'Ngày tạo',
            'Ngày thuê',
            'Ngày hết hạn',
        ];
    }

    public function map($invoice): array
    {
        return [
            $invoice->invoiceable->name ?? '',
            $invoice->sim->phone,
            $invoice->sim->owner->type,
            $invoice->type == 0 ? 'Cho thuê' : 'Gia hạn',
            $invoice->price_in,
            $invoice->price_out,
            $invoice->created_at,
            $invoice->rent_at,
            $invoice->exprired_at
            // Date::dateTimeToExcel($invoice->created_at),
        ];
    }
}
