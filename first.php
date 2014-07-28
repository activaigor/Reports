<?php
<<<<<<< HEAD
if (preg_match ("/^([^\@]+)\@([^\@]+)$/", "i.rizhiy@lanet.ua", $parts)){
	print_r($parts);
}
=======
  $csv_lines  = file("./includes/csv/new_05.2013_2.csv");
  if(is_array($csv_lines))
  {
    $cnt = count($csv_lines);
    for($i = 0; $i < $cnt; $i++)
    {
      $line = $csv_lines[$i];
      $line = trim($line);
      $first_char = true;
      $col_num = 0;
      $length = strlen($line);
      for($b = 0; $b < $length; $b++)
      {
        if($skip_char != true)
        {
          $process = true;
          if($first_char == true)
          {
            if($line[$b] == '"')
            {
              $terminator = '";';
              $process = false;
            }
            else
              $terminator = ';';
            $first_char = false;
          }

          if($line[$b] == '"')
          {
            $next_char = $line[$b + 1];
            if($next_char == '"')
              $skip_char = true;
            elseif($next_char == ';')
            {
              if($terminator == '";')
              {
                $first_char = true;
                $process = false;
                $skip_char = true;
              }
            }
          }

          if($process == true)
          {
            if($line[$b] == ';')
            {
               if($terminator == ';')
               {

                  $first_char = true;
                  $process = false;
               }
            }
          }

          if($process == true)
            $column .= $line[$b];

          if($b == ($length - 1))
          {
            $first_char = true;
          }

          if($first_char == true)
          {

            $values[$i][$col_num] = $column;
            $column = '';
            $col_num++;
          }
        }
        else
          $skip_char = false;
      }
    }
  }
   #var_dump($values);


>>>>>>> 3aca116d1fe9118a8e2021133640a317630b9b8a
?>
