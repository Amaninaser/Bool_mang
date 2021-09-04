<x-dashboard-layout title="Create New Finance">

    <form action="{{ route('admin.finances.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.finances._form',[
        'button_lable' => 'إضافة'
        ])

    </form>
    </x-dashboard-layout>