<?php

namespace Ascii\Domain\Model\Word;

use Ramsey\Uuid\Uuid;
use Ascii\Domain\Model\Exceptions\InvalidUuid;

class WordId
{

    /** @var \Ramsey\Uuid\UuidInterface */
    private $id;
    /** @var string */
    private $value;

    /**
     * @param string $id
     * @throws InvalidUuid
     */
    public function __construct(string $id)
    {
        $this->guardIdIsAValidUuid($id);
        $this->id = Uuid::fromString($id);
        $this->value = $id;
    }

    public function getValue()
    {
        return $this->id;
    }
    private function guardIdIsAValidUuid(string $id)
    {
        if (!Uuid::isValid($id)) {
            throw new InvalidUuid();
        }
    }

    public static function generate()
    {
        return new WordId(Uuid::uuid4()->toString());
    }
}