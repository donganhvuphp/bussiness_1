@forelse($categories as $category)
    <tr>
        <td class="text-center">{{ indexTable($categories->currentPage(), $categories->perPage(), $loop->index) }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ formatTime($category->created_at) }}</td>
        <td>
            <button class="btn btn-warning" type="button">{{ __('Sửa') }}</button>
            <button class="btn btn-danger" type="button">{{ __('Xóa') }}</button>
        </td>
    </tr>
@empty
    <tr>
        <td class="text-center" colspan="4">{{ __('Không có dữ liệu.') }}</td>
    </tr>
@endforelse
