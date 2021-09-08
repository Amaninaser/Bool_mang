<x-dashboard-layout >


    <form action="{{ route('admin.attendance.update', $appointments->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('admin.attendance._form',[
            'button_lable' => 'تعديل'
            ])
    </form>
    </x-dashboard-layout>