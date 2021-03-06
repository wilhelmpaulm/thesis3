<?php

class LanguagesTableSeeder extends Seeder {

    public function run() {
        // Uncomment the below to wipe the table clean before populating
        DB::table('languages')->truncate();

        $languages = array(
            ["name" => "English"],
            ["name" => "Abkhaz"],
            ["name" => "Adyghe"],
            ["name" => "Afrikaans"],
            ["name" => "Albaninan"],
            ["name" => "American Sign Language"],
            ["name" => "Arabic"],
            ["name" => "Aragonese"],
            ["name" => "Armenian"],
            ["name" => "Aymara"],
            ["name" => "Balinese"],
            ["name" => "Basque"],
            ["name" => "Betawi"],
            ["name" => "Bosnian"],
            ["name" => "Breton"],
            ["name" => "Bulgarian"],
            ["name" => "Cantonese"],
            ["name" => "Catalan"],
            ["name" => "Chinese"],
            ["name" => "Coptic"],
            ["name" => "Cornish"],
            ["name" => "Corsican"],
            ["name" => "Crimean Tatar"],
            ["name" => "Croatian"],
            ["name" => "Czech"],
            ["name" => "Danish"],
            ["name" => "Dutch"],
            ["name" => "Esperanto"],
            ["name" => "Estonian"],
            ["name" => "Ewe"],
            ["name" => "Fiji Hindi"],
            ["name" => "Filipino"],
            ["name" => "Finnish"],
            ["name" => "French"],
            ["name" => "Galician"],
            ["name" => "Georgian"],
            ["name" => "German"],
            ["name" => "Greek"],
            ["name" => "Ancient Greek"],
            ["name" => "Greenladic"],
            ["name" => "Haitian Creole"],
            ["name" => "Hawaiian"],
            ["name" => "Hebrew"],
            ["name" => "Hindi"],
            ["name" => "Hungarian"],
            ["name" => "Icelandic"],
            ["name" => "Indonesian"],
            ["name" => "Inuktitut"],
            ["name" => "Interlingua"],
            ["name" => "Irish"],
            ["name" => "Italian"],
            ["name" => "Japanese"],
            ["name" => "Kabardian"],
            ["name" => "Khmer"],
            ["name" => "Kinyarwanda"],
            ["name" => "Korean"],
            ["name" => "Kurdish"],
            ["name" => "Ladin"],
            ["name" => "Latgalian"],
            ["name" => "Latin"],
            ["name" => "Lingala"],
            ["name" => "Livonian"],
            ["name" => "Lojban"],
            ["name" => "Lower Sorbian"],
            ["name" => "Low German"],
            ["name" => "Macedonian"],
            ["name" => "Malay"],
            ["name" => "Malayalam"],
            ["name" => "Mandarin"],
            ["name" => "Manx"],
            ["name" => "Maori"],
            ["name" => "Mauritian Creole"],
            ["name" => "Min Nan"],
            ["name" => "Mongolian"],
            ["name" => "Norwegian"],
            ["name" => "Old American"],
            ["name" => "Old English"],
            ["name" => "Old French"],
            ["name" => "Old Norse"],
            ["name" => "Old Prussian"],
            ["name" => "Oriya"],
            ["name" => "Pangasinan"],
            ["name" => "Papiamentu"],
            ["name" => "Pashto"],
            ["name" => "Persian"],
            ["name" => "Pitjantjatjara"],
            ["name" => "Polish"],
            ["name" => "Portugese"],
            ["name" => "Proto-Slavic"],
            ["name" => "Rapa Nui"],
            ["name" => "Romanian"],
            ["name" => "Russian"],
            ["name" => "Sanskrit"],
            ["name" => "Scots"],
            ["name" => "Scottish Gaelic"],
            ["name" => "Serbian"],
            ["name" => "Serbo-Croatian"],
            ["name" => "Slovak"],
            ["name" => "Slovene"],
            ["name" => "Spanish"],
            ["name" => "Sinhalese"],
            ["name" => "Swahili"],
            ["name" => "Swedish"],
            ["name" => "Tajik"],
            ["name" => "Tamil"],
            ["name" => "Tarantino"],
            ["name" => "Telugu"],
            ["name" => "Thai"],
            ["name" => "Tok Pisin"],
            ["name" => "Turkish"],
            ["name" => "Ukranian"],
            ["name" => "Upper Sorbian"],
            ["name" => "Urdu"],
            ["name" => "Uzbek"],
            ["name" => "Venetian"],
            ["name" => "Vietnamese"],
            ["name" => "Vilamovian"],
            ["name" => "Volapuk"],
            ["name" => "Voro"],
            ["name" => "Welsh"],
            ["name" => "Xhosa"],
            ["name" => "Yiddish"],
        );

        // Uncomment the below to run the seeder
        DB::table('languages')->insert($languages);
    }

}
