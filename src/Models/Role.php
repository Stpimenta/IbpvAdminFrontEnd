<?php
namespace App\Models;

enum Role: int{
    case ROOT = 0;
    case ADMIN = 1;
    case TESOURARIA = 2;
    case MEMBRO = 3;
    case PENDING = 4;
    case INATIVO = 5;

     public function label(): string {
        return match($this) {
            self::ROOT => 'root',
            self::ADMIN => 'admin',
            self::TESOURARIA => 'tesouraria',
            self::MEMBRO => 'membro',
            self::PENDING => 'pending',
            self::INATIVO => 'inativo',
        };
    }

}

