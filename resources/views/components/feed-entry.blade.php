<div class="">
    <div class="">
        <h3 class="">{{ $item->get_title() }}</h3>

        <a href="{{ $item->get_link() }}" class="">Link</a>

        <p href="/" class="">{{ $item->get_feed()->get_title() }}</p>

        <p class="">Categ</p>

        <p class="">{{ $item->get_description() }}</p>

        <p class="">{{ $item->get_date() }}</p>

    </div>
</div>