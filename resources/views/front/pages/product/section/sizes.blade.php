@foreach ($product_color_sizes as $key => $product_color_size)
    <button
        class="sizeBtn {{ isset($s) && is_null($s) ? ($s->id == $product_color_size->size_id ? 'active' : '') : ($key == 0 ? 'active' : '') }}"
        type="button" data-id="{{ $product_color_size->size_id }}"
        onclick="set_size_active(this)">{{ $product_color_size->size->name }}</button>
@endforeach
