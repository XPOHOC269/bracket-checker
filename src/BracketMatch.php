<?php

namespace Menshov;

use Menshov\Exceptions\BracketMatchException;

class BracketMatch
{

    static function checkBrackets(string $string)
    {
        try {
            preg_match_all('/[^()\r\n\t\s]/', $string, $matches, PREG_SET_ORDER, 0);
            if (!empty($matches)) {
                throw new \InvalidArgumentException('Недопустимые символы в строке');
            }

            $openBracketsStack = $closeBracketsStack = 0;

            for ($i = 0; $i < strlen($string); $i++) {
                $currentLetter = $string[$i];

                if ($currentLetter == '(') {
                    $openBracketsStack++;
                } elseif ($currentLetter == ')') {
                    $closeBracketsStack++;
                }

                if ($closeBracketsStack > $openBracketsStack) {
                    $pos = $i + 1;
                    throw new BracketMatchException("Лишняя закрывающая скобка в полизии {$pos}");
                }
            }

            if ($openBracketsStack !== $closeBracketsStack) {
                throw new BracketMatchException('Количество открывающих скобок не соответсвует количеству закрывающих');
            }

        } catch (\InvalidArgumentException $e) {
            echo $e->getMessage();
            die;
        } catch (BracketMatchException $e) {
            return false;
        }

        return true;
    }
}