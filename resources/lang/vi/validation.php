<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute phải được chấp nhận.',
    'accepted_if'          => ':attribute phải được chấp nhận khi :other là :value.',
    'active_url'           => ':attribute không phải là một URL hợp lệ.',
    'after'                => ':attribute phải là một ngày sau ngày :date.',
    'after_or_equal'       => ':attribute phải là thời gian bắt đầu sau hoặc đúng bằng :date.',
    'alpha'                => ':attribute chỉ có thể chứa các chữ cái.',
    'alpha_dash'           => ':attribute chỉ có thể chứa chữ cái, số và dấu gạch ngang.',
    'alpha_num'            => ':attribute chỉ có thể chứa chữ cái và số.',
    'array'                => ':attribute phải là dạng mảng.',
    'attached'             => ':attribute đã được đính kèm.',
    'before'               => ':attribute phải là một ngày trước ngày hôm nay.',
    'before_or_equal'      => ':attribute phải là thời gian bắt đầu trước hoặc đúng bằng :date.',
    'between'              => [
        'array'   => ':attribute phải có từ :min - :max phần tử.',
        'file'    => 'Dung lượng tập tin trong trường :attribute phải từ :min - :max KB.',
        'numeric' => ':attribute phải nằm trong khoảng :min - :max.',
        'string'  => ':attribute phải từ :min - :max kí tự.',
    ],
    'boolean'              => ':attribute phải là true hoặc false.',
    'confirmed'            => 'Giá trị xác nhận trong trường :attribute không khớp.',
    'current_password'     => 'Mật khẩu không đúng.',
    'date'                 => ':attribute không phải là định dạng của ngày-tháng.',
    'date_equals'          => ':attribute phải là một ngày bằng với :date.',
    'date_format'          => ':attribute không giống với định dạng :format.',
    'different'            => ':attribute và :other phải khác nhau.',
    'digits'               => 'Độ dài của trường :attribute phải gồm :digits chữ số.',
    'digits_between'       => 'Độ dài của trường :attribute phải nằm trong khoảng :min and :max chữ số.',
    'dimensions'           => ':attribute có kích thước không hợp lệ.',
    'distinct'             => ':attribute có giá trị trùng lặp.',
    'email'                => ':attribute phải là một địa chỉ email hợp lệ.',
    'ends_with'            => ':attribute phải kết thúc bằng một trong những giá trị sau: :values',
    'exists'               => 'Giá trị đã chọn trong trường :attribute không hợp lệ.',
    'file'                 => ':attribute phải là một tệp tin.',
    'filled'               => ':attribute không được bỏ trống.',
    'gt'                   => [
        'array'   => ':attribute phải có nhiều hơn :value phần tử.',
        'file'    => 'Dung lượng trường :attribute phải lớn hơn :value kilobytes.',
        'numeric' => 'Giá trị trường :attribute phải lớn hơn :value.',
        'string'  => 'Độ dài trường :attribute phải nhiều hơn :value kí tự.',
    ],
    'gte'                  => [
        'array'   => ':attribute phải có ít nhất :value phần tử.',
        'file'    => 'Dung lượng trường :attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'numeric' => 'Giá trị trường :attribute phải lớn hơn hoặc bằng :value.',
        'string'  => 'Độ dài trường :attribute phải lớn hơn hoặc bằng :value kí tự.',
    ],
    'image'                => ':attribute phải là định dạng hình ảnh.',
    'in'                   => 'Giá trị đã chọn trong trường :attribute không hợp lệ.',
    'in_array'             => ':attribute phải thuộc tập cho phép: :other.',
    'integer'              => ':attribute phải là một số nguyên.',
    'ip'                   => ':attribute phải là một địa chỉ IP.',
    'ipv4'                 => ':attribute phải là một địa chỉ IPv4.',
    'ipv6'                 => ':attribute phải là một địa chỉ IPv6.',
    'json'                 => ':attribute phải là một chuỗi JSON.',
    'lt'                   => [
        'array'   => ':attribute phải có ít hơn :value phần tử.',
        'file'    => 'Dung lượng trường :attribute phải nhỏ hơn :value kilobytes.',
        'numeric' => 'Giá trị trường :attribute phải nhỏ hơn :value.',
        'string'  => 'Độ dài trường :attribute phải nhỏ hơn :value kí tự.',
    ],
    'lte'                  => [
        'array'   => ':attribute không được có nhiều hơn :value phần tử.',
        'file'    => 'Dung lượng trường :attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'numeric' => 'Giá trị trường :attribute phải nhỏ hơn hoặc bằng :value.',
        'string'  => 'Độ dài trường :attribute phải nhỏ hơn hoặc bằng :value kí tự.',
    ],
    'max'                  => [
        'array'   => ':attribute không được lớn hơn :max phần tử.',
        'file'    => 'Dung lượng tập tin trong trường :attribute không được lớn hơn :max KB.',
        'numeric' => ':attribute không được lớn hơn :max.',
        'string'  => ':attribute không được vượt quá :max kí tự.',
        'number_files' => 'Số :attribute tải lên đã đạt đến giới hạn, tối đa :max.',
        'file_mb'    => 'Dung lượng tập tin trong trường :attribute không được lớn hơn :max MB.',
    ],
    'mimes'                => ':attribute phải là một tập tin có định dạng: :values.',
    'mimetypes'            => ':attribute phải là một tập tin có định dạng: :values.',
    'min'                  => [
        'array'   => ':attribute phải có tối thiểu :min phần tử.',
        'file'    => 'Dung lượng tập tin trong trường :attribute phải tối thiểu :min KB.',
        'numeric' => ':attribute phải tối thiểu là :min.',
        'string'  => ':attribute phải có tối thiểu :min kí tự.',
    ],
    'multiple_of'          => ':attribute phải là bội số của :value',
    'not_in'               => 'Giá trị đã chọn trong trường :attribute không hợp lệ.',
    'not_regex'            => ':attribute có định dạng không hợp lệ.',
    'numeric'              => ':attribute phải là một số.',
    'password'             => 'Mật khẩu không đúng.',
    'present'              => ':attribute phải được cung cấp.',
    'prohibited'           => ':attribute bị cấm.',
    'prohibited_if'        => ':attribute bị cấm khi :other là :value.',
    'prohibited_unless'    => ':attribute bị cấm trừ khi :other là một trong :values.',
    'regex'                => ':attribute có định dạng không hợp lệ.',
    'relatable'            => ':attribute không thể liên kết với tài nguyên này.',
    'required'             => ':attribute không được bỏ trống.',
    'required_if'          => ':attribute không được bỏ trống khi trường :other là :value.',
    'required_unless'      => ':attribute không được bỏ trống trừ khi :other là :values.',
    'required_with'        => ':attribute không được bỏ trống khi một trong :values có giá trị.',
    'required_with_all'    => ':attribute không được bỏ trống khi tất cả :values có giá trị.',
    'required_without'     => ':attribute không được bỏ trống khi một trong :values không có giá trị.',
    'required_without_all' => ':attribute không được bỏ trống khi tất cả :values không có giá trị.',
    'same'                 => ':attribute và :other phải giống nhau.',
    'size'                 => [
        'array'   => ':attribute phải chứa :size phần tử.',
        'file'    => 'Dung lượng tập tin trong trường :attribute phải bằng :size KB.',
        'numeric' => ':attribute phải bằng :size.',
        'string'  => ':attribute phải chứa :size kí tự.',
    ],
    'starts_with'          => ':attribute phải được bắt đầu bằng một trong những giá trị sau: :values',
    'string'               => ':attribute phải là một chuỗi kí tự.',
    'timezone'             => ':attribute phải là một múi giờ hợp lệ.',
    'unique'               => ':attribute đã có trong cơ sở dữ liệu.',
    'uploaded'             => ':attribute tải lên thất bại.',
    'url'                  => ':attribute không giống với định dạng một URL.',
    'uuid'                 => ':attribute phải là một chuỗi UUID hợp lệ.',
    'required_one_or_two'  => 'Không được để trống đồng thời :one và :two .',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'files.*' => [
            'max' => [
                'file' => 'Dung lượng tập tin trong trường :attribute không được lớn hơn ' . config('upload.file_max_size') / 1024 .' KB.',
            ],
            'mimes' => ':attribute phải là một tập tin có định dạng: ' . implode(', ', config('upload.image_mimes_allow')) .'.',
            'mimetypes' => ':attribute phải là một tập tin có định dạng: ' . implode(', ', config('upload.image_mimes_allow')) . '.',
        ],
        'avatar' => [
            'max' =>  'Dung lượng tập tin trong trường :attribute không được lớn hơn ' . config('upload.file_max_size') / 1024 .' MB.',
            'mimes' => ':attribute phải là một tập tin có định dạng: ' . implode(', ', config('upload.image_mimes_allow')) .'.',
            'mimetypes' => ':attribute phải là một tập tin có định dạng: ' . implode(', ', config('upload.image_mimes_allow')) . '.',
        ],
        'birthday' => [
            'date_format' => ':attribute phải là ngày hợp lệ và theo định dạng dd/mm/yyyy.',
        ],
        'birth_day' => [
            'date_format' => ':attribute phải là ngày hợp lệ và theo định dạng dd/mm/yyyy.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'address'                   => 'Địa chỉ',
        'age'                       => 'Tuổi',
        'available'                 => 'Có sẵn',
        'body'                      => 'Nội dung',
        'city'                      => 'Thành phố',
        'content'                   => 'Nội dung',
        'country'                   => 'Quốc gia',
        'company_name'              => 'Tên đối tác',
        'date'                      => 'Ngày',
        'day'                       => 'Ngày',
        'description'               => 'Mô tả',
        'email'                     => 'Email',
        'excerpt'                   => 'Trích dẫn',
        'first_name'                => 'Tên',
        'gender'                    => 'Giới tính',
        'hour'                      => 'Giờ',
        'last_name'                 => 'Họ',
        'message'                   => 'Lời nhắn',
        'minute'                    => 'Phút',
        'mobile'                    => 'Di động',
        'month'                     => 'Tháng',
        'name'                      => 'Tên',
        'password'                  => 'Mật khẩu',
        'password_confirmation'     => 'Xác nhận mật khẩu',
        'phone'                     => 'Số điện thoại',
        'phone_number'              => 'Số điện thoại',
        'second'                    => 'Giây',
        'sex'                       => 'Giới tính',
        'size'                      => 'Kích thước',
        'subject'                   => 'Tiêu đề',
        'time'                      => 'Thời gian',
        'title'                     => 'Tiêu đề',
        'username'                  => 'Tên đăng nhập',
        'year'                      => 'Năm',
        'image'                     => 'Ảnh',
        'files.*'                   => 'File',
        'position'                  => 'Chức vụ',
        'department_id'             => 'Phòng ban',
        'avatar'                    => 'Hình ảnh',
        'permission'                => 'Quyền',
        'roles_concurrently_id'     => 'Quyền kiêm nhiệm',
        'birthday'                  => 'Ngày tháng năm sinh',
        'birth_day'                  => 'Ngày tháng năm sinh',
        'expert_object_id' => __('Đối tượng chuyên gia'),
        'specialize_id' => __('Nghiệp vụ'),
        'years_of_experience' => __('Số năm kinh nghiệm'),
        'tax_code'                  => 'Mã số thuế TNCN',
        'citizen_identification'    => 'Số CCCD/Hộ chiếu',
        'role_concurrently_id.*'      => 'Quyền kiêm nhiệm',
    ],

];
