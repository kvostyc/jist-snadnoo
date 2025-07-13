<?php

namespace Database\Seeders\Table;

use App\Core\Services\TableService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tableService = app(TableService::class);

        $tables = [
            /** Okná (ľavá strana) */
            ['name' => 'Okno 1', 'identifier' => 'L1', 'available_for_guest_count' => 2, 'x' => 50, 'y' => 100, 'type' => 'square'],
            ['name' => 'Okno 2', 'identifier' => 'L2', 'available_for_guest_count' => 4, 'x' => 50, 'y' => 200, 'type' => 'square'],
            ['name' => 'Okno 3', 'identifier' => 'L3', 'available_for_guest_count' => 2, 'x' => 50, 'y' => 300, 'type' => 'square'],
            /** Stred reštaurácie */
            ['name' => 'Stred 1', 'identifier' => 'C1', 'available_for_guest_count' => 4, 'x' => 200, 'y' => 80, 'type' => 'round'],
            ['name' => 'Stred 2', 'identifier' => 'C2', 'available_for_guest_count' => 6, 'x' => 200, 'y' => 180, 'type' => 'round'],
            ['name' => 'Stred 3', 'identifier' => 'C3', 'available_for_guest_count' => 4, 'x' => 200, 'y' => 280, 'type' => 'round'],
            ['name' => 'Stred 4', 'identifier' => 'C4', 'available_for_guest_count' => 8, 'x' => 200, 'y' => 380, 'type' => 'round'],
            /** Pravá strana */
            ['name' => 'Pravá 1', 'identifier' => 'R1', 'available_for_guest_count' => 2, 'x' => 350, 'y' => 100, 'type' => 'square'],
            ['name' => 'Pravá 2', 'identifier' => 'R2', 'available_for_guest_count' => 4, 'x' => 350, 'y' => 200, 'type' => 'square'],
            ['name' => 'Pravá 3', 'identifier' => 'R3', 'available_for_guest_count' => 2, 'x' => 350, 'y' => 300, 'type' => 'square'],
            /** VIP booths */
            ['name' => 'VIP 1', 'identifier' => 'V1', 'available_for_guest_count' => 6, 'x' => 100, 'y' => 450, 'type' => 'booth'],
            ['name' => 'VIP 2', 'identifier' => 'V2', 'available_for_guest_count' => 6, 'x' => 300, 'y' => 450, 'type' => 'booth'],
        ];

        foreach ($tables as $table) {
            $tableService->create($table);
        }
    }
}
