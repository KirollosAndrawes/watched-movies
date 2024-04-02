<?php


    if(isset($_POST["ID"]) && isset($_POST["img"]) && (isset($_POST["movie-title"]) || isset($_POST["movie-title-ar"]))) {
        
        if(file_exists("../JSON/playlist.json")) {

            $file = fopen("../JSON/playlist.json", "a");
           
            $stat = fstat($file);
            ftruncate($file, $stat['size']-4);

            fwrite($file, "},\n\t{\n"); // start of json

            fwrite($file, "\t\t" . '"id": ' . (int)$_POST["ID"] . ",\n");
            fwrite($file, "\t\t" . '"movieURL": "' . '"' . ",\n");
            fwrite($file, "\t\t" . '"movieImgURL": "' . $_POST["img"] . '"' . ",\n");
            fwrite($file, "\t\t" . '"movieTitleInEnglish": "' . $_POST["movie-title"] . '"' . ",\n");
            fwrite($file, "\t\t" . '"movieTitleInArabic": "' . $_POST["movie-title-ar"] . '"' . ",\n");
            fwrite($file, "\t\t" . '"IMDB_Rating": "' . $_POST["rating"] . '"' . ",\n");
            fwrite($file, "\t\t" . '"ratingContent": "' . $_POST["rating-content"] . '"' . ",\n");
            fwrite($file, "\t\t" . '"movieShowTime": "' . $_POST["year"] . '"' . ",\n");
            fwrite($file, "\t\t" . '"directors": ' . json_encode(explode(", ",$_POST["directors"])) . ",\n");
            fwrite($file, "\t\t" . '"writters": ' . json_encode(explode(", ",$_POST["writters"])) . ",\n");

            fwrite($file, "\t\t" . '"movieCast": ' . "[\n"); // start of casting
            
            fwrite($file, "\t\t\t" . "{\n");

            fwrite($file, "\t\t\t\t" . '"name": "' . $_POST["movieCast-name1"] . '"' . ",\n");
            fwrite($file, "\t\t\t\t" . '"characterName": "' . $_POST["movieCast-char1"] . '"' . ",\n");
            fwrite($file, "\t\t\t\t" . '"img": "' . $_POST["movieCast-img1"] . '"' . "\n");

            fwrite($file, "\t\t\t" . "},\n");
            fwrite($file, "\t\t\t" . "{\n");

            fwrite($file, "\t\t\t\t" . '"name": "' . $_POST["movieCast-name2"] . '"' . ",\n");
            fwrite($file, "\t\t\t\t" . '"characterName": "' . $_POST["movieCast-char2"] . '"' . ",\n");
            fwrite($file, "\t\t\t\t" . '"img": "' . $_POST["movieCast-img2"] . '"' . "\n");

            fwrite($file, "\t\t\t" . "},\n");
            fwrite($file, "\t\t\t" . "{\n");
            
            fwrite($file, "\t\t\t\t" . '"name": "' . $_POST["movieCast-name3"] . '"' . ",\n");
            fwrite($file, "\t\t\t\t" . '"characterName": "' . $_POST["movieCast-char3"] . '"' . ",\n");
            fwrite($file, "\t\t\t\t" . '"img": "' . $_POST["movieCast-img3"] . '"' . "\n");

            fwrite($file, "\t\t\t" . "},\n");
            fwrite($file, "\t\t\t" . "{\n");

            fwrite($file, "\t\t\t\t" . '"name": "' . $_POST["movieCast-name4"] . '"' . ",\n");
            fwrite($file, "\t\t\t\t" . '"characterName": "' . $_POST["movieCast-char4"] . '"' . ",\n");
            fwrite($file, "\t\t\t\t" . '"img": "' . $_POST["movieCast-img4"] . '"' . "\n");

            fwrite($file, "\t\t\t" . "}\n");
            
            fwrite($file, "\t\t" . "],\n"); // end of casting
            
            fwrite($file, "\t\t" . '"genres": ' . json_encode(explode(", ",$_POST["genres"])) . ",\n");
            fwrite($file, "\t\t" . '"storyAboutInEnglish": "' . $_POST["about"] . '"' . ",\n");
            fwrite($file, "\t\t" . '"storyAboutInArabic": "' . $_POST["about-ar"] . '"' . ",\n");
            fwrite($file, "\t\t" . '"movieLanguage": "' . $_POST["language"] . '"' . ",\n");
            fwrite($file, "\t\t" . '"movieCountry": ' . json_encode(explode(", ",$_POST["country"])) . ",\n");
            fwrite($file, "\t\t" . '"personalInfo": ' . "{\n"); // start of prsonal information

            fwrite($file, "\t\t\t" . '"watched": false' . ",\n");
            fwrite($file, "\t\t\t" . '"dateOfWatched": "00/00/0000"' . ",\n");
            fwrite($file, "\t\t\t" . '"myRating": "0.0"' . ",\n");
            fwrite($file, "\t\t\t" . '"notes": ""' . "\n");

            fwrite($file, "\t\t" . "}\n"); // end of prsonal information

            fwrite($file, "\t" . "}\n]"); // end of json

            fclose($file);
        }

    }