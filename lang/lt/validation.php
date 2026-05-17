<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute laukas turi būti priimtas.',
    'accepted_if' => ':attribute laukas turi būti priimtas, kai :other yra :value.',
    'active_url' => ':attribute laukas turi būti galiojantis URL adresas.',
    'after' => ':attribute laukas turi būti data po :date.',
    'after_or_equal' => ':attribute laukas turi būti data po arba lygi :date.',
    'alpha' => ':attribute laukas turi būti sudarytas tik iš raidžių.',
    'alpha_dash' => ':attribute laukas turi būti sudarytas tik iš raidžių, skaičių, brūkšnelių ir pabraukimų.',
    'alpha_num' => ':attribute laukas turi būti sudarytas tik iš raidžių ir skaičių.',
    'any_of' => ':attribute laukas yra neteisingas.',
    'array' => ':attribute laukas turi būti masyvas.',
    'ascii' => ':attribute laukas turi būti sudarytas tik iš vieno baito raidinių ir skaitinių simbolių bei ženklų.',
    'before' => ':attribute laukas turi būti data prieš :date.',
    'before_or_equal' => ':attribute laukas turi būti data prieš arba lygi :date.',
    'between' => [
        'array' => ':attribute laukas turi turėti nuo :min iki :max elementų.',
        'file' => ':attribute laukas turi būti nuo :min iki :max kilobaitų.',
        'numeric' => ':attribute laukas turi būti tarp :min ir :max.',
        'string' => ':attribute laukas turi būti nuo :min iki :max simbolių.',
    ],
    'boolean' => ':attribute laukas turi būti tiesa arba melas.',
    'can' => ':attribute lauke yra neleistina reikšmė.',
    'confirmed' => ':attribute lauko patvirtinimas nesutampa.',
    'contains' => ':attribute lauke trūksta privalomos reikšmės.',
    'current_password' => 'Slaptažodis neteisingas.',
    'date' => ':attribute laukas turi būti galiojanti data.',
    'date_equals' => ':attribute laukas turi būti lygi :date datai.',
    'date_format' => ':attribute laukas turi atitikti formatą :format.',
    'decimal' => ':attribute laukas turi turėti :decimal skaičių po kablelio.',
    'declined' => ':attribute laukas turi būti atmestas.',
    'declined_if' => ':attribute laukas turi būti atmestas, kai :other yra :value.',
    'different' => ':attribute laukas ir :other turi skirtis.',
    'digits' => ':attribute laukas turi būti :digits skaitmenų.',
    'digits_between' => ':attribute laukas turi būti nuo :min iki :max skaitmenų.',
    'dimensions' => ':attribute laukas turi netinkamus paveikslėlio matmenis.',
    'distinct' => ':attribute lauke yra pasikartojanti reikšmė.',
    'doesnt_contain' => ':attribute laukas neturi turėti šių reikšmių: :values.',
    'doesnt_end_with' => ':attribute laukas neturi baigtis viena iš šių reikšmių: :values.',
    'doesnt_start_with' => ':attribute laukas neturi prasidėti viena iš šių reikšmių: :values.',
    'email' => ':attribute laukas turi būti galiojantis el. pašto adresas.',
    'encoding' => ':attribute laukas turi būti užkoduotas :encoding.',
    'ends_with' => ':attribute laukas turi baigtis viena iš šių reikšmių: :values.',
    'enum' => 'Pasirinktas :attribute yra neteisingas.',
    'exists' => 'Pasirinktas :attribute yra neteisingas.',
    'extensions' => ':attribute laukas turi turėti vieną iš šių plėtinių: :values.',
    'file' => ':attribute laukas turi būti failas.',
    'filled' => ':attribute laukas turi turėti reikšmę.',
    'gt' => [
        'array' => ':attribute laukas turi turėti daugiau nei :value elementų.',
        'file' => ':attribute laukas turi būti didesnis nei :value kilobaitai.',
        'numeric' => ':attribute laukas turi būti didesnis nei :value.',
        'string' => ':attribute laukas turi būti ilgesnis nei :value simbolių.',
    ],
    'gte' => [
        'array' => ':attribute laukas turi turėti :value arba daugiau elementų.',
        'file' => ':attribute laukas turi būti didesnis arba lygus :value kilobaitams.',
        'numeric' => ':attribute laukas turi būti didesnis arba lygus :value.',
        'string' => ':attribute laukas turi būti bent :value simbolių.',
    ],
    'hex_color' => ':attribute laukas turi būti galiojanti šešioliktainė spalva.',
    'image' => ':attribute laukas turi būti paveikslėlis.',
    'in' => 'Pasirinktas :attribute yra neteisingas.',
    'in_array' => ':attribute laukas turi egzistuoti :other.',
    'in_array_keys' => ':attribute laukas turi turėti bent vieną iš šių raktų: :values.',
    'integer' => ':attribute laukas turi būti sveikasis skaičius.',
    'ip' => ':attribute laukas turi būti galiojantis IP adresas.',
    'ipv4' => ':attribute laukas turi būti galiojantis IPv4 adresas.',
    'ipv6' => ':attribute laukas turi būti galiojantis IPv6 adresas.',
    'json' => ':attribute laukas turi būti galiojanti JSON eilutė.',
    'list' => ':attribute laukas turi būti sąrašas.',
    'lowercase' => ':attribute laukas turi būti mažosiomis raidėmis.',
    'lt' => [
        'array' => ':attribute laukas turi turėti mažiau nei :value elementų.',
        'file' => ':attribute laukas turi būti mažesnis nei :value kilobaitai.',
        'numeric' => ':attribute laukas turi būti mažesnis nei :value.',
        'string' => ':attribute laukas turi būti trumpesnis nei :value simbolių.',
    ],
    'lte' => [
        'array' => ':attribute laukas neturi turėti daugiau nei :value elementų.',
        'file' => ':attribute laukas turi būti mažesnis arba lygus :value kilobaitams.',
        'numeric' => ':attribute laukas turi būti mažesnis arba lygus :value.',
        'string' => ':attribute laukas turi būti ne ilgesnis nei :value simbolių.',
    ],
    'mac_address' => ':attribute laukas turi būti galiojantis MAC adresas.',
    'max' => [
        'array' => ':attribute laukas neturi turėti daugiau nei :max elementų.',
        'file' => ':attribute laukas neturi būti didesnis nei :max kilobaitai.',
        'numeric' => ':attribute laukas neturi būti didesnis nei :max.',
        'string' => ':attribute laukas neturi būti ilgesnis nei :max simbolių.',
    ],
    'max_digits' => ':attribute laukas neturi turėti daugiau nei :max skaitmenų.',
    'mimes' => ':attribute laukas turi būti šių tipų failas: :values.',
    'mimetypes' => ':attribute laukas turi būti šių tipų failas: :values.',
    'min' => [
        'array' => ':attribute laukas turi turėti bent :min elementų.',
        'file' => ':attribute laukas turi būti bent :min kilobaitų.',
        'numeric' => ':attribute laukas turi būti bent :min.',
        'string' => ':attribute laukas turi būti bent :min simbolių.',
    ],
    'min_digits' => ':attribute laukas turi turėti bent :min skaitmenų.',
    'missing' => ':attribute laukas turi būti tuščias.',
    'missing_if' => ':attribute laukas turi būti tuščias, kai :other yra :value.',
    'missing_unless' => ':attribute laukas turi būti tuščias, nebent :other yra :value.',
    'missing_with' => ':attribute laukas turi būti tuščias, kai yra :values.',
    'missing_with_all' => ':attribute laukas turi būti tuščias, kai yra :values.',
    'multiple_of' => ':attribute laukas turi būti :value kartotinis.',
    'not_in' => 'Pasirinktas :attribute yra neteisingas.',
    'not_regex' => ':attribute lauko formatas neteisingas.',
    'numeric' => ':attribute laukas turi būti skaičius.',
    'password' => [
        'letters' => ':attribute laukas turi turėti bent vieną raidę.',
        'mixed' => ':attribute laukas turi turėti bent vieną didžiąją ir mažąją raidę.',
        'numbers' => ':attribute laukas turi turėti bent vieną skaičių.',
        'symbols' => ':attribute laukas turi turėti bent vieną simbolį.',
        'uncompromised' => 'Šis :attribute buvo nutekintas duomenų bazėse. Pasirinkite kitą.',
    ],
    'present' => ':attribute laukas turi egzistuoti.',
    'present_if' => ':attribute laukas turi egzistuoti, kai :other yra :value.',
    'present_unless' => ':attribute laukas turi egzistuoti, nebent :other yra :value.',
    'present_with' => ':attribute laukas turi egzistuoti, kai yra :values.',
    'present_with_all' => ':attribute laukas turi egzistuoti, kai yra :values.',
    'prohibited' => ':attribute laukas yra draudžiamas.',
    'prohibited_if' => ':attribute laukas draudžiamas, kai :other yra :value.',
    'prohibited_if_accepted' => ':attribute laukas draudžiamas, kai :other yra priimtas.',
    'prohibited_if_declined' => ':attribute laukas draudžiamas, kai :other yra atmestas.',
    'prohibited_unless' => ':attribute laukas draudžiamas, nebent :other yra :values.',
    'prohibits' => ':attribute laukas neleidžia egzistuoti :other.',
    'regex' => ':attribute lauko formatas neteisingas.',
    'required' => ':attribute laukas yra privalomas.',
    'required_array_keys' => ':attribute laukas turi turėti šiuos raktus: :values.',
    'required_if' => ':attribute laukas privalomas, kai :other yra :value.',
    'required_if_accepted' => ':attribute laukas privalomas, kai :other yra priimtas.',
    'required_if_declined' => ':attribute laukas privalomas, kai :other yra atmestas.',
    'required_unless' => ':attribute laukas privalomas, nebent :other yra :values.',
    'required_with' => ':attribute laukas privalomas, kai yra :values.',
    'required_with_all' => ':attribute laukas privalomas, kai yra :values.',
    'required_without' => ':attribute laukas privalomas, kai nėra :values.',
    'required_without_all' => ':attribute laukas privalomas, kai nėra nei vieno iš :values.',
    'same' => ':attribute laukas turi sutapti su :other.',
    'size' => [
        'array' => ':attribute laukas turi turėti :size elementų.',
        'file' => ':attribute laukas turi būti :size kilobaitų.',
        'numeric' => ':attribute laukas turi būti :size.',
        'string' => ':attribute laukas turi būti :size simbolių.',
    ],
    'starts_with' => ':attribute laukas turi prasidėti viena iš šių reikšmių: :values.',
    'string' => ':attribute laukas turi būti tekstas.',
    'timezone' => ':attribute laukas turi būti galiojanti laiko juosta.',
    'unique' => ':attribute jau yra užimtas.',
    'uploaded' => ':attribute nepavyko įkelti.',
    'uppercase' => ':attribute laukas turi būti didžiosiomis raidėmis.',
    'url' => ':attribute laukas turi būti galiojantis URL adresas.',
    'ulid' => ':attribute laukas turi būti galiojantis ULID.',
    'uuid' => ':attribute laukas turi būti galiojantis UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
