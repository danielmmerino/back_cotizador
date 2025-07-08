<?php

namespace App\Services;

class PreciosAutosService
{
    private array $data;

    public function __construct()
    {
        $path = base_path('precios_autos.json');
        $this->data = json_decode(file_get_contents($path), true) ?? [];
    }

    public function search(string $marca, string $modelo, string|int $anio): array
    {
        $marca = $this->normalize($marca);
        $modelo = $this->normalize($modelo);
        $anio = (string) $anio;

        $results = [];
        foreach ($this->data as $item) {
            if ($marca !== $this->normalize($item['marca'] ?? '')) {
                continue;
            }
            if ($anio !== trim((string) ($item['anio'] ?? ''))) {
                continue;
            }
            if (str_contains($this->normalize($item['modelo'] ?? ''), $modelo)) {
                $results[] = [
                    'marca' => $item['marca'],
                    'modelo' => $item['modelo'],
                    'anio' => $item['anio'],
                    'precioComercial' => $item['precioComercial'],
                ];
            }
        }

        return $results;
    }

    private function normalize(string $value): string
    {
        $value = strtolower($value);
        $value = preg_replace('/[^a-z0-9]/', '', $value);
        return $value;
    }
}
