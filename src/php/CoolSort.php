<?php

namespace PHP;

/*
 * It's Mergesort, but it's still cool for what we need
 */

class CoolSort
{
    private array $parts = [];

    public function getMergedParts(): array
    {
        return $this->parts;
    }

    public function execute(array $arr): array
    {
        if (count($arr) <= 2) {
            return $this->merge([array_shift($arr)], $arr);
        } else {
            $middle = ceil(count($arr) / 2);

            return $this->merge($this->execute(array_slice($arr, 0, $middle)), $this->execute(array_slice($arr, $middle)));
        }
    }

    public function merge(array $left, array $right): array
    {
        $merged = [];

        while (count($left) && count($right)) {
            if ($left[0] <= $right[0]) {
                $merged[] = array_shift($left);
            } else {
                $merged[] = array_shift($right);
            }
        }

        $part = array_merge($merged, $left, $right);
        $this->parts[] = $part;

        return $part;
    }
}



