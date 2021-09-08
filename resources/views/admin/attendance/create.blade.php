<x-dashboard-layout>

    <form action="{{ route('admin.attendance.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.attendance._form',[
        'button_lable' => 'إضافة'
        ])

    </form>
    </x-dashboard-layout>