<?php

class Client_contactsTableSeeder extends Seeder {

    public function run() {
        // Uncomment the below to wipe the table clean before populating
        DB::table('client_contacts')->truncate();

        $client_contacts = array(
            ["client_id" => 1, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 2, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 3, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 4, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 5, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 6, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 7, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 8, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 9, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 10, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 11, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 12, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 13, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 14, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 15, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 16, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 17, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 18, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 19, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 20, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 21, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 22, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 23, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 24, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 25, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 26, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 27, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 28, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 29, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 30, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 31, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 32, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 33, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 34, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 35, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 36, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 37, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 38, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 39, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 40, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 41, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 42, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 43, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 44, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 45, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 46, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 47, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 48, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 49, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 50, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 51, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 52, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 53, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 54, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 55, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 56, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 57, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 58, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 59, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 60, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 61, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 62, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 63, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 64, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 65, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 66, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 67, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 68, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 69, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 70, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 71, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 72, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 73, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 74, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 75, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 76, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 77, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 78, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 79, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 80, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 81, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 82, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 83, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 84, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 85, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 86, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 87, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 88, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 89, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 90, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 91, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 92, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 93, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 94, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 95, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 96, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 97, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 98, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 99, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 100, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 101, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 102, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 103, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 104, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 105, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 106, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 107, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 108, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 109, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 110, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 111, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 112, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 113, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 114, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 115, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 116, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 117, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 118, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 119, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 120, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 121, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 122, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 123, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 124, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 125, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 126, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 127, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 128, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 129, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 130, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 131, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 132, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 133, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 134, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 135, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 136, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 137, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 138, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 139, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 140, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 141, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 142, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 143, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 144, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 145, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 146, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 147, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 148, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 149, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 150, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 151, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 152, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 153, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 154, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 155, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 156, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 157, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 158, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 159, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 160, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 161, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 162, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 163, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 164, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 165, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 166, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 167, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 168, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 169, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 170, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 171, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 172, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 173, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 174, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 175, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 176, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 177, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 178, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 179, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 180, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 181, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 182, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 183, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 184, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 185, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 186, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 187, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 188, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 189, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 190, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 191, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 192, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 193, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 194, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 195, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 196, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 197, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 198, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 199, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 200, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 201, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 202, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 203, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 204, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 205, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 206, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 207, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 208, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 209, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 210, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 211, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 212, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 213, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 214, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 215, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 216, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 217, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 218, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 219, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 220, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 221, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 222, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 223, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 224, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 225, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 226, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 227, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 228, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 229, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 230, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 231, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 232, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 233, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 234, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 235, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 236, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 237, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 238, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 239, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 240, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 241, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 242, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 243, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 244, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 245, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 246, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 247, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 248, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 249, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 250, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 251, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 252, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 253, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 254, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 255, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 256, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 257, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 258, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 259, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 260, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 261, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 262, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 263, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 264, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 265, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 266, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 267, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 268, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 269, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 270, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 271, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 272, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 273, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 274, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 275, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 276, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 277, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 278, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 279, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 280, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 281, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 282, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 283, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 284, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 285, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 286, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 287, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 288, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 289, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 290, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 291, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 292, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 293, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 294, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 294, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 295, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 296, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 297, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 298, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 299, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 300, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 301, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 302, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 303, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 304, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 305, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 306, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 307, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 308, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 309, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 310, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 311, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 312, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 313, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 314, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 315, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 316, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 317, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 318, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 319, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 320, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 321, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 322, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 323, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 324, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 325, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 326, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 327, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 328, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 329, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 330, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 331, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 332, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 333, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 334, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 335, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 336, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 337, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 338, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 339, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 340, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 341, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 342, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 343, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 344, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 345, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 346, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 347, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 348, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 349, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 350, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 351, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 352, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 353, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 354, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 355, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 356, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 357, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 358, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 359, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 360, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 361, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 362, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 363, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 364, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 365, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 366, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 367, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 368, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 369, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 370, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 371, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 372, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 373, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 374, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 375, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 376, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 377, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 378, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 379, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 380, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 381, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 382, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 383, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 384, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 385, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 386, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 387, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 388, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 389, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 390, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 391, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 392, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 393, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 394, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 395, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 396, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 397, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 398, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 399, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 400, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 401, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 402, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 403, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 404, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 405, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 406, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 407, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 408, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 409, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 410, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 411, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 412, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 413, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 414, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 415, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 416, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 417, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 418, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 419, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 420, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 421, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 422, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 423, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 424, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 425, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 426, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 427, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 428, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 429, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 430, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 431, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 432, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 433, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 434, "type" => "Mobile", "contact" => "09123456789"],
            ["client_id" => 435, "type" => "Mobile", "contact" => "09123456789"],
        );

        // Uncomment the below to run the seeder
        DB::table('client_contacts')->insert($client_contacts);
    }

}