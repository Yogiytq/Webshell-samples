<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
 */
if (!defined('IN_DEMOSOSO')) {
    exit('this is wrong page,please back to homepage');
}
if ($act == 'update') {

 
    if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}
 
     
   if($abc1=="") {
       echo 'pls input title'; 
        exit;
}


    $desp = zbdesp_onlyinsert($_POST['despcontent']); //note: desp and addr not use variable abc1.
    $desptext = zbdesp_onlyinsert($_POST['editor1text']);
  
   
   $arrcanexcerpt =  array("title", "despjj","desptext","editor1text","despcontent"); 
          $bscnt22 = '';
      if(count($_POST)>1){
              foreach ($_POST as  $k=>$v) {
                 if(strtolower($k)=='submit') break;
                if(in_array($k,$arrcanexcerpt))   continue;
    
                $bscnt22 .= $k.':##'.htmlentitdm(trim($v)).'==#==';
                 
              }
          }
           $bscnt22 = substr($bscnt22,0,-5);


    $ss = "update " . TABLE_NODE . " set title='$abc1',arr_can='$bscnt22',despjj='$abc2',desptext='$desptext',desp='$desp'  where id='$tid' $andlangbh limit 1";
    // echo $ss;exit;
    iquery($ss);
    //alert("修改成功");
  $jump_insertimg = $jumpv.'&file=edit&act=edit&tid=' . $tid;
    jump($jump_insertimg);
}



if ($act == 'edit') {
    $titleh2 = '修改';
  
    //pre($rowsub);
  
    $title = $rowsub['title'];     
     $pidnamehere = $rowsub['pidname'];
       
     $linkdhtitle = $linkdhurl = $titlebz1=$titlebz2=$titlebz3='';//if add,need give null value for update.
     
     $arr_can = $rowsub['arr_can'];
     //echo $arr_can;
     $bscntarr = explode('==#==',$arr_can); 
     if(count($bscntarr)>1){
       foreach ($bscntarr as   $bsvalue) {
        if(strpos($bsvalue, ':##')){
          $bsvaluearr = explode(':##',$bsvalue);
          $bsccc = $bsvaluearr[0];
          $$bsccc=$bsvaluearr[1];
        }
      }
     }

     $kv = $rowsub['kv'];
     $despjj = $rowsub['despjj'];
    $desp = zbdesp_imgpath($rowsub['desp']);
    $desptext = zbdesp_imgpath($rowsub['desptext']);
    


    

    $jump_insertimg = $jumpv . '&file=edit&act=update&tid=' . $tid;
   
 

?>

<div class="layoutsidebar fl col-xs-12 col-sm-12  col-md-2">
<?php 
 require_once('plugin_effectnode_edit_sidebar.php');
?>
</div><!--end sidebar-->
<div class="fl col-xs-12 col-sm-12  col-md-10">
 

<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jump_insertimg; ?>" method="post" enctype="multipart/form-data">
    <table class="formtab">
      

        <tr>
            <td width="12%" class="tr">标题：</td>
            <td width="88%"> 
                <input name="title" type="text"   value="<?php echo $title; ?>" class="form-control" /><?php echo $xz_must; ?> 


            </td>
        </tr>
     
        <tr>
            <td width="12%" class="tr">副标题：</td>
            <td width="88%"> 
                <textarea class="form-control" rows="3" name="despjj"><?php echo $despjj; ?></textarea> <?php echo $xz_maybe; ?>
                           
            </td>
        </tr>
       
       
      
     <tr style="background: #DCE8F4">
            <td width="12%" class="tr">链接：</td>
            <td width="88%">
            链接字样：       
    <input name="linkdhtitle" type="text" value="<?php echo $linkdhtitle?>"  size="30" />
<?php echo $xz_maybe;?> 
<div class="c5"></div>

     链接网址：       
    <input name="linkdhurl" type="text" value="<?php echo $linkdhurl?>"  class="form-control" />
<?php echo $xz_maybe;?> 

 
            </td>
        </tr>
  
      <tr>
            <td width="12%" class="tr">备注：</td>
            <td width="88%"> 
                备注1：<input name="titlebz1" type="text"   value="<?php echo $titlebz1; ?>" size="30"  /><?php echo $xz_maybe; ?> 
                   <div class="c5"> </div>
                 备注2：<input name="titlebz2" type="text"   value="<?php echo $titlebz2; ?>" size="30"  /><?php echo $xz_maybe; ?> 
                     <div class="c5"> </div>
                 备注2：<input name="titlebz3" type="text"   value="<?php echo $titlebz3; ?>" size="30"  /><?php echo $xz_maybe; ?> 
            </td>
        </tr>
 

        <tr>
            <td width="12%" class="tr">kv图片：</td>
            <td width="88%"> 
              <?php 
                echo  p2030_imgyt($kv,'y','n');
                ?>
                <p><a class="needpopup but4 pad8lr" style="width:auto"  href="../mod_module/mod_uploadkv.php?lang=<?php echo LANG?>&pidname=<?php echo $pidnamehere?>&type=nodekv">修改kv图</a></p>
               
   </td>
 </tr>

  <tr>
    <td class="tr">内容： </td>
  <td>  
    <p>     
  <!--
    <a href="../mod_imgfj/mod_imgfj.php?pid=<?php //echo $pidnamehere;?>&lang=<?php //echo LANG;?>" target="_blank">私有编辑器附件管理(<?php //echo num_imgfj($pidnamehere);?>)</a>
|
-->
 <?php echo $text_imgfjlink_bjq;?>
   </p>

<?php require_once('../plugin/editor_textarea.php'); //textarea is in this file ?>

            </td> 
        </tr>


  <tr>
            <td></td>
            <td>
                <input  class="mysubmit mysubmitbig" type="submit" name="Submit" value="<?php echo $titleh2; ?>"></td>
        </tr>
    </table>

     <?php echo $inputmust;?>

</form>


</div><!--end right-->


<div class="c"> </div>





<?php } ?>


<script>
    function checkhere(thisForm) {
        if (thisForm.title.value == "")
        {
            alert("请输入标题。");
            thisForm.title.focus();
            return (false);
        }

    
    
        // return;

    }


</script>
