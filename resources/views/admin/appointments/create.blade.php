<x-dashboard-layout title="Create New Appointment">

    <form action="{{ route('admin.appointments.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.appointments._form',[
        'button_lable' => 'إضافة'
        ])

    </form>
    </x-dashboard-layout>