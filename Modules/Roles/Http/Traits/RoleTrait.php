<?php

namespace Modules\Roles\Http\Traits;

use Modules\Roles\Entities\Role;

trait RoleTrait
{
    public function getAllTitlePermissions()
    {
        $datas = [];
        $data = PermissionTrait::getData();
        foreach ($data as $key => $value) {
            # code...
            $datas[$value['title']] = '';
        }
        return $datas;
    }

    public function getPermissionsGroupByTitle()
    {
        $hasil = [];
        $datas = PermissionTrait::getData();
        $data = $datas->groupBy('type');
        // dd($data);
        foreach ($data as $key => $value) {
            // dd($value);
            $a['type'] = $key;
            $a['lines'] = [];

            foreach ($value as $e => $vl) {
                # code...
                $b['title'] = $vl['title'];
                $b['type'] = $vl['type'];
                array_push($a['lines'], $b);
            }
            array_push($hasil, $a);
        }
        // dd($hasil);
        return $hasil;
    }

    public function storeManage($id, $data)
    {
        // dd($data);
        $hasil = [];

        foreach ($data as $e => $dt) {
            # code...
            if ($dt) {
                $hasil[] = $e;
            }
        }
        // dd($hasil);
        $hasil = json_encode($hasil);

        Role::find($id)->update([
            'permissions' => $hasil
        ]);
    }

    public function getPermissionById($id)
    {
        $permissions = $this->getAllTitlePermissions();
        // dd($permissions);
        $role = Role::find($id);
        $data = $role->permissions;
        $data = json_decode($data);
        // dd($data);
        foreach ($data as $key => $value) {
            # code...
            $permissions[$value] = true;
        }
        // dd($permissions);
        return $permissions;
    }

    public static function store($data, $id = null)
    {
        $name = $data['name'];

        if ($id) {
            $cek = Role::where('name', $name)->where('id', '!=', $id)->exists();

            if ($cek) {
                return [
                    'success' => false,
                    'message' => 'Sorry, dont duplicate'
                ];
            } else {
                // $data['created_by'] = my_ids();
                $data['updated_by'] = my_ids();
                Role::where('id', $id)->update($data);

                return [
                    'success' => true,
                    'message' => 'Update Success..'
                ];
            }
        } else {
            $cek = Role::where('name', $name)->exists();

            if ($cek) {
                return [
                    'success' => false,
                    'message' => 'Sorry, dont duplicate'
                ];
            } else {
                $data['created_by'] = my_ids();
                $data['updated_by'] = my_ids();
                $data['permissions'] = '[]';
                Role::create($data);

                return [
                    'success' => true,
                    'message' => 'Store Success..'
                ];
            }
        }
    }
}
