<?php
namespace ValidatePackage;

trait ValidatorHelper
{
    protected function matchPattern(string $pattern): bool
    {
        return (bool) preg_match($pattern, $this->value);
    }

    protected function isUnique(string $table, string $column): bool
    {
        return (bool)!Capsule::table($table)
            ->where($column, $this->value)
            ->count();
    }

    protected function isRequired(): bool
    {
        return !empty($this->value);
    }
}