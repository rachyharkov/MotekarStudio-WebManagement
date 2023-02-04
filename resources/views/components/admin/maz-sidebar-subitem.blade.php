@props(['active', 'icon', 'link', 'name'])

@php
$active = null;
$currentUrl = url()->current();
$thisRoute = $link;

if ($currentUrl == $thisRoute) {
    $active = true;
}

$classes = $active
            ? 'submenu-item  active'
            : 'submenu-item';
@endphp

<li class="{{ $classes }}">
    <a href="{{ $link }}" class='submenu-link'>{{ $name }}</a>
</li>
