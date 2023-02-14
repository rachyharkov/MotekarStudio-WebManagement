<div class="container">

    <form id="form_meta_tags" enctype="multipart/form-data" wire:submit.prevent="saveMetaTagSetting">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Meta Tags</h4>
                <p>Meta tags are snippets of text that describe a page's content. The meta tags don't appear on the page itself, but only in the page's code. Meta tags tell search engines and visitors what your website is about.</p>
                <div class="alert-wrapper-meta"></div>
            </div>
            <div class="card-body">
                {{-- create image_src, description, keywords, author, language --}}
                <table class="table table-bordered">
                    <tr>
                        <td>Image Src <br> @error('seo.image_src') <span class="text-danger">{{ $message }}</span> @enderror</td>
                        <td>:</td>
                        <td>
                            <input type="file" wire:model.defer="seo.image_src" name="image_src" id="meta_image_src" class="form-control" accept=".ico">
                            <img src="{{ is_string($seo['image_src']) ? asset('visitor_asset/images/'.$seo['image_src']) : $seo['image_src']->temporaryUrl() }}" alt="" width="100px" height="100px">
                        </td>
                        </td>
                    </tr>

                    <tr>
                        <td>Title</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.meta_title" name="meta_title" id="meta_title" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>Description</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.meta_description" name="meta_description" id="meta_description" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>Keywords</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.meta_keywords" name="meta_keywords" id="meta_keywords" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>Author</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.meta_author" name="meta_author" id="meta_author" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>Language</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.meta_language" name="meta_language" id="meta_language" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>Revisit After</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.meta_revisit_after" name="meta_revisit_after" id="meta_revisit_after" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>Robots</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.meta_robots" name="meta_robots" id="meta_robots" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>Googlebot</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.meta_googlebot" name="meta_googlebot" id="meta_googlebot" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>Google Site Verification</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.meta_google_site_verification" name="meta_google_site_verification" id="meta_google_site_verification" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>Google Analytics</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.meta_google_analytics" name="meta_google_analytics" id="meta_google_analytics" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>Google Search Console</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.meta_google_search_console" name="meta_google_search_console" id="meta_google_search_console" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>Bing Search Console</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.meta_bing_search_console" name="meta_bing_search_console" id="meta_bing_search_console" class="form-control"></td>
                    </tr>
                </table>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>

    <form id="form_og" enctype="multipart/form-data" wire:submit.prevent="saveOpenGraphSetting">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Open Graph Meta</h4>
                <p>The Open Graph protocol enables any web page to become a rich object in a social graph. For instance, this is used on Facebook to allow any web page to have the same functionality as any other object on Facebook.</p>
                <div class="alert-wrapper-og"></div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Shortcut Icon</td>
                        <td>:</td>
                        <td><input type="file" wire:model.defer="seo.shortcut_icon" name="shortcut_icon" id="shortcut_icon" class="form-control" accept=".png">
                        <img src="{{ is_string($seo['shortcut_icon']) ? asset('visitor_asset/images/'.$seo['shortcut_icon']) : $seo['shortcut_icon']->temporaryUrl() }}" alt="" width="100px" height="100px"></td>
                        </td>
                    </tr>

                    <tr>
                        <td>OG:Image</td>
                        <td>:</td>
                        <td><input type="file" wire:model.defer="seo.og_image" name="og_image" id="og_image" class="form-control" accept=".png">
                        <img src="{{ is_string($seo['og_image']) ? asset('visitor_asset/images/'.$seo['og_image']) : $seo['og_image']->temporaryUrl() }}" alt="" width="100px" height="100px"></td>
                        </td>
                    </tr>

                    <tr>
                        <td>OG:Site Name</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.og_site_name" name="og_site_name" id="og_site_name" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>OG:Title</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.og_title" name="og_title" id="og_title" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>OG:Url</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.og_url" name="og_url" id="og_url" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>OG:Type</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.og_type" name="og_type" id="og_type" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>OG:Description</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.og_description" name="og_description" id="og_description" class="form-control"></td>
                    </tr>

                </table>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>

    <form id="form_item_prop" enctype="multipart/form-data" wire:submit.prevent="saveItemPropSetting">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">ItemProp</h4>
                <p>ItemProp attribute is used to specify the properties of a specific item on the page, such as the title, description, image, or author. This information can be used by search engines to display rich snippets in the search results, which can make the page more attractive and increase its click.</p>
                <div class="alert-wrapper-itemprop"></div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>ItemProp:name</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.itemprop_name" name="itemprop_name" id="itemprop_name" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>ItemProp:url</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.itemprop_url" name="itemprop_url" id="itemprop_url" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>ItemProp:description</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.itemprop_description" name="itemprop_description" id="itemprop_description" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>ItemProp:image and thumbnail</td>
                        <td>:</td>
                        <td><input type="file" wire:model.defer="seo.itemprop_image" name="itemprop_image" id="itemprop_image" class="form-control" accept=".png">
                        <img src="{{ is_string($seo['itemprop_image']) ? asset('visitor_asset/images/'.$seo['itemprop_image']) : $seo['itemprop_image']->temporaryUrl() }}" alt="" width="100px" height="100px"></td>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>

    <form id="form_meta_tags" enctype="multipart/form-data" wire:submit.prevent="saveTwitterCardSetting">
        <div class="card">
            <div class="card-header">
                <h4>Twitter</h4>
                <p>Twitter Cards are a way to attach rich photos, videos and media experience to Tweets that drive traffic to your website. Cards help you richly represent your content on Twitter. You can attach media like photos, videos, galleries and more to Tweets, and we'll preview them in timelines and on profile pages.</p>
                <div class="alert-wrapper-twitter"></div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Twitter:title</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.twitter_title" name="twitter_title" id="twitter_title" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>Twitter:url</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.twitter_url" name="twitter_url" id="twitter_url" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>Twitter:image</td>
                        <td>:</td>
                        <td><input type="file" wire:model.defer="seo.twitter_image" name="twitter_image" id="twitter_image" class="form-control" accept=".png">
                        <img src="{{ is_string($seo['twitter_image']) ? asset('visitor_asset/images/'.$seo['twitter_image']) : $seo['twitter_image']->temporaryUrl() }}" alt="" width="100px" height="100px"></td>
                    </tr>

                    <tr>
                        <td>Twitter:card</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.twitter_card" name="twitter_card" id="twitter_card" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>Twitter:description</td>
                        <td>:</td>
                        <td><input type="text" wire:model.defer="seo.twitter_description" name="twitter_description" id="twitter_description" class="form-control"></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
