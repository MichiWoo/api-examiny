<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
class statusEnum extends Enum
{
    const DELETED = [ 'value' => 0, 'description'=> 'Recurso Eliminado', 'label' => 'Deleted', 'color' => 'red'];
    const SUSPENDED = [ 'value' => 1, 'description'=> 'Recurso Suspendido', 'label' => 'Suspended', 'color' => 'purple'];
    const DISABLED = [ 'value' => 2, 'description'=> 'Recurso Deshabilitado', 'label' => 'Disabled', 'color' => 'slate'];
    const ACTIVATED = [ 'value' => 3, 'description'=> 'Recurso Activado', 'label' => 'Activated', 'color' => 'green'];
    const BLOCKED = [ 'value' => 4, 'description'=> 'Recurso Bloqueado', 'label' => 'Blocked', 'color' => 'yellow'];
    const CURRENT = [ 'value' => 5, 'description'=> 'Recurso Actual', 'label' => 'Current', 'color' => 'blue'];
    const DEFEATED = [ 'value' => 6, 'description'=> 'Recurso Defeated', 'label' => 'Defeated', 'color' => 'red'];
}
