<?php

namespace Modules\Users\Http\Traits;

use App\Models\User;

trait UserTrait
{
    public static function firstForm()
    {
        $a['name'] = '';
        $a['email'] = '';
        $a['role_id'] = '';

        return $a;
    }

    public static function store_validation($data, $id_edit = null)
    {
        // dd($data);
        if (!$data['name']) {
            // $this->emit('pesanGagal', 'Name Required');
            return [
                'success' => false,
                'message' => 'Name Required'
            ];
        } elseif (!$data['email']) {
            // $this->emit('pesanGagal', 'email Required');
            return [
                'success' => false,
                'message' => 'email Required'
            ];
        } else {

            if ($id_edit) {
                $cek = User::where('email', $data['email'])->where('id', '!=', $id_edit)->exists();

                if ($cek) {
                    return [
                        'success' => false,
                        'message' => 'Maaf email sudah digunakan..'
                    ];
                }
            } else {
                $cek = User::where('email', $data['email'])->exists();

                if ($cek) {
                    return [
                        'success' => false,
                        'message' => 'Maaf email sudah digunakan..'
                    ];
                }
            }

            return [
                'success' => true,
                'message' => 'Success..'
            ];
        }
    }

    public static function store_data($data, $id = null)
    {
        // dd($data);
        if ($id) {
            // $data['password'] = bcrypt($data['password']);

            User::find($id)->update($data);
        } else {
            $data['password'] = bcrypt('123');

            User::create($data);
        }
    }

    public static function destroy($id)
    {
        User::find($id)->delete();
    }

    public static function find_data($id)
    {
        $dt = User::find($id);

        return [
            'name' => $dt->name,
            'email' => $dt->email,
            'role_id' => $dt->role_id
        ];
    }
}
