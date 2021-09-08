<x-dashboard-layout title="Edit Appointment">


    <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('admin.appointments._form',[
            'button_lable' => 'تعديل'
            ])
    </form>
    </x-dashboard-layout>