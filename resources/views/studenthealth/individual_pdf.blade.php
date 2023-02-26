<?php  ini_set("pcre.backtrack_limit", "2000000000"); ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style type="text/css" media="print">

  body {
    font-family: 'nikosh', sans-serif;
  }

  table
  {
    border-collapse: collapse;
    width: 100%;
    margin-top:1px;
    table-layout: fixed;

    border: 1px solid black;
    font-family: 'nikosh', sans-serif;
  }
  th {
    text-align:center;
    padding:1px;
    font-weight: normal;
    font-size: 19px;
    border: 1px solid black;
  }
  td {

    border: 1px solid black;
    padding:5px 2px 5px 2px;

  }
  p
  {
    font-size:17px;

  }
  #maintable {
    font-family: nikosh, sans-serif;
    table-layout: fixed;
    width:100%;
    border: 0px solid black;
  }
  #maintable td {
    text-align:left;
    padding:2px;
    font-size:12px;
    border: 0px solid black;
  }

</style>
<body>
  <?php

  function bn2enNumber ($number){
    $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০",".");
    $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0","-");
    $bn_number = str_replace($search_array, $replace_array, $number);
    
    return $bn_number;
  }

  ?>
  <table id="maintable"  >
    <tr>
      <td width="20%" >  <img style="width:100px;height:100px;" src="/img/gonoprojatontrik.png"></td>
      <td width="60%" style="text-align:center;">
        <h1 style="font-size: 30px;">জেলা প্রশাসকের কার্যালয়, লক্ষ্মীপুর</h1>
        <h4 style="font-size: 25px;">স্কুল হেলথ কার্ড</h4><br>
        <h4 style="font-size: 20px;">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h4>
      </td>
      <td width="20%" style="text-align:right;"> <img style="width:100px;height:100px;" src="/img/mujiblogo.png">
      </td>
    </tr>
    <tr>
      <td width="20%" ></td>
      <td width="60%" style="text-align:center;">
       
        <p style="font-size: 25px;">একক শিক্ষার্থীর ধারাবাহিক স্বাস্থ্য রিপোর্ট</p>
        
      </td> 
      <td width="20%" style="text-align:right;">
        <p>তারিখ : {{bn2enNumber(date('d-m-Y', time() - 6*3600)) }} </p>
      </td>
    </tr>
  </table>
 
     <br><br><br>
       <table id="maintable"  style="padding-top: 30px;" >
    <tr>
      <td width="10%" ><p style="font-size: 20px;">আইডিঃ </p></td>
      <td width="35%">
        <p style="font-size: 20px;">{{bn2enNumber($student->id)}} </p>
      </td> 
      <td width="10%" ><p style="font-size: 20px;">বিদ্যালয়ঃ </p></td>
      <td width="35%">
        <p style="font-size: 20px;">{{$school->name}} </p>
      </td> 

    </tr>

     <tr>
      <td width="15%" ><p style="font-size: 20px;">শ্রেণীঃ </p></td>
      <td width="35%">
        <p style="font-size: 20px;">{{$student->classname}}</p>
      </td> 
      <td width="15%" ><p style="font-size: 20px;">শাখাঃ </p></td>
      <td width="35%">
        <p style="font-size: 20px;">{{$student->section}}</p>
      </td> 
    </tr>
     <tr>
      <td width="15%" ><p style="font-size: 20px;">রোলঃ </p></td>
      <td width="35%">
        <p style="font-size: 20px;">{{bn2enNumber($student->class_roll)}}</p>
      </td> 
      <td width="15%" ><p style="font-size: 20px;">নামঃ </p></td>
      <td width="35%">
        <p style="font-size: 20px;">{{$student->bangla_name}}</p>
      </td> 
    </tr>
    <tr>
      <td width="15%" ><p style="font-size: 20px;">পিতার নামঃ  </p></td>
      <td width="35%">
        <p style="font-size: 20px;">{{$student->father_name}}</p>
      </td> 
      <td width="15%" ><p style="font-size: 20px;">মাতার নামঃ </p></td>
      <td width="35%">
        <p style="font-size: 20px;">{{$student->mother_name}}</p>
      </td> 
    </tr>
     <tr>
      <td width="15%" ><p style="font-size: 20px;">জন্ম নিবন্ধনঃ </p></td>
      <td width="35%">
        <p style="font-size: 20px;">{{bn2enNumber($student->birth_certificate)}}</p>
      </td> 
      <td width="15%" ><p style="font-size: 20px;">মোবাইলঃ  </p></td>
      <td width="35%">
        <p style="font-size: 20px;">{{bn2enNumber($student->mobile)}}</p>
      </td> 
      
    </tr>

    

  </table>
  
         <table>
          <THEAD>
           <tr>
            <th >ক্রমিক নং</th>
            <th>বিবরণ</th>
           @foreach($years as $year)
           <th>{{$year}}</th>
           @endforeach

           </tr>
         </THEAD>
         <TBODY>
                 <?php $i=1; ?>
                                        @foreach($std_prop_array as $std_prop)
                                        <tr>
                                           
                                                <td class="fixed-width-data" style="text-align: center;">{{bn2enNumber($i++)}}</td>
                                                <td class="fixed-width-data">{{$std_prop->name}}</td>
                                           @foreach($years as $year)

                                               <td class="fixed-width-data">{{bn2enNumber($healthByCatYear[$std_prop->sql][$year])}}</td>
                                               @endforeach
                                                
                                            </tr>
                                        @endforeach

         </TBODY>
    </table>
        

</body>
</html>
