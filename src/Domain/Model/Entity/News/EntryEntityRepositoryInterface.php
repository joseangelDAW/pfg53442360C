<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 30/05/18
 * Time: 9:19
 */

namespace App\Domain\Model\Entity\News;

interface EntryEntityRepositoryInterface
{

    public function listEntries(): array;

    public function insertEntry(
        string $title,
        string $content
    ): int;

    public function persistAndFlush(EntryEntity $entry): void;
}