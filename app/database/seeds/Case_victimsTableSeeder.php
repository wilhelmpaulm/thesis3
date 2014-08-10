<?php

class Case_victimsTableSeeder extends Seeder {

    public function run() {
        // Uncomment the below to wipe the table clean before populating
        DB::table('case_victims')->truncate();

        $case_victims = array(
            ["case_id" => 1, "client_id" => 101],
            ["case_id" => 2, "client_id" => 102],
            ["case_id" => 3, "client_id" => 103],
            ["case_id" => 4, "client_id" => 104],
            ["case_id" => 5, "client_id" => 105],
            ["case_id" => 6, "client_id" => 106],
            ["case_id" => 6, "client_id" => 107],
            ["case_id" => 6, "client_id" => 108],
            ["case_id" => 7, "client_id" => 109],
            ["case_id" => 8, "client_id" => 110],
            ["case_id" => 9, "client_id" => 111],
            ["case_id" => 9, "client_id" => 112],
            //no victim for 10 (illegal gambling site lang)
            ["case_id" => 11, "client_id" => 113],
            ["case_id" => 11, "client_id" => 114],
            ["case_id" => 11, "client_id" => 115],
            ["case_id" => 11, "client_id" => 116],
            ["case_id" => 11, "client_id" => 117],
            //no victim for 12 (counterfeiting lang)
            ["case_id" => 13, "client_id" => 118],
            ["case_id" => 13, "client_id" => 119],
            ["case_id" => 13, "client_id" => 120],
            ["case_id" => 13, "client_id" => 121],
            ["case_id" => 13, "client_id" => 122],
            //no victim for 14 and 15 (drugs dealers spotted)
            ["case_id" => 16, "client_id" => 123],
            ["case_id" => 17, "client_id" => 124],
            ["case_id" => 18, "client_id" => 125],
            ["case_id" => 18, "client_id" => 126],
            ["case_id" => 19, "client_id" => 127],
            ["case_id" => 20, "client_id" => 128],
            ["case_id" => 20, "client_id" => 129],
            ["case_id" => 20, "client_id" => 130],
            //no victim for 21 (druglord released)
            ["case_id" => 22, "client_id" => 131],
            ["case_id" => 23, "client_id" => 132],
            ["case_id" => 24, "client_id" => 133],
            ["case_id" => 24, "client_id" => 134],
            ["case_id" => 25, "client_id" => 135],
            ["case_id" => 26, "client_id" => 136],
            ["case_id" => 27, "client_id" => 137],
            ["case_id" => 27, "client_id" => 138],
            ["case_id" => 27, "client_id" => 139],
            //no victim for 28 (caught drug dealing)
            ["case_id" => 29, "client_id" => 140],
            ["case_id" => 30, "client_id" => 141],
            ["case_id" => 31, "client_id" => 142],
            ["case_id" => 32, "client_id" => 143],
            //no victim for 33 phony license
            ["case_id" => 34, "client_id" => 144],
            ["case_id" => 35, "client_id" => 145],
            ["case_id" => 36, "client_id" => 146],
            ["case_id" => 37, "client_id" => 147],
            ["case_id" => 38, "client_id" => 148],
            ["case_id" => 39, "client_id" => 149],
            ["case_id" => 40, "client_id" => 150],
            ["case_id" => 41, "client_id" => 151],
            ["case_id" => 42, "client_id" => 152],
            ["case_id" => 43, "client_id" => 153],
            ["case_id" => 44, "client_id" => 154],
            ["case_id" => 45, "client_id" => 155],
            ["case_id" => 46, "client_id" => 156],
            //no victim for 47 (caught prosti+drugs)
            ["case_id" => 48, "client_id" => 157],
            ["case_id" => 49, "client_id" => 158],
            ["case_id" => 50, "client_id" => 159],
            ["case_id" => 51, "client_id" => 160],
            ["case_id" => 52, "client_id" => 161],
            ["case_id" => 52, "client_id" => 162],
            ["case_id" => 52, "client_id" => 163],
            ["case_id" => 53, "client_id" => 164],
            ["case_id" => 54, "client_id" => 165],
            ["case_id" => 55, "client_id" => 5], 
            //["case_id" => 56, "client_id" => 6], no victim because arson
            ["case_id" => 57, "client_id" => 2],
            ["case_id" => 58, "client_id" => 7],
            ["case_id" => 59, "client_id" => 8],
            //no victim for 60 (seen abduction)
            //no victim for 61 (abortion)
            ["case_id" => 62, "client_id" => 428],
            ["case_id" => 63, "client_id" => 430],
            ["case_id" => 64, "client_id" => 432],
            ["case_id" => 65, "client_id" => 434],
            ["case_id" => 66, "client_id" => 411],
            ["case_id" => 67, "client_id" => 413],
            ["case_id" => 68, "client_id" => 415],
            ["case_id" => 69, "client_id" => 417],
            ["case_id" => 70, "client_id" => 419],
            //no victim for 71 (abandoned building set on fire)
            ["case_id" => 72, "client_id" => 421],
            ["case_id" => 73, "client_id" => 22],
            ["case_id" => 74, "client_id" => 23],
            ["case_id" => 75, "client_id" => 27],
            ["case_id" => 76, "client_id" => 423],
            ["case_id" => 77, "client_id" => 424],
            //no victim for 78-79 (counterfeiting lang)
            ["case_id" => 80, "client_id" => 425],
            
            ["case_id" => 81, "client_id" => 166],
            ["case_id" => 82, "client_id" => 166],
            ["case_id" => 83, "client_id" => 167],
            ["case_id" => 84, "client_id" => 167],
            ["case_id" => 85, "client_id" => 168],
            ["case_id" => 86, "client_id" => 169],
            ["case_id" => 87, "client_id" => 170],
            ["case_id" => 88, "client_id" => 171],
            ["case_id" => 89, "client_id" => 172],
            ["case_id" => 90, "client_id" => 173],
            ["case_id" => 91, "client_id" => 174],
            ["case_id" => 92, "client_id" => 175],
            ["case_id" => 93, "client_id" => 176],
            ["case_id" => 94, "client_id" => 177],
            ["case_id" => 95, "client_id" => 178],
            ["case_id" => 96, "client_id" => 179],
            ["case_id" => 97, "client_id" => 180],
            ["case_id" => 98, "client_id" => 181],
            ["case_id" => 99, "client_id" => 182],
            ["case_id" => 100, "client_id" => 183],
            ["case_id" => 101, "client_id" => 184],
            ["case_id" => 102, "client_id" => 185],
            ["case_id" => 103, "client_id" => 186],
            ["case_id" => 104, "client_id" => 187],
            ["case_id" => 105, "client_id" => 188],
            ["case_id" => 106, "client_id" => 189],
            ["case_id" => 107, "client_id" => 190],
            ["case_id" => 108, "client_id" => 191],
            ["case_id" => 109, "client_id" => 192],
            ["case_id" => 110, "client_id" => 193],
            ["case_id" => 111, "client_id" => 194],
            ["case_id" => 112, "client_id" => 195],
            ["case_id" => 113, "client_id" => 196],
            ["case_id" => 114, "client_id" => 197],
            ["case_id" => 115, "client_id" => 198],
            ["case_id" => 116, "client_id" => 199],
            ["case_id" => 117, "client_id" => 200],
            ["case_id" => 118, "client_id" => 201],
            ["case_id" => 119, "client_id" => 202],
            ["case_id" => 120, "client_id" => 203],
            ["case_id" => 121, "client_id" => 204],
            ["case_id" => 122, "client_id" => 205],
            ["case_id" => 123, "client_id" => 206],
            ["case_id" => 124, "client_id" => 207],
            ["case_id" => 125, "client_id" => 208],
            ["case_id" => 126, "client_id" => 209],
            ["case_id" => 127, "client_id" => 210],
            ["case_id" => 128, "client_id" => 211],
            ["case_id" => 129, "client_id" => 212],
            ["case_id" => 130, "client_id" => 213],





            // VICTIMS FROM NBI PRESS RELEASE ***********************************************************************************

            ["case_id" => 131, "client_id" => 528],
            ["case_id" => 132, "client_id" => 529],
            ["case_id" => 133, "client_id" => 530],
            ["case_id" => 134, "client_id" => 531],
            ["case_id" => 135, "client_id" => 532],
            // NO VICTIMS 136-137
            ["case_id" => 138, "client_id" => 499],
            ["case_id" => 139, "client_id" => 533],
            ["case_id" => 140, "client_id" => 534],
            ["case_id" => 141, "client_id" => 535],
            ["case_id" => 142, "client_id" => 536],
            ["case_id" => 143, "client_id" => 537],
            ["case_id" => 144, "client_id" => 538],
            ["case_id" => 145, "client_id" => 539],
            ["case_id" => 146, "client_id" => 540],
            ["case_id" => 147, "client_id" => 541],
            ["case_id" => 148, "client_id" => 542],
            ["case_id" => 149, "client_id" => 543],
            ["case_id" => 150, "client_id" => 544],
            ["case_id" => 151, "client_id" => 545],
            ["case_id" => 152, "client_id" => 546],
            ["case_id" => 153, "client_id" => 547],
            ["case_id" => 154, "client_id" => 548],
            ["case_id" => 155, "client_id" => 549],
            ["case_id" => 156, "client_id" => 550],
            ["case_id" => 157, "client_id" => 551],
            ["case_id" => 158, "client_id" => 552],
            ["case_id" => 159, "client_id" => 558],
            ["case_id" => 160, "client_id" => 559],
            ["case_id" => 161, "client_id" => 560],



            //VICTIMs FROM WIKIPILIPINAS **************************************************************************************

           
            ["case_id" => 162, "client_id" => 602],

            ["case_id" => 163, "client_id" => 603],
            ["case_id" => 163, "client_id" => 604],

            ["case_id" => 164, "client_id" => 605],
            ["case_id" => 165, "client_id" => 606],
            ["case_id" => 166, "client_id" => 607],
            ["case_id" => 167, "client_id" => 608],

            ["case_id" => 168, "client_id" => 609],
            ["case_id" => 168, "client_id" => 610],
            ["case_id" => 168, "client_id" => 611],

            ["case_id" => 169, "client_id" => 612],
            ["case_id" => 170, "client_id" => 613],
            ["case_id" => 171, "client_id" => 614],
            ["case_id" => 172, "client_id" => 615],
            ["case_id" => 173, "client_id" => 616],
            ["case_id" => 174, "client_id" => 617],
            ["case_id" => 175, "client_id" => 618],
            ["case_id" => 176, "client_id" => 619],
            ["case_id" => 177, "client_id" => 620],
            ["case_id" => 178, "client_id" => 621],
            ["case_id" => 179, "client_id" => 622],
            ["case_id" => 180, "client_id" => 623],
            ["case_id" => 181, "client_id" => 624],
            ["case_id" => 182, "client_id" => 625],

            ["case_id" => 183, "client_id" => 626],
            ["case_id" => 183, "client_id" => 627],

            ["case_id" => 184, "client_id" => 628],
            ["case_id" => 184, "client_id" => 629],
            ["case_id" => 184, "client_id" => 630],
            ["case_id" => 184, "client_id" => 631],

            ["case_id" => 185, "client_id" => 632],
            ["case_id" => 186, "client_id" => 633],
            ["case_id" => 187, "client_id" => 634],
            ["case_id" => 188, "client_id" => 635],
            ["case_id" => 189, "client_id" => 636],

            ["case_id" => 190, "client_id" => 637],
            ["case_id" => 190, "client_id" => 638],

            ["case_id" => 191, "client_id" => 639],
            ["case_id" => 192, "client_id" => 640],
            ["case_id" => 193, "client_id" => 641],
            ["case_id" => 194, "client_id" => 642],
            ["case_id" => 195, "client_id" => 643],
            ["case_id" => 196, "client_id" => 644],

            ["case_id" => 197, "client_id" => 645],
            ["case_id" => 197, "client_id" => 646],

            ["case_id" => 198, "client_id" => 647],
            ["case_id" => 199, "client_id" => 648],
            ["case_id" => 200, "client_id" => 649],
            ["case_id" => 201, "client_id" => 650],


//**************************************************************************************************************************************************  

            //VICTIMS FROM DOJ MAJOR CASES    
            ["case_id" => 202, "client_id" => 692],

            ["case_id" => 203, "client_id" => 693],
            ["case_id" => 203, "client_id" => 694], 
            ["case_id" => 203, "client_id" => 695],   

            ["case_id" => 204, "client_id" => 696], 
            ["case_id" => 204, "client_id" => 697],      

            ["case_id" => 205, "client_id" => 696], 
            


        );

        // Uncomment the below to run the seeder
        DB::table('case_victims')->insert($case_victims);
    }

}
