<?php

class Case_typesTableSeeder extends Seeder {

    public function run() {

// Uncomment the below to wipe the table clean before populating

        DB::table('case_types')->truncate();

        $case_types = array(
            ["type" => "Prostitution", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Vandalism", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Domestic Violence", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Drunk driving", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Murder", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Possession of Dangerous Drugs For Sale", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Robbery", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Rape", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Uncategorized", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Treason", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Espionage", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Piracy", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Homicide", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Physical Injuries", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Arbitrary Detention", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Delaying release", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Expulsion", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Violation of domicile", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Prohibition, interruption, and dissolution of peaceful meetings", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Crime against religious worship", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Rebellion", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Sedition", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Disloyalty", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Disturbance of proceedings", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Crime against legislative bodies and similar bodies", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Violation of parliamentary immunity", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Illegal assemblies", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Illegal association", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Direct assault", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Indirect assault", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Disobedience to person in authority and their agents", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Public disorder", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Evasion of service of sentence", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Commission of another crime during service of penalty imposed for another previous offense", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Forgeries", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Counterfeiting", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Falsification", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Fraud", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Possession, preparation and use of prohibited drugs and maintenance of opium dens", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Gambling and Betting", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Grave scandal", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Immortal doctrines, obscene publications and exhibitions", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Dereliction of duty", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Betrayal of trust by an attorney or solicitor", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Knowingly rendering unjust judgement", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Judgement rendered through negligence", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Unjust interlocutory order", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Malicious delay in the administration of justice", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Prosecution of offense", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Bribery", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Corruption of public officials", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Prohibited transaction", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Possession of prohibited interest by a public officer", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Malversation of public funds or property", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Conniving with or consenting to evasion", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Evasion through negligence", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Infidelity", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Revelation of secret", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Disobedience", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Refusal of assistance", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Maltreatment of prisoner", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Anticipation of duties of a public office", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Prolonging performance of duties and powers", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Abandonment of office or position", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Usurpation", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Unlawful appointments", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Abuses against chastity", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Parricide", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Homicide", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Suicide", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Discharge of firearms", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Infanticide", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Abortion", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Duel", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Mutilation", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Serious physical injuries", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Serious illegal detention", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Slight illegal detention", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Unlawful arrest", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Kidnapping", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Slavery", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Exploitation of child labor", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Services rendered under compulsion in payment of debts", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Abandonment of helpless persons", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Exploitation of minors", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Trespassing", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Dwelling", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Grave threats", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Light threats", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Grave coercions", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Light coercions", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Robbery", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "False keys", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Brigandage", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Theft", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Fraudulent insolvency", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Swindling", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Chattel Mortgage", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Arson", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Malicious mischief", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Person exempt for criminal liability", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Adultery", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Concubinage", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Seduction", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Corruption of minor", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "White slave trade", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Abduction", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Bigamy", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Illegal marriage", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Libel", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Slander", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Incriminatory machination", "difficulty" => 3, "manpower" => 4, "time" => 3],
            ["type" => "Criminal negligence", "difficulty" => 3, "manpower" => 4, "time" => 3],
        );


// Uncomment the below to run the seeder

        DB::table('case_types')->insert($case_types);
    }

}
