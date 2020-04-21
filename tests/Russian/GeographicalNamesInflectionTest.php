<?php
namespace morphos\test\Russian;

use morphos\Russian\Cases;
use morphos\Russian\GeographicalNamesInflection;

class GeographicalNamesInflectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider wordsProvider
     * @throws \Exception
     */
    public function testInflection($word, $case2, $case3, $case4, $case5, $case6, $case7)
    {
        $this->assertEquals([
            Cases::IMENIT => $word,
            Cases::RODIT => $case2,
            Cases::DAT => $case3,
            Cases::VINIT => $case4,
            Cases::TVORIT => $case5,
            Cases::PREDLOJ => $case6,
            Cases::LOCATIVE => $case7,
        ], GeographicalNamesInflection::getCases($word));
    }

    public function wordsProvider()
    {
        return array(
            ['Москва', 'Москвы', 'Москве', 'Москву', 'Москвой', 'Москве', 'Москве'],
            ['Киев', 'Киева', 'Киеву', 'Киев', 'Киевом', 'Киеве', 'Киеве'],
            ['Ишимбай', 'Ишимбая', 'Ишимбаю', 'Ишимбай', 'Ишимбаем', 'Ишимбае', 'Ишимбае'],
            ['Африка', 'Африки', 'Африке', 'Африку', 'Африкой', 'Африке', 'Африке'],
            ['Уругвай', 'Уругвая', 'Уругваю', 'Уругвай', 'Уругваем', 'Уругвае', 'Уругвае'],
            ['Европа', 'Европы', 'Европе', 'Европу', 'Европой', 'Европе', 'Европе'],
            ['Азия', 'Азии', 'Азии', 'Азию', 'Азией', 'Азии', 'Азии'],
            ['Рига', 'Риги', 'Риге', 'Ригу', 'Ригой', 'Риге', 'Риге'],
            ['Волга', 'Волги', 'Волге', 'Волгу', 'Волгой', 'Волге', 'Волге'],
            ['Ставрополь', 'Ставрополя', 'Ставрополю', 'Ставрополь', 'Ставрополем', 'Ставрополе', 'Ставрополе'],
            ['Тверь', 'Твери', 'Твери', 'Тверь', 'Тверью', 'Твери', 'Твери'],
            ['Ессентуки', 'Ессентуков', 'Ессентукам', 'Ессентуки', 'Ессентуками', 'Ессентуках', 'Ессентуках'],
            ['Пермь', 'Перми', 'Перми', 'Пермь', 'Пермью', 'Перми', 'Перми'],
            ['Рязань', 'Рязани', 'Рязани', 'Рязань', 'Рязанью', 'Рязани', 'Рязани'],
            ['Осташков', 'Осташкова', 'Осташкову', 'Осташков', 'Осташковым', 'Осташкове', 'Осташкове'],
            ['Грозный', 'Грозного', 'Грозному', 'Грозный', 'Грозным', 'Грозном', 'Грозном'],
            ['Благодарный', 'Благодарного', 'Благодарному', 'Благодарный', 'Благодарным', 'Благодарном', 'Благодарном'],
            ['Псков', 'Пскова', 'Пскову', 'Псков', 'Псковом', 'Пскове', 'Пскове'],
            ['Киров', 'Кирова', 'Кирову', 'Киров', 'Кировом', 'Кирове', 'Кирове'],
            ['Керчь', 'Керчи', 'Керчи', 'Керчь', 'Керчью', 'Керчи', 'Керчи'],
            ['Анадырь', 'Анадыря', 'Анадырю', 'Анадырь', 'Анадырем', 'Анадыре', 'Анадыре'],
            ['Россошь', 'Россоши', 'Россоши', 'Россошь', 'Россошью', 'Россоши', 'Россоши'],
            ['Чебоксары', 'Чебоксар', 'Чебоксарам', 'Чебоксары', 'Чебоксарами', 'Чебоксарах', 'Чебоксарах'],
            ['Ивацевичи', 'Ивацевичей', 'Ивацевичам', 'Ивацевичи', 'Ивацевичами', 'Ивацевичах', 'Ивацевичах'],
            ['Глубокое', 'Глубокого', 'Глубокому', 'Глубокое', 'Глубоким', 'Глубоком', 'Глубоком'],
            ['Египет', 'Египта', 'Египту', 'Египет', 'Египтом', 'Египте', 'Египте'],
            ['Столбцы', 'Столбцов', 'Столбцам', 'Столбцы', 'Столбцами', 'Столбцах', 'Столбцах'],
            ['Ханты-Мансийск', 'Ханты-Мансийска', 'Ханты-Мансийску', 'Ханты-Мансийск', 'Ханты-Мансийском', 'Ханты-Мансийске', 'Ханты-Мансийске'],
            ['Крым', 'Крыма', 'Крыму', 'Крым', 'Крымом', 'Крыме', 'Крыму'],

            // с беглой гласной
            ['Торжок', 'Торжка', 'Торжку', 'Торжок', 'Торжком', 'Торжке', 'Торжке'],
            ['Вышний Волочек', 'Вышнего Волочка', 'Вышнему Волочку', 'Вышний Волочек', 'Вышним Волочком', 'Вышнем Волочке', 'Вышнем Волочке'],
            ['Орёл', 'Орла', 'Орлу', 'Орёл', 'Орлом', 'Орле', 'Орле'],

            // сложные названия
            ['Санкт-Петербург', 'Санкт-Петербурга', 'Санкт-Петербургу', 'Санкт-Петербург', 'Санкт-Петербургом', 'Санкт-Петербурге', 'Санкт-Петербурге'],
            ['Ростов-на-Дону', 'Ростова-на-Дону', 'Ростову-на-Дону', 'Ростов-на-Дону', 'Ростовом-на-Дону', 'Ростове-на-Дону', 'Ростове-на-Дону'],
            ['Нижний Новгород', 'Нижнего Новгорода', 'Нижнему Новгороду', 'Нижний Новгород', 'Нижним Новгородом', 'Нижнем Новгороде', 'Нижнем Новгороде'],
            ['Набережные Челны', 'Набережных Челнов', 'Набережным Челнам', 'Набережные Челны', 'Набережными Челнами', 'Набережных Челнах', 'Набережных Челнах'],

            // N край
            ['Краснодарский край', 'Краснодарского края', 'Краснодарскому краю', 'Краснодарский край', 'Краснодарским краем', 'Краснодарском крае', 'Краснодарском крае'],

           	// N область
            ['Ростовская область', 'Ростовской области', 'Ростовской области', 'Ростовскую область', 'Ростовской областью', 'Ростовской области', 'Ростовской области'],

            // город N
            ['город Москва', 'города Москва', 'городу Москва', 'город Москва', 'городом Москва', 'городе Москва', 'городе Москва'],

            // село N
            ['село Привольное', 'села Привольное', 'селу Привольное', 'село Привольное', 'селом Привольное', 'селе Привольное', 'селе Привольное'],

            // республика N
            ['Республика Крым', 'Республики Крым', 'Республике Крым', 'Республику Крым', 'Республикой Крым', 'Республике Крым', 'Республике Крым'],

            // исключения
            ['Великие Луки', 'Великих Лук', 'Великим Лукам', 'Великие Луки', 'Великими Луками', 'Великих Луках', 'Великих Луках'],
            ['Электросталь', 'Электростали', 'Электростали', 'Электросталь', 'Электросталью', 'Электростали', 'Электростали'],

            // неизменяемые названия
            ['США', 'США', 'США', 'США', 'США', 'США', 'США'],
            ['ОАЭ', 'ОАЭ', 'ОАЭ', 'ОАЭ', 'ОАЭ', 'ОАЭ', 'ОАЭ'],
        );
    }

    /**
     * @dataProvider immutableWordsProvider
     */
    public function testImmutableWords($word)
    {
        $this->assertFalse(GeographicalNamesInflection::isMutable($word));
    }

    public function immutableWordsProvider()
    {
        return [
            ['сша'],
            ['оаэ'],
        ];
    }
}
