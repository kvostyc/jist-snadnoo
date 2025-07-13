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
    'ascii' => ':attribute môže obsahovať iba jednobytové alfanumerické znaky a symboly.',
    'before' => ':attribute musí byť dátum pred :date.',
    'before_or_equal' => ':attribute musí byť dátum pred alebo rovný :date.',
    'between' => [
        'array' => ':attribute musí mať medzi :min a :max položiek.',
        'file' => ':attribute musí mať medzi :min a :max kilobytes.',
        'numeric' => ':attribute musí byť medzi :min a :max.',
        'string' => ':attribute musí mať medzi :min a :max znakov.',
    ],
    'boolean' => 'Pole :attribute musí byť true alebo false.',
    'can' => 'Pole :attribute obsahuje neoprávnenú hodnotu.',
    'confirmed' => 'Potvrdenie sa nezhoduje.',
    'current_password' => 'Heslo je nesprávne.',
    'date' => ':attribute nie je platný dátum.',
    'date_equals' => ':attribute musí byť dátum rovný :date.',
    'date_format' => ':attribute nezodpovedá formátu :format.',
    'decimal' => ':attribute musí mať :decimal desatinných miest.',
    'declined' => ':attribute musí byť odmietnutý.',
    'declined_if' => ':attribute musí byť odmietnutý, keď :other je :value.',
    'different' => ':attribute a :other musia byť rôzne.',
    'digits' => ':attribute musí mať :digits číslic.',
    'digits_between' => ':attribute musí mať medzi :min a :max číslic.',
    'dimensions' => ':attribute má neplatné rozmery obrázka.',
    'distinct' => 'Pole :attribute má duplicitnú hodnotu.',
    'doesnt_end_with' => ':attribute nemôže končiť jedným z nasledujúcich: :values.',
    'doesnt_start_with' => ':attribute nemôže začínať jedným z nasledujúcich: :values.',
    'email' => 'Neplatný e-mail.',
    'ends_with' => ':attribute musí končiť jedným z nasledujúcich: :values.',
    'enum' => 'Vybraný :attribute je neplatný.',
    'exists' => 'Vybraný :attribute je neplatný.',
    'extensions' => ':attribute musí mať jedno z nasledujúcich rozšírení: :values.',
    'file' => ':attribute musí byť súbor.',
    'filled' => 'Pole :attribute musí mať hodnotu.',
    'gt' => [
        'array' => ':attribute musí mať viac ako :value položiek.',
        'file' => ':attribute musí byť väčší ako :value kilobytes.',
        'numeric' => ':attribute musí byť väčší ako :value.',
        'string' => ':attribute musí byť väčší ako :value znakov.',
    ],
    'gte' => [
        'array' => ':attribute musí mať :value položiek alebo viac.',
        'file' => ':attribute musí byť väčší alebo rovný :value kilobytes.',
        'numeric' => ':attribute musí byť väčší alebo rovný :value.',
        'string' => ':attribute musí byť väčší alebo rovný :value znakov.',
    ],
    'hex_color' => 'Pole :attribute musí byť platná hexadecimálna farba.',
    'image' => ':attribute musí byť obrázok.',
    'in' => 'Vybraný :attribute je neplatný.',
    'in_array' => 'Pole :attribute neexistuje v :other.',
    'integer' => 'Pole :attribute musí byť celé číslo.',
    'ip' => ':attribute musí byť platná IP adresa.',
    'ipv4' => ':attribute musí byť platná IPv4 adresa.',
    'ipv6' => ':attribute musí byť platná IPv6 adresa.',
    'json' => ':attribute musí byť platný JSON reťazec.',
    'lowercase' => ':attribute musí byť malými písmenami.',
    'lt' => [
        'array' => ':attribute musí mať menej ako :value položiek.',
        'file' => ':attribute musí byť menší ako :value kilobytes.',
        'numeric' => ':attribute musí byť menší ako :value.',
        'string' => ':attribute musí byť menší ako :value znakov.',
    ],
    'lte' => [
        'array' => ':attribute nesmie mať viac ako :value položiek.',
        'file' => ':attribute musí byť menší alebo rovný :value kilobytes.',
        'numeric' => ':attribute musí byť menší alebo rovný :value.',
        'string' => ':attribute musí byť menší alebo rovný :value znakov.',
    ],
    'mac_address' => ':attribute musí byť platná MAC adresa.',
    'max' => [
        'array' => ':attribute nesmie mať viac ako :max položiek.',
        'file' => ':attribute nesmie byť väčší ako :max kilobytes.',
        'numeric' => ':attribute nesmie byť väčší ako :max.',
        'string' => ':attribute nesmie byť väčší ako :max znakov.',
    ],
    'max_digits' => ':attribute nesmie mať viac ako :max číslic.',
    'mimes' => ':attribute musí byť súbor typu: :values.',
    'mimetypes' => ':attribute musí byť súbor typu: :values.',
    'min' => [
        'array' => ':attribute musí mať aspoň :min položiek.',
        'file' => ':attribute musí mať aspoň :min kilobytes.',
        'numeric' => ':attribute musí byť aspoň :min.',
        'string' => ':attribute musí mať aspoň :min znakov.',
    ],
    'min_digits' => ':attribute musí mať aspoň :min číslic.',
    'missing' => ':attribute musí chýbať.',
    'missing_if' => ':attribute musí chýbať, keď :other je :value.',
    'missing_unless' => ':attribute musí chýbať, pokiaľ :other nie je :value.',
    'missing_with' => ':attribute musí chýbať, keď :values je prítomné.',
    'missing_with_all' => ':attribute musí chýbať, keď :values sú prítomné.',
    'multiple_of' => ':attribute musí byť násobok :value.',
    'not_in' => 'Vybraný :attribute je neplatný.',
    'not_regex' => 'Formát :attribute je neplatný.',
    'numeric' => ':attribute musí byť číslo.',
    'password' => [
        'letters' => ':attribute musí obsahovať aspoň jedno písmeno.',
        'mixed' => ':attribute musí obsahovať aspoň jedno veľké a jedno malé písmeno.',
        'numbers' => ':attribute musí obsahovať aspoň jedno číslo.',
        'symbols' => ':attribute musí obsahovať aspoň jeden symbol.',
        'uncompromised' => 'Zadaný :attribute sa objavil v úniku dát. Prosím, vyberte iný :attribute.',
    ],
    'present' => 'Pole :attribute musí byť prítomné.',
    'present_if' => 'Pole :attribute musí byť prítomné, keď :other je :value.',
    'present_unless' => 'Pole :attribute musí byť prítomné, pokiaľ :other nie je :value.',
    'present_with' => 'Pole :attribute musí byť prítomné, keď :values je prítomné.',
    'present_with_all' => 'Pole :attribute musí byť prítomné, keď :values sú prítomné.',
    'prohibited' => 'Pole :attribute je zakázané.',
    'prohibited_if' => 'Pole :attribute je zakázané, keď :other je :value.',
    'prohibited_unless' => 'Pole :attribute je zakázané, pokiaľ :other nie je v :values.',
    'prohibits' => 'Pole :attribute zakazuje :other.',
    'regex' => 'Formát :attribute je neplatný.',
    'required' => 'Toto pole je povinné.',
    'required_array_keys' => 'Pole :attribute musí obsahovať položky pre: :values.',
    'required_if' => 'Toto pole je povinné.',
    'required_if_accepted' => 'Pole :attribute je povinné, keď :other je akceptovaný.',
    'required_unless' => 'Pole :attribute je povinné, pokiaľ :other nie je v :values.',
    'required_with' => 'Pole :attribute je povinné, keď :values je prítomné.',
    'required_with_all' => 'Pole :attribute je povinné, keď sú prítomné všetky :values.',
    'required_without' => 'Pole :attribute je povinné, keď :values nie je prítomné.',
    'required_without_all' => 'Pole :attribute je povinné, keď nie je prítomné žiadne z :values.',
    'same' => ':attribute a :other sa musia zhodovať.',
    'size' => [
        'array' => ':attribute musí obsahovať :size položiek.',
        'file' => ':attribute musí mať :size kilobytes.',
        'numeric' => ':attribute musí byť :size.',
        'string' => ':attribute musí mať :size znakov.',
    ],
    'starts_with' => ':attribute musí začínať jedným z nasledujúcich: :values.',
    'string' => ':attribute musí byť reťazec.',
    'timezone' => ':attribute musí byť platná časová zóna.',
    'unique' => ':attribute už bol použitý.',
    'uploaded' => ':attribute sa nepodarilo nahrať.',
    'uppercase' => ':attribute musí byť veľkými písmenami.',
    'url' => ':attribute musí byť platná adresa URL.',
    'ulid' => ':attribute musí byť platný ULID.',
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
        'date' => 'Dátum',
        'time' => 'Čas',
        'guest_count' => 'Počet hostí',
        'email' => 'E-mailová adresa',
        'phone_number' => 'Telefónne číslo',
        'password' => 'Heslo',
        'fa_state' => 'Štát',
    ],

];
