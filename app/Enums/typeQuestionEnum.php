<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class typeQuestionEnum extends Enum
{
    const SINGLE = [ 'value' => 0, 'description'=> 'Pregunta Sencilla', 'label' => 'Single', 'color' => 'blue'];
    const MULTIPLE = [ 'value' => 1, 'description'=> 'Pregunta Múltiple', 'label' => 'Multiple', 'color' => 'purple'];
}
