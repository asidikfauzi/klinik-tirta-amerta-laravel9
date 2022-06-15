<?php

namespace App\Export;

use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;



class RmDonyExport extends DefaultValueBinder implements WithCustomValueBinder, FromCollection, WithEvents, WithTitle, WithHeadings, WithStrictNullComparison, ShouldAutoSize
{

	use Exportable;

    private $title;
    private $heading;
    private $data;

    public function __construct($title, array $heading, $data)
    {
        $this->title   = $title;
        $this->heading = $heading;
        $this->data    = $data;
    }


    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }

    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function(BeforeExport $event) {
                $event->writer->getProperties()->setCreator('TirtaAmerta');
            },

        ];
    }



    public function collection()
    {
        return collect($this->data);
    }

    public function title(): string
    {
        return $this->title;
    }

    public function headings(): array
    {
        return $this->heading;
    }

}
