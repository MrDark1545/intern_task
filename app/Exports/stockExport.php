<?php

namespace App\Exports;
use Illuminate\Support\Collection;
use App\Models\stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class stockExport implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $stocks = stock::all();

// Group stocks by variant
        $groupedStocks = $stocks->groupBy('variant');

// Initialize a new collection to store combined stocks
        $combinedStocks = new Collection();

// Iterate over the grouped stocks
        foreach ($groupedStocks as $variant => $variantStocks) 
        {
        // Combine the stock values using commas
            $combinedStock = $variantStocks->pluck('stock')->implode(',');

        // Create a new stock object with the combined stock
            $combinedStockObject = new stock([
                'variant' => $variant,
                'stock' => $combinedStock,
            ]);

        // Add the combined stock to the collection
            $combinedStocks->push($combinedStockObject);
        }
        return $combinedStocks;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Variant',
            'Stock',
            'created_at',
            'updated_at',
        ];
    }
}
