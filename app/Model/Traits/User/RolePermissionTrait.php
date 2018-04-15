<?php
namespace App\Model\Traits\User;
use App\User;
use App\Model\Role;

/**
 * Trait RolePermissionTrait
 * @package App\Model\Traits
 * @property $role_name
 * @property $role_id
 * @property Role $role
 */
trait RolePermissionTrait{
    private $allcaps;
    static $private_caps=['super_admin','edit_roles'];
    function assignRole($roleId = null,$create=false){
    	$role=null;
		if($roleId instanceof Role){
			$role=$roleId;
		}elseif(is_numeric($roleId)){
			$role=Role::find($roleId);
		}elseif (is_string($roleId)){
			$role=Role::where('name',$roleId)->first();
			if(!$role&&$create){
				$role=Role::create(['name'=>$roleId,'caps'=>'']);
			}
		}
		if($role){
			$this->role_id=$role->id;
			$this->save();
		}

    }
    function role(){
        return $this->belongsTo(Role::class);
    }
	/**
	 * Magic __call method to handle dynamic methods.
	 *
	 * @param  string $method
	 * @param  array  $arguments
	 * @return mixed
	 */
	public function __call($method, $arguments = array())
	{
		// Handle isRoleslug() methods
		if (starts_with($method, 'is') and $method !== 'is') {
			$role = substr($method, 2);
			$role = snake_case($role);
			return $role==$this->role_name;
		}

		return parent::__call($method, $arguments);
	}
	public function isRole($role){
		return $role==$this->role_name;
	}
    protected function getRoleNameAttribute(){
        if($this->role){
            return $this->role->name;
        }
        return '';
    }
}