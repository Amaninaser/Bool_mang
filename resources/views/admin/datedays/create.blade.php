<x-dashboard-layout >

    <form action="{{ route('admin.datedays.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.datedays._form',[
        'button_lable' => 'إضافة'
        ])

    </form>
    </x-dashboard-layout>