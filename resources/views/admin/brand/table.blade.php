@forelse($brands as $brand)
    <tr>
        <td class="text-center">{{ indexTable($brands->currentPage(), $brands->perPage(), $loop->index) }}</td>
        <td>{{ $brand->name }}</td>
        <td>{{ formatTime($brand->created_at) }}</td>
        <td>
            <button class="btn btn-warning edit-brand" data-url="{{ route('admin.brands.show', $brand->id) }}" type="button">{{ __('Sửa') }}</button>
            <button class="btn btn-danger delete-brand" data-id="{{ $brand->id }}" type="button">{{ __('Xóa') }}</button>
        </td>
    </tr>
@empty
    <tr>
        <td class="text-center" colspan="4">{{ __('Không có dữ liệu.') }}</td>
    </tr>
@endforelse
