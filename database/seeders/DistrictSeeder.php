<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $tbl_district =   [
            ["id" => 1, 'en_name' => 'Bhojpur', 'np_name' => 'भोजपुर', 'en_slug' => 'bhojpur', 'np_slug' => 'भोजपुर', 'province' => 1],
            ["id" => 2, 'en_name' => 'Dhankuta', 'np_name' => 'धनकुटा', 'en_slug' => 'dhankuta', 'np_slug' => 'धनकुटा', 'province' => 1],
            ["id" => 3, 'en_name' => 'Ilam', 'np_name' => 'इलाम', 'en_slug' => 'ilam', 'np_slug' => 'इलाम', 'province' => 1],
            ["id" => 4, 'en_name' => 'Jhapa', 'np_name' => 'झापा', 'en_slug' => 'jhapa', 'np_slug' => 'झापा', 'province' => 1],
            ["id" => 5, 'en_name' => 'Khotang', 'np_name' => 'खोटाँग', 'en_slug' => 'khotang', 'np_slug' => 'खोटाँग', 'province' => 1],
            ["id" => 6, 'en_name' => 'Morang', 'np_name' => 'मोरंग', 'en_slug' => 'morang', 'np_slug' => 'मोरंग', 'province' => 1],
            ["id" => 7, 'en_name' => 'Okhaldhunga', 'np_name' => 'ओखलढुंगा', 'en_slug' => 'okhaldhunga', 'np_slug' => 'ओखलढुंगा', 'province' => 1],
            ["id" => 8, 'en_name' => 'Panchthar', 'np_name' => 'पांचथर', 'en_slug' => 'panchthar', 'np_slug' => 'पांचथर', 'province' => 1],
            ["id" => 9, 'en_name' => 'Sankhuwasabha', 'np_name' => 'संखुवासभा', 'en_slug' => 'sankhuwasabha', 'np_slug' => 'संखुवासभा', 'province' => 1],
            ["id" => 10, 'en_name' => 'Solukhumbu', 'np_name' => 'सोलुखुम्बू', 'en_slug' => 'solukhumbu', 'np_slug' => 'सोलुखुम्बू', 'province' => 1],
            ["id" => 11, 'en_name' => 'Sunsari', 'np_name' => 'सुनसरी', 'en_slug' => 'sunsari', 'np_slug' => 'सुनसरी', 'province' => 1],
            ["id" => 12, 'en_name' => 'Taplejung', 'np_name' => 'ताप्लेजुंग', 'en_slug' => 'taplejung', 'np_slug' => 'ताप्लेजुंग', 'province' => 1],
            ["id" => 13, 'en_name' => 'Terhathum', 'np_name' => 'तेह्रथुम', 'en_slug' => 'terhathum', 'np_slug' => 'तेह्रथुम', 'province' => 1],
            ["id" => 14, 'en_name' => 'Udayapur', 'np_name' => 'उदयपुर', 'en_slug' => 'udayapur', 'np_slug' => 'उदयपुर', 'province' => 1],


            // province 2
            ["id" => 15, 'en_name' => 'Saptari', 'np_name' => 'सप्तरी', 'en_slug' => 'saptari', 'np_slug' => 'सप्तरी', 'province' => 2],
            ["id" => 16, 'en_name' => 'Siraha', 'np_name' => 'सिराहा', 'en_slug' => 'siraha', 'np_slug' => 'सिराहा', 'province' => 2],
            ["id" => 17, 'en_name' => 'Dhanusha', 'np_name' => 'धनुषा', 'en_slug' => 'dhanusha', 'np_slug' => 'धनुषा', 'province' => 2],
            ["id" => 18, 'en_name' => 'Mahottari', 'np_name' => 'महोत्तरी', 'en_slug' => 'mahottari', 'np_slug' => 'महोत्तरी', 'province' => 2],
            ["id" => 19, 'en_name' => 'Sarlahi', 'np_name' => 'सर्लाही', 'en_slug' => 'sarlahi', 'np_slug' => 'सर्लाही', 'province' => 2],
            ["id" => 20, 'en_name' => 'Bara', 'np_name' => 'बारा', 'en_slug' => 'bara', 'np_slug' => 'बारा', 'province' => 2],
            ["id" => 21, 'en_name' => 'Parsa', 'np_name' => 'पर्सा', 'en_slug' => 'parsa', 'np_slug' => 'पर्सा', 'province' => 2],
            ["id" => 22, 'en_name' => 'Rautahat', 'np_name' => 'रौतहट', 'en_slug' => 'rautahat', 'np_slug' => 'रौतहट', 'province' => 2],


            // Bagamati province
            ["id" => 23, 'en_name' => 'Sindhuli', 'np_name' => 'सिन्धुली', 'en_slug' => 'sindhuli', 'np_slug' => 'सिन्धुली', 'province' => 3],
            ["id" => 24, 'en_name' => 'Ramechhap', 'np_name' => 'रामेछाप', 'en_slug' => 'ramechhap', 'np_slug' => 'रामेछाप', 'province' => 3],
            ["id" => 25, 'en_name' => 'Dolakha', 'np_name' => 'दोलखा', 'en_slug' => 'dolakha', 'np_slug' => 'दोलखा', 'province' => 3],
            ["id" => 26, 'en_name' => 'Bhaktapur', 'np_name' => 'भक्तपुर', 'en_slug' => 'bhaktapur', 'np_slug' => 'भक्तपुर', 'province' => 3],
            ["id" => 27, 'en_name' => 'Dhading', 'np_name' => 'धादिङ', 'en_slug' => 'dhading', 'np_slug' => 'धादिङ', 'province' => 3],
            ["id" => 28, 'en_name' => 'Kathmandu', 'np_name' => 'काठमाडौँ', 'en_slug' => 'kathmandu', 'np_slug' => 'काठमाडौँ', 'province' => 3],
            ["id" => 29, 'en_name' => 'Kavrepalanchok', 'np_name' => 'काभ्रेपलान्चोक', 'en_slug' => 'kavrepalanchok', 'np_slug' => 'काभ्रेपलान्चोक', 'province' => 3],
            ["id" => 30, 'en_name' => 'Lalitpur', 'np_name' => 'ललितपुर', 'en_slug' => 'lalitpur', 'np_slug' => 'ललितपुर', 'province' => 3],
            ["id" => 31, 'en_name' => 'Nuwakot', 'np_name' => 'नुवाकोट', 'en_slug' => 'nuwakot', 'np_slug' => 'नुवाकोट', 'province' => 3],
            ["id" => 32, 'en_name' => 'Rasuwa', 'np_name' => 'रसुवा', 'en_slug' => 'rasuwa', 'np_slug' => 'रसुवा', 'province' => 3],
            ["id" => 33, 'en_name' => 'Sindhupalchok', 'np_name' => 'सिन्धुपाल्चोक', 'en_slug' => 'Sindhupalchok', 'np_slug' => 'सिन्धुपाल्चोक', 'province' => 3],
            ["id" => 34, 'en_name' => 'Chitwan', 'np_name' => 'चितवन', 'en_slug' => 'chitwan', 'np_slug' => 'चितवन', 'province' => 3],
            ["id" => 35, 'en_name' => 'Makwanpur', 'np_name' => 'मकवानपुर', 'en_slug' => 'makwanpur', 'np_slug' => 'मकवानपुर', 'province' => 3],

            // Gandaki province
            ["id" => 36, 'en_name' => 'Baglung', 'np_name' => 'बागलुङ', 'en_slug' => 'baglung', 'np_slug' => 'बागलुङ', 'province' => 4],
            ["id" => 37, 'en_name' => 'Gorkha', 'np_name' => 'गोरखा', 'en_slug' => 'gorkha', 'np_slug' => 'गोरखा', 'province' => 4],
            ["id" => 38, 'en_name' => 'Kaski', 'np_name' => 'कास्की', 'en_slug' => 'kaski', 'np_slug' => 'कास्की', 'province' => 4],
            ["id" => 39, 'en_name' => 'Lamjung', 'np_name' => 'लमजुङ', 'en_slug' => 'lamjung', 'np_slug' => 'लमजुङ', 'province' => 4],
            ["id" => 40, 'en_name' => 'Manang', 'np_name' => 'मनाङ', 'en_slug' => 'manang', 'np_slug' => 'मनाङ', 'province' => 4],
            ["id" => 41, 'en_name' => 'Mustang', 'np_name' => 'मुस्ताङ', 'en_slug' => 'mustang', 'np_slug' => 'मुस्ताङ', 'province' => 4],
            ["id" => 42, 'en_name' => 'Myagdi', 'np_name' => 'म्याग्दी', 'en_slug' => 'myagdi', 'np_slug' => 'म्याग्दी', 'province' => 4],
            ["id" => 43, 'en_name' => 'Nawalpur', 'np_name' => 'नवलपुर', 'en_slug' => 'nawalpur', 'np_slug' => 'नवलपुर', 'province' => 4],
            ["id" => 45, 'en_name' => 'Parbat', 'np_name' => 'पर्वत', 'en_slug' => 'parbat', 'np_slug' => 'पर्वत', 'province' => 4],
            ["id" => 46, 'en_name' => 'Syangja', 'np_name' => 'स्याङग्जा', 'en_slug' => 'syangja', 'np_slug' => 'स्याङग्जा', 'province' => 4],
            ["id" => 47, 'en_name' => 'Tanahun', 'np_name' => 'तनहुँ', 'en_slug' => 'tanahun', 'np_slug' => 'तनहुँ', 'province' => 4],

            // Rapti province
            ["id" => 48, 'en_name' => 'Kapilvastu', 'np_name' => 'कपिलवस्तु', 'en_slug' => 'kapilvastu', 'np_slug' => 'कपिलवस्तु', 'province' => 5],
            ["id" => 49, 'en_name' => 'Parasi', 'np_name' => 'परासी', 'en_slug' => 'parasi', 'np_slug' => 'परासी', 'province' => 5],
            ["id" => 50, 'en_name' => 'Rupandehi', 'np_name' => 'रुपन्देही', 'en_slug' => 'rupandehi', 'np_slug' => 'रुपन्देही', 'province' => 5],
            ["id" => 51, 'en_name' => 'Arghakhanchi', 'np_name' => 'अर्घाखाँची', 'en_slug' => 'arghakhanchi', 'np_slug' => 'अर्घाखाँची', 'province' => 5],
            ["id" => 52, 'en_name' => 'Gulmi', 'np_name' => 'गुल्मी', 'en_slug' => 'gulmi', 'np_slug' => 'गुल्मी', 'province' => 5],
            ["id" => 53, 'en_name' => 'Palpa', 'np_name' => 'पाल्पा', 'en_slug' => 'palpa', 'np_slug' => 'पाल्पा', 'province' => 5],
            ["id" => 54, 'en_name' => 'Dang', 'np_name' => 'दाङ', 'en_slug' => 'dang', 'np_slug' => 'दाङ', 'province' => 5],
            ["id" => 55, 'en_name' => 'Pyuthan', 'np_name' => 'प्युठान', 'en_slug' => 'pyuthan', 'np_slug' => 'प्युठान', 'province' => 5],
            ["id" => 56, 'en_name' => 'Rolpa', 'np_name' => 'रोल्पा', 'en_slug' => 'rolpa', 'np_slug' => 'रोल्पा', 'province' => 5],
            ["id" => 57, 'en_name' => 'Eastern Rukum', 'np_name' => 'पूर्वी रूकुम', 'en_slug' => 'eastern-rukum', 'np_slug' => 'पूर्वी-रूकुम', 'province' => 5],
            ["id" => 58, 'en_name' => 'Banke', 'np_name' => 'बाँके', 'en_slug' => 'banke', 'np_slug' => 'बाँके', 'province' => 5],
            ["id" => 59, 'en_name' => 'Bardiya', 'np_name' => 'बर्दिया', 'en_slug' => 'bardiya', 'np_slug' => 'बर्दिया', 'province' => 5],


            // Karnali province
            ["id" => 60, 'en_name' => 'Western Rukum', 'np_name' => 'पश्चिमी रूकुम', 'en_slug' => 'western-rukum', 'np_slug' => 'पश्चिमी-रूकुम', 'province' => 6],
            ["id" => 61, 'en_name' => 'Salyan', 'np_name' => 'सल्यान', 'en_slug' => 'salyan', 'np_slug' => 'सल्यान', 'province' => 6],
            ["id" => 62, 'en_name' => 'Dolpa', 'np_name' => 'डोल्पा', 'en_slug' => 'dolpa', 'np_slug' => 'डोल्पा', 'province' => 6],
            ["id" => 63, 'en_name' => 'Humla', 'np_name' => 'हुम्ला', 'en_slug' => 'humla', 'np_slug' => 'हुम्ला', 'province' => 6],
            ["id" => 64, 'en_name' => 'Jumla', 'np_name' => 'जुम्ला', 'en_slug' => 'jumla', 'np_slug' => 'जुम्ला', 'province' => 6],
            ["id" => 65, 'en_name' => 'Kalikot', 'np_name' => 'कालिकोट', 'en_slug' => 'kalikot', 'np_slug' => 'कालिकोट', 'province' => 6],
            ["id" => 66, 'en_name' => 'Mugu', 'np_name' => 'मुगु', 'en_slug' => 'mugu', 'np_slug' => 'मुगु', 'province' => 6],
            ["id" => 67, 'en_name' => 'Surkhet', 'np_name' => 'सुर्खेत', 'en_slug' => 'surkhet', 'np_slug' => 'सुर्खेत', 'province' => 6],
            ["id" => 68, 'en_name' => 'Dailekh', 'np_name' => 'दैलेख', 'en_slug' => 'dailekh', 'np_slug' => 'दैलेख', 'province' => 6],
            ["id" => 69, 'en_name' => 'Jajarkot', 'np_name' => 'जाजरकोट', 'en_slug' => 'jajarkot', 'np_slug' => 'जाजरकोट', 'province' => 6],



            // Sudherpashchim province
            ["id" => 70, 'en_name' => 'Kailali', 'np_name' => 'कैलाली', 'en_slug' => 'kailali', 'np_slug' => 'कैलाली', 'province' => 7],
            ["id" => 71, 'en_name' => 'Achham', 'np_name' => 'अछाम', 'en_slug' => 'achham', 'np_slug' => 'अछाम', 'province' => 7],
            ["id" => 72, 'en_name' => 'Doti', 'np_name' => 'डोटी', 'en_slug' => 'doti', 'np_slug' => 'डोटी', 'province' => 7],
            ["id" => 73, 'en_name' => 'Bajhang', 'np_name' => 'बझाङ', 'en_slug' => 'bajhang', 'np_slug' => 'बझाङ', 'province' => 7],
            ["id" => 74, 'en_name' => 'Bajura', 'np_name' => 'बाजुरा', 'en_slug' => 'bajura', 'np_slug' => 'बाजुरा', 'province' => 7],
            ["id" => 75, 'en_name' => 'Kanchanpur', 'np_name' => 'कंचनपुर', 'en_slug' => 'kanchanpur', 'np_slug' => 'कंचनपुर', 'province' => 7],
            ["id" => 76, 'en_name' => 'Dadeldhura', 'np_name' => 'डडेलधुरा', 'en_slug' => 'dadeldhura', 'np_slug' => 'डडेलधुरा', 'province' => 7],
            ["id" => 77, 'en_name' => 'Baitadi', 'np_name' => 'बैतडी', 'en_slug' => 'baitadi', 'np_slug' => 'बैतडी', 'province' => 7],
            ["id" => 78, 'en_name' => 'Darchula', 'np_name' => 'दार्चुला', 'en_slug' => 'darchula', 'np_slug' => 'दार्चुला', 'province' => 7]
        ];


        \DB::table('districts')->insert($tbl_district);
    }
}
