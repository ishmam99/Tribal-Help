<?php
namespace App\Classes;
use App\Classes\FormProp;
class PropClass
{
   
     public function getStudentsInfo(){
      $std_prop_array = array();
      // 0=>input: text, 1=> number,  2=> date,3=> password,4=>textarea, 5=>select-option, 6=> file
     // $std_prop_array[] = new FormProp("id","আইডি",true,0);
      
      $std_prop_array[] = new FormProp("upazila_name","উপজেলা",true,5);
      $std_prop_array[] = new FormProp("school_id","প্রতিষ্ঠান",true,5);
      $std_prop_array[] = new FormProp("session","সেশন",true,5);
      $std_prop_array[] = new FormProp("classname","শ্রেণী",true,5);
      $std_prop_array[] = new FormProp("section","শাখা",true,5);
      $std_prop_array[] = new FormProp("class_roll","শ্রেণী রোল",true,0);
      $std_prop_array[] = new FormProp("addmission_date","ভর্তি তারিখ",false,2);
      $std_prop_array[] = new FormProp("group_name","গ্রুপের নাম",false,0);
      $std_prop_array[] = new FormProp("bangla_name","শিক্ষার্থীর নাম (বাংলা)",true,0);
      $std_prop_array[] = new FormProp("english_name","শিক্ষার্থীর নাম (ইংরেজি)",false,0);
      $std_prop_array[] = new FormProp("father_name","পিতার নাম",true,0);
      $std_prop_array[] = new FormProp("mother_name","মাতার নাম",false,0);
      $std_prop_array[] = new FormProp("mobile","মোবাইল",true,0);
      $std_prop_array[] = new FormProp("permanent_address","স্থায়ী ঠিকানা",true,4);
      $std_prop_array[] = new FormProp("present_address","বর্তমান ঠিকানা",false,4);
      $std_prop_array[] = new FormProp("birth_certificate","জন্ম তারিখ",false,2);
      $std_prop_array[] = new FormProp("religion","ধর্ম",false,5);
      $std_prop_array[] = new FormProp("gender","লিঙ্গ",true,5);
      $std_prop_array[] = new FormProp("nationality","জাতীয়তা",false,5);
      $std_prop_array[] = new FormProp("bloodgroup","রক্তের গ্রুপ",false,5);
      $std_prop_array[] = new FormProp("hobby","শখ",false,0);
      $std_prop_array[] = new FormProp("marital_status","বৈবাহিক অবস্থা",false,5);
      $std_prop_array[] = new FormProp("student_attachment","প্রয়োজনীয় কাগজপত্র সংযুক্ত করুন",false,6);
	  $std_prop_array[] = new FormProp("status","স্ট্যাটাস",true,5);
      return $std_prop_array;
  }

       public function getUsersInfo(){
      $user_prop_array = array();
      // 0=>input: text, 1=> number,  2=> date,3=> password,4=>textarea, 5=>select-option 
  
 
      //$user_prop_array[] = new FormProp("id","আইডি",true,0); 
      $user_prop_array[] = new FormProp("upazila_name","উপজেলা",true,5);
      $user_prop_array[] = new FormProp("name","প্রতিষ্ঠানের নাম",true,0);
      $user_prop_array[] = new FormProp("position","ব্যবহারকারির পদ",false,0);
      $user_prop_array[] = new FormProp("username","ইউজারনেম (in english)",true,0);
      $user_prop_array[] = new FormProp("password","পাসওয়ার্ড (in english)",true,0);
      $user_prop_array[] = new FormProp("usertype","ইউজার টাইপ",true,5);
      $user_prop_array[] = new FormProp("email","ইমেইল",false,0);
      $user_prop_array[] = new FormProp("mobile","মোবাইল",true,0);
      $user_prop_array[] = new FormProp("address","ঠিকানা",true,4);
      $user_prop_array[] = new FormProp("profile_image","ছবি",false,6);
      $user_prop_array[] = new FormProp("signature","স্বাক্ষর",false,6);
      $user_prop_array[] = new FormProp("status","স্ট্যাটাস",true,5);
      return $user_prop_array;
  }

         public function getStudentHealth(){
      $stdhealth_prop_array = array();
      // 0=>input: text, 1=> number,  2=> date,3=> password,4=>textarea, 5=>select-option 
  
 
      //$user_prop_array[] = new FormProp("id","আইডি",true,0); 
     // $stdhealth_prop_array[] = new FormProp("year","ক্যালেন্ডার বর্ষ",true,5);
     // $stdhealth_prop_array[] = new FormProp("auto_id","শিক্ষার্থীর আইডি",true,0);
      $stdhealth_prop_array[] = new FormProp("age","বয়স",true,0);
     // $stdhealth_prop_array[] = new FormProp("class","শ্রেনী",true,0);
      $stdhealth_prop_array[] = new FormProp("height","উচ্চতা(সে.মি.)",true,0);
      $stdhealth_prop_array[] = new FormProp("weight","ওজন(কে.জি.)",true,0);
      $stdhealth_prop_array[] = new FormProp("neat_clean","পরিষ্কার পরিচ্ছন্নতা",true,5);
      $stdhealth_prop_array[] = new FormProp("muac","পুষ্টিগত অবস্থান (MUAC)",true,0);
      $stdhealth_prop_array[] = new FormProp("skin_disease","চর্মরোগ",true,5);
      $stdhealth_prop_array[] = new FormProp("cough","কাশি",true,5);
      $stdhealth_prop_array[] = new FormProp("asthma","শ্বাস কষ্ট",true,5);
      $stdhealth_prop_array[] = new FormProp("diarrhoea","ডায়রিয়া",true,5);
      $stdhealth_prop_array[] = new FormProp("jaundice","জণ্ডিস",true,5);
      $stdhealth_prop_array[] = new FormProp("infection","ইনফেকশন (নাক/কান/গলা)",true,5);
      $stdhealth_prop_array[] = new FormProp("epi_tt","EPI ও TT",true,5);
      $stdhealth_prop_array[] = new FormProp("eye_test","দৃষ্টি পরীক্ষা",true,5);
      $stdhealth_prop_array[] = new FormProp("anemia","রক্তশুণ্যতা",true,5);
      $stdhealth_prop_array[] = new FormProp("pulse","পালস ও হার্ট (বিট/ মিনিট)",true,0);
      $stdhealth_prop_array[] = new FormProp("overall","সামগ্রিক",true,0);
      
      return $stdhealth_prop_array;
  }

  public function getInputType(){
      //input type array
      $input_type_array = array("text","number","date","password" ); 
      return $input_type_array;
  }
}
