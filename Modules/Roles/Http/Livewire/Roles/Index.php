<?php

namespace Modules\Roles\Http\Livewire\Roles;

use Livewire\Component;
use App\Traits\MasterData;
use Modules\Roles\Entities\Role;
use Modules\Roles\Http\Traits\RoleTrait;

class Index extends Component
{
    use RoleTrait;

    public $name;
    public $permissions = [], $data_permissions;
    public $id_edit, $is_edit;

    public function mount()
    {
        $this->permissions = $this->getAllTitlePermissions();
        $this->data_permissions = $this->getPermissionsGroupByTitle();
        // dd($this->permissions);
    }

    public function manage_permission($id)
    {
        $this->permissions = $this->getAllTitlePermissions();
        $this->permissions = $this->getPermissionById($id);

        $dt = Role::find($id);
        if ($dt->is_paten == 1) {
            $this->emit('pesanGagal', 'Sorry.. forbidden..');
            return false;
        }

        $this->id_edit = $id;
        $this->emit('modalManage', 'show');
    }

    public function store_manage()
    {
        try {
            $this->storeManage($this->id_edit, $this->permissions);

            $this->emit('modalManage', 'hide');
            $this->reset(['id_edit']);
            $this->emit('pesanSukses', 'Success..');
        } catch (\Exception $th) {
            //throw $th;
            $pesan = MasterData::pesan_gagal($th);
            $this->emit('pesanGagal', $pesan);
        }
    }

    public function update_status($id)
    {
        //
        try {
            $dt = Role::find($id);
            if ($dt->is_paten == 1) {
                $this->emit('pesanGagal', 'Sorry.. this role cannot change status..');
            } else {
                updateStatus(new Role, $id);
                $this->emit('pesanSukses', 'Success..');
            }
        } catch (\Exception $th) {
            //throw $th;
            $pesan = MasterData::pesan_gagal($th);
            $this->emit('pesanGagal', $pesan);
        }
    }

    public function tambah_data()
    {
        $this->reset(['name', 'id_edit', 'is_edit']);
        $this->emit('modalAdd', 'show');
    }

    public function edit_data($id)
    {
        $this->id_edit = $id;
        $this->is_edit = 1;

        $dt = Role::find($id);
        $this->name = $dt->name;

        $this->emit('modalAdd', 'show');
    }

    public function store()
    {
        $data = $this->validate([
            'name' => 'required'
        ]);

        try {
            $store = RoleTrait::store($data, $this->id_edit);
            // dd($store);
            if ($store['success']) {
                $this->emit('pesanSukses', $store['message']);
                // dd('bic;)');
                $this->reset(['name', 'id_edit', 'is_edit']);
                $this->emit('modalAdd', 'hide');
            } else {
                $this->emit('pesanGagal', $store['message']);
                // dd('bic');
            }
        } catch (\Exception $th) {
            //throw $th;
            $pesan = MasterData::pesan_gagal($th);
            $this->emit('pesanGagal', $pesan);
        }
    }

    public function destroy($id)
    {
        try {
            Role::find($id)->delete();
            $this->emit('pesanSukses', 'Success..');
        } catch (\Exception $th) {
            //throw $th;
            $pesan = MasterData::pesan_gagal($th);
            $this->emit('pesanGagal', $pesan);
        }
    }

    public function render()
    {
        $data = Role::get();
        $data_permissions = $this->data_permissions;

        return view('roles::livewire.roles.index', [
            'data' => $data,
            'data_permissions' => $data_permissions
        ])
            ->layout('layouts.main', [
                'title' => 'Roles'
            ]);
    }
}
