<?php
       $typee = $s['type'];
       $levele = $s['level'];
  
       if($typee === "HTML/CSS") {
          $colortt = "#1abc9c";
       } elseif ($typee === "Javascript") {
          $colortt = "#f39c12";
       } elseif ($typee === "PHP") {
           $colortt = "#130f40";
       } elseif ($typee === "Java") {
          $colortt = "#f9ca24";
       } elseif ($typee === "C") {
          $colortt = "#9b59b6";
       }
         elseif ($typee === "C++") {
          $colortt = "#3498db";
       } elseif ($typee === "Swift") {
           $colortt = "#e67e22";
       } elseif ($typee === "Python") {
           $colortt = "#34495e";
       } elseif ($typee === "Arduino") {
           $colortt = "#1abc9c";
       } elseif ($typee === "Raspberry PI") {
           $colortt = "#c0392b";
       }
  
       if($levele === "Facile") {
          $color = "#2ecc71";
      } elseif ($levele === "Moyens") {
         $color = "#e67e22";
      } elseif ($levele === "Difficile") {
          $color = "#d63031";
      }

?>