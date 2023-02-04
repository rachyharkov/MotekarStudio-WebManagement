<x-admin.maz-sidebar :href="route('admin.dashboard')" :logo="asset('images/logo/logo.png')">

    <!-- Add Sidebar Menu Items Here -->

    <x-admin.maz-sidebar-item name="Dashboard" :link="route('admin.dashboard')" icon="bi bi-grid-fill"></x-admin.maz-sidebar-item>

    <x-admin.maz-sidebar-item name="Inbox" :link="route('admin.inbox.index')" icon="bi bi-envelope-fill"></x-admin.maz-sidebar-item>

    <x-admin.maz-sidebar-item name="Post" :link="'#'" icon="bi bi-journal-text">
        <x-admin.maz-sidebar-subitem name="New Post" :link="route('admin.post.create')" icon="bi bi-person"></x-admin.maz-sidebar-subitem>
        <x-admin.maz-sidebar-subitem name="Posts" :link="route('admin.post.index')" icon="bi bi-person"></x-admin.maz-sidebar-subitem>
    </x-admin.maz-sidebar-item>

    <x-admin.maz-sidebar-item name="Portofolio" :link="'#'" icon="bi bi-journal-album">
        <x-admin.maz-sidebar-subitem name="Post a Portofolio" :link="'#'" icon="bi bi-person"></x-admin.maz-sidebar-subitem>
        <x-admin.maz-sidebar-subitem name="Portofolio List" :link="'#'" icon="bi bi-person"></x-admin.maz-sidebar-subitem>
    </x-admin.maz-sidebar-item>

    <x-admin.maz-sidebar-item name="Services" :link="'#'" icon="bi bi-briefcase-fill">
        <x-admin.maz-sidebar-subitem name="Add a Service" :link="'#'" icon="bi bi-person"></x-admin.maz-sidebar-subitem>
        <x-admin.maz-sidebar-subitem name="Services Posted" :link="'#'" icon="bi bi-person"></x-admin.maz-sidebar-subitem>
    </x-admin.maz-sidebar-item>

    <x-admin.maz-sidebar-item name="Page Content" :link="'#'" icon="bi bi-journal-text">
        <x-admin.maz-sidebar-subitem name="Social Media" :link="'#'" icon="bi bi-person"></x-admin.maz-sidebar-subitem>
        <x-admin.maz-sidebar-subitem name="Testimonial" :link="'#'" icon="bi bi-person"></x-admin.maz-sidebar-subitem>
        <x-admin.maz-sidebar-subitem name="Comparison" :link="'#'" icon="bi bi-person"></x-admin.maz-sidebar-subitem>
        <x-admin.maz-sidebar-subitem name="FAQ" :link="'#'" icon="bi bi-person"></x-admin.maz-sidebar-subitem>
    </x-admin.maz-sidebar-item>

    <x-admin.maz-sidebar-item name="Web Setting" :link="'#'" icon="bi bi-journal-text">
        <x-admin.maz-sidebar-subitem name="SEO" :link="'#'" icon="bi bi-person"></x-admin.maz-sidebar-subitem>
        <x-admin.maz-sidebar-subitem name="Contact" :link="'#'" icon="bi bi-person"></x-admin.maz-sidebar-subitem>
        <x-admin.maz-sidebar-subitem name="Banner" :link="'#'" icon="bi bi-person"></x-admin.maz-sidebar-subitem>
    </x-admin.maz-sidebar-item>


</x-admin.maz-sidebar>
