<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\User;

class UserRole extends ActiveRecord
{
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return 'userrole';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'roleid' => 'RoleId',
            'userid' => 'UserId',           
        ];
    }
    
    /* User Define Function
    * To fetch all Users with their Role. (1:1)
    * Returns username with their role, if No records in userrole will add Null
    * @Created:30/6/2017
    */
    public function getUserRoles()
    {
        $column = 'tshirt_users.id,tshirt_users.username,userrole.id as userroleid,userrole.roleid';
        $userRole = User::find()->select($column)->leftJoin('userrole', 'tshirt_users.id = userrole.userid')
        ->limit(10)->offset(1)->orderBy(['(tshirt_users.id)' => SORT_DESC])->asArray()->all();
        return $userRole;
    }

}