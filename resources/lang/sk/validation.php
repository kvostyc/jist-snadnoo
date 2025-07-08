<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Jazykové linky validácie
    |--------------------------------------------------------------------------
    |
    | Nižšie uvedené jazykové linky obsahujú predvolené chybové správy používané v
    | triede validátora. Niektoré z týchto pravidiel majú viacero verzií, ako
    | napríklad pravidlá veľkosti. Slobodne upravte každú z týchto správ tu.
    |
    */

    'accepted' => ':attribute musí byť akceptovaný.',
    'accepted_if' => ':attribute musí byť akceptovaný, ak :other je :value.',
    'active_url' => ':attribute nie je platná adresa URL.',
    'after' => ':attribute musí byť dátum po :date.',
    'after_or_equal' => ':attribute musí byť dátum po alebo rovný :date.',
    'alpha' => ':attribute môže obsahovať iba písmená.',
    'alpha_dash' => ':attribute môže obsahovať iba písmená, číslice, pomlčky a podčiarkovníky.',
    'alpha_num' => ':attribute môže obsahovať iba písmená a číslice.',
    'array' => ':attribute musí byť pole.',
    'before' => ':attribute musí byť dátum pred :date.',
    'before_or_equal' => ':attribute musí byť dátum pred alebo rovný :date.',
    'between' => [
        'numeric' => ':attribute musí byť medzi :min a :max.',
        'file' => ':attribute musí mať medzi :min a :max kilobytes.',
        'string' => ':attribute musí mať medzi :min a :max znakov.',
        'array' => ':attribute musí mať medzi :min a :max položiek.',
    ],
    'boolean' => 'Pole :attribute musí byť true alebo false.',
    'confirmed' => 'Potvrdenie sa nezhoduje.',
    'current_password' => 'Heslo je nesprávne.',
    'date' => ':attribute nie je platný dátum.',
    'date_equals' => ':attribute musí byť dátum rovný :date.',
    'date_format' => ':attribute nezodpovedá formátu :format.',
    'declined' => ':attribute musí byť odmietnutý.',
    'declined_if' => ':attribute musí byť odmietnutý, keď :other je :value.',
    'different' => ':attribute a :other musia byť rôzne.',
    'digits' => ':attribute musí mať :digits číslic.',
    'digits_between' => ':attribute musí mať medzi :min a :max číslic.',
    'dimensions' => ':attribute má neplatné rozmery obrázka.',
    'distinct' => 'Pole :attribute má duplicitnú hodnotu.',
    'email' => 'Neplatný e-mail.',
    'ends_with' => ':attribute musí končiť jedným z nasledujúcich: :values.',
    'enum' => 'Vybraný :attribute je neplatný.',
    'exists' => 'Vybraný :attribute je neplatný.',
    'file' => ':attribute musí byť súbor.',
    'filled' => 'Pole :attribute musí mať hodnotu.',
    'gt' => [
        'numeric' => ':attribute musí byť väčší ako :value.',
        'file' => ':attribute musí byť väčší ako :value kilobytes.',
        'string' => ':attribute musí byť väčší ako :value znakov.',
        'array' => ':attribute musí mať viac ako :value položiek.',
    ],
    'gte' => [
        'numeric' => ':attribute musí byť väčší alebo rovný :value.',
        'file' => ':attribute musí byť väčší alebo rovný :value kilobytes.',
        'string' => ':attribute musí byť väčší alebo rovný :value znakov.',
        'array' => ':attribute musí mať :value položiek alebo viac.',
    ],
    'image' => ':attribute musí byť obrázok.',
    'in' => ':attribute musí byť špecifikovaný. Vyberte konkrétnu hodnotu.',
    'in_array' => 'Pole :attribute neexistuje v :other.',
    'integer' => 'Pole :attribute musí byť celé číslo.',
    'ip' => ':attribute musí byť platná IP adresa.',
    'ipv4' => ':attribute musí byť platná IPv4 adresa.',
    'ipv6' => ':attribute musí byť platná IPv6 adresa.',
    'json' => ':attribute musí byť platný JSON reťazec.',
    'lt' => [
        'numeric' => ':attribute musí byť menší ako :value.',
        'file' => ':attribute musí byť menší ako :value kilobytes.',
        'string' => ':attribute musí byť menší ako :value znakov.',
        'array' => ':attribute musí mať menej položiek ako :value.',
    ],
    'lte' => [
        'numeric' => ':attribute musí byť menší alebo rovný :value.',
        'file' => ':attribute musí byť menší alebo rovný :value kilobytes.',
        'string' => ':attribute musí byť menší alebo rovný :value znakov.',
        'array' => ':attribute nesmie mať viac ako :value položiek.',
    ],
    'mac_address' => ':attribute musí byť platná MAC adresa.',
    'max' => [
        'numeric' => ':attribute nesmie byť väčší ako :max.',
        'file' => ':attribute nesmie byť väčší ako :max kilobytes.',
        'string' => ':attribute nesmie byť väčší ako :max znakov.',
        'array' => ':attribute nesmie mať viac ako :max položiek.',
    ],
    'mimes' => ':attribute musí byť súbor typu: :values.',
    'mimetypes' => ':attribute musí byť súbor typu: :values.',
    'min' => [
        'numeric' => ':attribute musí byť aspoň :min.',
        'file' => ':attribute musí mať aspoň :min kilobytes.',
        'string' => 'Toto pole musí mať aspoň :min znakov.',
        'array' => ':attribute musí mať aspoň :min položiek.',
    ],
    'multiple_of' => ':attribute musí byť násobok :value.',
    'not_in' => 'Vybraný :attribute je neplatný.',
    'not_regex' => 'Formát :attribute je neplatný.',
    'numeric' => ':attribute musí byť číslo.',
    'password' => 'Heslo je nesprávne.',
    'present' => 'Pole :attribute musí byť prítomné.',
    'prohibited' => 'Pole :attribute je zakázané.',
    'prohibited_if' => 'Pole :attribute je zakázané, keď :other je :value.',
    'prohibited_unless' => 'Pole :attribute je zakázané, pokiaľ :other nie je v :values.',
    'prohibits' => 'Pole :attribute zakazuje :other.',
    'regex' => 'Formát :attribute je neplatný.',
    'required' => 'Toto pole je povinné.',
    'required_array_keys' => 'Pole :attribute musí obsahovať položky pre: :values.',
    'required_if' => 'Toto pole je povinné.',
    'required_unless' => 'Pole :attribute je povinné, pokiaľ :other nie je v :values.',
    'required_with' => 'Pole :attribute je povinné, keď :values je prítomné.',
    'required_with_all' => 'Pole :attribute je povinné, keď sú prítomné všetky :values.',
    'required_without' => 'Pole :attribute je povinné, keď :values nie je prítomné.',
    'required_without_all' => 'Pole :attribute je povinné, keď nie je prítomné žiadne z :values.',
    'same' => ':attribute a :other sa musia zhodovať.',
    'size' => [
        'numeric' => ':attribute musí byť :size.',
        'file' => ':attribute musí mať :size kilobytes.',
        'string' => ':attribute musí mať :size znakov.',
        'array' => ':attribute musí obsahovať :size položiek.',
    ],
    'starts_with' => ':attribute musí začínať jedným z nasledujúcich: :values.',
    'string' => ':attribute musí byť reťazec.',
    'timezone' => ':attribute musí byť platná časová zóna.',
    'unique' => ':attribute už bol použitý.',
    'uploaded' => ':attribute sa nepodarilo nahrať.',
    'url' => ':attribute musí byť platná adresa URL.',
    'uuid' => ':attribute musí byť platný identifikátor UUID.',

    /*
    |--------------------------------------------------------------------------
    | Vlastné jazykové linky pre validáciu
    |--------------------------------------------------------------------------
    |
    | Tu môžete špecifikovať vlastné validačné správy pre atribúty pomocou
    | konvencie "attribute.rule" na označenie týchto riadkov. To nám umožňuje rýchlo
    | špecifikovať konkrétny vlastný jazykový riadok pre konkrétne pravidlo atribútu.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'vlastná-správa',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Vlastné jazykové atribúty pre validáciu
    |--------------------------------------------------------------------------
    |
    | Nasledujúce jazykové linky sa používajú na výmenu našich zástupných atribútov
    | niečím, čo je ľahšie na pochopenie ako "E-Mail Address" namiesto "email".
    | To nám jednoducho pomáha vyjadriť našu správu expresívnejšie.
    |
    */

    'attributes' => [
        'email' => 'E-mailová adresa',
        'phone_number' => 'Telefónne číslo',
        'password' => 'Heslo',
        'fa_state' => 'Štát',
    ],
];
