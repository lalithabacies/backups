<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'User Roles';
$this->params['breadcrumbs'][] = $this->title;

$error = false;
$roleArray = array();
if(count($roles)>0){
    foreach($roles as $key=>$values){
        $roleArray[$values['id']] = $values['rolename'];    
    }
}
?>
<div class="user-profile-index">

<h1><?= Html::encode($this->title) ?></h1>

<section>

    <table>
    <thead>
    <tr>
    <th>Name</th>
    <th>Status</th>
    </tr>
    </thead>
    <tbody id="demoajax" cellspacing="0">    
    <?php if(count($userroles)>0){
        $userRoleid = 0;
        $uroleid = 0;
        foreach($userroles as $keys=>$values){
            $userRoleid = $values['userroleid'];
            $uroleid = $values['roleid'];
    ?>
    <tr>    
    <td><?php echo $values['username']; ?></td>    
    <td>    
    <select class='rolechange' data-userid="<?php echo $values['id']; ?>"
    data-userroleid="<?php echo $userRoleid;?>" onchange="setuserrole(this);">
    <option value=''>--Select--</option>   
    <?php if(count($roleArray)>0){
    foreach($roleArray as $id=>$value){
        $selected = ($uroleid==$id) ? "selected='selected'" : '';      
        $str = "<option value='".$id."' ".$selected.">".$value."</option>" ;
        echo $str;                
    }}
    ?>
    </select>
    </td>
    </tr>    
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <?php }
    unset($roleArray); 
    } ?>
    </tbody>	
    </table>

</section>    

    
</div>
