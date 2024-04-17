<?php
  $val=$_GET['selectvalue'];
  $chn=array('marina beach','elliot beach','Aadiyogi','thousand hills','mylapore');
  $up=array('React','JQuery','Angular','Vue','Backbone');
  $man=array('himachal tour','manali tour','shimla kurfri','dharmshala','shimla manali');
  $mum=array('Alibag','city tour','night tour','slum tour','zipline');

  $nag=array('dhamma chakra','ambazari lake','amba khori','waki woods','maharaj bagh temple');
  $beng=array('lalbagh','church street','cubbon park','iskcon temple','nandi hills');

  switch($val){
     case 'chennai':
        foreach($chn as $chn1){
            echo "<option >$chn1</option>";
        }
        break;
     
    case 'manali':
            foreach($man as $man1){
                echo "<option >$man1</option>";
            }
            break;

    case 'up':
                foreach($up as $up1){
                    echo "<option >$pyval</option>";
                }
        break;

    case 'mumbai':
            foreach($mum as $mum1){
                echo "<option>$mum1</option>";
            }
    break;
    case 'bengaluru':
        foreach($beng as $beng1){
            echo "<option>$beng1</option>";
        }
        break;
    default:
    echo "No Data has been Selected";
  }
 ?>