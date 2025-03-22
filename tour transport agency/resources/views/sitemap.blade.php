@php
header('Content-Type: application/xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';
@endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <!-- Homepage -->
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <priority>1.0</priority>
    </url>

    <!-- Static Pages -->
    <url>
        <loc>{{ url('/transport') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <priority>0.9</priority>
    </url>

    <url>
        <loc>{{ url('/contact') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <priority>0.8</priority>
    </url>

    <!-- Excursions -->
    <url>
        <loc>{{ url('/excursions') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <priority>0.9</priority>
    </url>

    @foreach($excursions as $excursion)
        <url>
            <loc>{{ url('/excursions/' . Str::slug($excursion['name'])) }}</loc>
            <lastmod>{{ now()->toAtomString() }}</lastmod>
            <priority>0.7</priority>
        </url>
    @endforeach

    <!-- Circuits -->
    <url>
        <loc>{{ url('/circuits') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <priority>0.9</priority>
    </url>

    @foreach($circuits as $circuit)
        <url>
            <loc>{{ url('/circuits/' . Str::slug($circuit['name'])) }}</loc>
            <lastmod>{{ now()->toAtomString() }}</lastmod>
            <priority>0.7</priority>
        </url>
    @endforeach

</urlset>
