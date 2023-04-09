@forelse($products as $product)
    <tr>
        <td class="text-center">{{ indexTable($products->currentPage(), $products->perPage(), $loop->index) }}</td>
        <td>{{ $product->name }}</td>
        <td><img src="{{ asset($product->avatar) }}" width="100" height="100" class="object-fit-cover image-table" alt=""></td>
        <td><img src="{{ asset($product->brand->avatar) }}" width="100" height="100" class="object-fit-cover image-table" alt=""></td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->status_description }}</td>
        <td>{{ formatTime($product->created_at) }}</td>
        <td>
            <button class="btn btn-warning edit-product" data-url="{{ route('admin.products.show', $product->id) }}" type="button">{{ __('Sửa') }}</button>
            <button class="btn btn-danger delete-product" data-id="{{ $product->id }}" type="button">{{ __('Xóa') }}</button>
        </td>
    </tr>
@empty
    <tr>
        <td class="text-center" colspan="5">{{ __('Không có dữ liệu.') }}</td>
    </tr>
@endforelse
