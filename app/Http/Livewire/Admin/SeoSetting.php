<?php

namespace App\Http\Livewire\Admin;

use App\Models\SeoSetting as ModelsSeoSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class SeoSetting extends Component
{
    use WithFileUploads;

    public $seo;

    protected $listeners = [
        'saveMetaTagSetting',
        'saveOpenGraphSetting',
        'saveItemPropSetting',
        'saveTwitterCardSetting',
    ];

    public function mount()
    {
        $this->seo = ModelsSeoSetting::first()->toArray();
    }

    public function render()
    {
        return view('livewire.admin.seo-setting');
    }

    public function saveMetaTagSetting(Request $request)
    {

        if ($this->seo['image_src'] instanceof \Illuminate\Http\UploadedFile) {

            if (file_exists(public_path('visitor_asset/images/favicon.ico'))) {
                unlink(public_path('visitor_asset/images/favicon.ico'));
            }
            $file = $this->seo['image_src'];
            Storage::disk('mycustompublicvisitorasset')->put('images/favicon.ico', $file->get());
            $this->seo['image_src'] = 'favicon.ico';
        }

        ModelsSeoSetting::first()->update($this->seo);

        $this->emit('metaTagSettingSaved', ['message' => 'Meta Tag Setting Updated Successfully']);
    }

    public function saveOpenGraphSetting(Request $request)
    {
        if ($this->seo['shortcut_icon'] instanceof \Illuminate\Http\UploadedFile) {

            if (file_exists(public_path('visitor_asset/images/og_image.png'))) {
                unlink(public_path('visitor_asset/images/og_image.png'));
            }
            $file = $this->seo['shortcut_icon'];
            Storage::disk('mycustompublicvisitorasset')->put('images/og_image.png', $file->get());
            $this->seo['shortcut_icon'] = 'og_image.png';
        }
        ModelsSeoSetting::first()->update($this->seo);

        $this->emit('openGraphSettingSaved', ['message' => 'Open Graph Setting Updated Successfully']);
    }

    public function saveItemPropSetting(Request $request)
    {
        if ($this->seo['itemprop_image'] instanceof \Illuminate\Http\UploadedFile) {

            if (file_exists(public_path('visitor_asset/images/itemprop_image.png'))) {
                unlink(public_path('visitor_asset/images/itemprop_image.png'));
            }
            $file = $this->seo['itemprop_image'];
            Storage::disk('mycustompublicvisitorasset')->put('images/itemprop_image.png', $file->get());
            $this->seo['itemprop_image'] = 'itemprop_image.png';
        }
        ModelsSeoSetting::first()->update($this->seo);

        $this->emit('itemPropSettingSaved', ['message' => 'Item Prop Setting Updated Successfully']);
    }

    public function saveTwitterCardSetting(Request $request)
    {
        if ($this->seo['twitter_image'] instanceof \Illuminate\Http\UploadedFile) {

            if (file_exists(public_path('visitor_asset/images/twitter_image.png'))) {
                unlink(public_path('visitor_asset/images/twitter_image.png'));
            }
            $file = $this->seo['twitter_image'];
            Storage::disk('mycustompublicvisitorasset')->put('images/twitter_image.png', $file->get());
            $this->seo['twitter_image'] = 'twitter_image.png';
        }

        ModelsSeoSetting::first()->update($this->seo);

        $this->emit('twitterCardSettingSaved', ['message' => 'Twitter Card Setting Updated Successfully']);
    }

}
