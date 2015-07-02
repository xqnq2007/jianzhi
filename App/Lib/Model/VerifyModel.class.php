<?php
class VerifyModel extends Model{
Public function pic(){
    import('ORG.Util.Image');
    Image::buildImageVerify();
 }
}
 
?>