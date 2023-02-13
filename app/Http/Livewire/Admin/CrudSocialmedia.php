<?php

namespace App\Http\Livewire\Admin;

use App\Models\SocialMedia;
use Livewire\Component;

class CrudSocialmedia extends Component
{
    public $operation, $titlenya;
    public $id_social_media, $social_media_name, $social_media_icon, $social_media_url, $social_media_type, $social_media_color_primary, $social_media_color_secondary, $social_media_clicks, $social_media_status, $created_at, $updated_at, $action, $method;
    public $socialmedias;

    protected $listeners = [
        'refresh',
        'editMode',
    ];

    public function render()
    {
        $this->socialmedias = SocialMedia::all();
        return view('livewire.admin.crud-socialmedia');
    }

    public function refresh()
    {
        $this->socialmedias = SocialMedia::all();
        $this->dispatchBrowserEvent('refreshAllScripts');
    }

    function editMode($id_social_media) {
        $findData = SocialMedia::find($id_social_media);
        $this->dispatchBrowserEvent('editMode',[
            'data' => [
                'social_media_id' => $findData->id,
                'social_media_name' => $findData->social_media_name,
                'social_media_icon' => $findData->social_media_icon,
                'social_media_url' => $findData->social_media_url,
                'social_media_type' => $findData->social_media_type,
                'social_media_color_primary' => $findData->social_media_color_primary,
                'social_media_color_secondary' => $findData->social_media_color_secondary,
                'social_media_clicks' => $findData->social_media_clicks,
                'social_media_status' => $findData->social_media_status,
                'created_at' => $findData->created_at,
                'updated_at' => $findData->updated_at,
                'action' => route('admin.social_media.update'),
                'method' => 'POST',
            ]
        ]);
    }

    public function cleanForm()
    {
        $this->id_social_media = null;
        $this->social_media_name = null;
        $this->social_media_icon = null;
        $this->social_media_url = null;
        $this->social_media_type = null;
        $this->social_media_color_primary = null;
        $this->social_media_color_secondary = null;
        $this->social_media_clicks = null;
        $this->social_media_status = null;
        $this->created_at = null;
        $this->updated_at = null;
    }
}
