<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class ManageImport implements WithMultipleSheets,SkipsUnknownSheets
{
    use Importable;
    public $mapArray;
    public $importing_on;
    public $flag;
    public function __construct($mapArray,$importing_on,$flag){
        $this->mapArray = $mapArray;
        $this->importing_on = $importing_on;
        $this->flag= $flag;
        History::create([
            'type' => 'data',
            'imported_on' => $this->importing_on,
            'imported_by' => Auth::user()->id,
            'file_name' => session('excel')
        ]);
    }
    public function sheets(): array
    {
        return [
            'Communities'                   => new CommunitiesImport($this->mapArray->{'community'},$this->importing_on,$this->flag),

            'Elevations'                    => new HomesImport($this->mapArray->{'elevation'},$this->importing_on,$this->flag),

            'Floors'                        => new FloorsImport($this->mapArray->{'floor'},$this->importing_on,$this->flag),

            'Floor Features'                => new FloorFeaturesImport($this->mapArray->{'floor_feature'},$this->importing_on,$this->flag),

            'Elevation Types'               => new HomeTypesImport($this->mapArray->{'elevation_type'},$this->importing_on,$this->flag),

            'Color Schemes'                 => new ColorSchemesImport($this->mapArray->{'color_scheme'},$this->importing_on,$this->flag),
            
            'Color Scheme Features'         => new HomeFeaturesImport($this->mapArray->{'color_scheme_feature'},$this->importing_on,$this->flag),
        ];
    }
    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
}