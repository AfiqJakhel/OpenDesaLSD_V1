@include('theme::partials.empty_state', [
    'title'       => $title ?? 'Artikel',
    'description' => 'Belum ada artikel yang dituliskan dalam kategori ini. Silakan kunjungi kembali dalam waktu dekat.',
    'icon'        => 'fa-newspaper'
])
